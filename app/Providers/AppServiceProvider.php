<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ---------------------------------------------------------------
        // FIX: Force HTTPS scheme so that asset(), url(), route() all
        // generate https:// URLs when the app is accessed via Ngrok or any
        // HTTPS reverse-proxy. Without this, the browser blocks http://
        // assets loaded on an https:// page (Mixed Content error).
        // ---------------------------------------------------------------
        if (str_starts_with(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        // ---------------------------------------------------------------
        // FIX: Force the root URL to match APP_URL exactly so that
        // asset() generates URLs rooted at the Ngrok domain, not at
        // whatever host the request claims to come from.
        // ---------------------------------------------------------------
        URL::forceRootUrl(config('app.url'));

        // Define gates based on DB permissions
        try {
            if (\Schema::hasTable('permissions')) {
                \App\Models\Permission::all()->each(function ($permission) {
                    \Illuminate\Support\Facades\Gate::define($permission->slug, function ($user) use ($permission) {
                        return $user->hasPermission($permission->slug) || $user->hasRole('admin');
                    });
                });
            }
        } catch (\Exception $e) {
            // Prevent failure during command line tasks before migration
        }

        // Share website settings and dynamic SEO across views
        try {
            if (\Schema::hasTable('website_settings')) {
                $settings = \App\Models\WebsiteSetting::pluck('value', 'key')->all();
                \Illuminate\Support\Facades\View::share('settings', $settings);
            }

            \Illuminate\Support\Facades\View::composer('*', function ($view) {
                $path = \Illuminate\Support\Facades\Request::path();
                $pageKey = 'home';
                if ($path !== '/') {
                    $segments = explode('/', $path);
                    $pageKey = $segments[0];
                }

                $seo = null;
                if (\Schema::hasTable('seo_settings')) {
                    $seo = \App\Models\SeoSetting::where('page_name', $pageKey)->first();
                }
                $view->with('pageSeo', $seo);
            });
        } catch (\Exception $e) {
            // Prevent failure during migrations
        }
    }
}
