<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\VisitorLog;
use Symfony\Component\HttpFoundation\Response;

class VisitorTrackingMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only track successful GET requests to main frontend pages
        if ($request->isMethod('GET') && !$request->is('admin*') && !$request->is('api*') && !$request->ajax()) {
            try {
                $ip = $request->ip();
                $today = now()->toDateString();

                // Unique visit per IP per day
                $exists = VisitorLog::where('ip_address', $ip)
                    ->where('visited_date', $today)
                    ->exists();

                if (!$exists) {
                    VisitorLog::create([
                        'ip_address' => $ip,
                        'user_agent' => $request->userAgent(),
                        'visited_date' => $today,
                        'visited_at' => now(),
                    ]);
                }
            } catch (\Exception $e) {
                // Silently ignore to prevent site crash if DB fails
            }
        }

        return $next($request);
    }
}
