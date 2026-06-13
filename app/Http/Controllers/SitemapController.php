<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Blog;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function generate(): Response
    {
        $urls = [
            ['loc' => route('home'), 'changefreq' => 'daily', 'priority' => '1.0'],
            ['loc' => route('about'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('products'), 'changefreq' => 'daily', 'priority' => '0.9'],
            ['loc' => route('gallery'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('market-area'), 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['loc' => route('blog'), 'changefreq' => 'daily', 'priority' => '0.8'],
            ['loc' => route('contact'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('dealer.registration'), 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => route('distributor.registration'), 'changefreq' => 'monthly', 'priority' => '0.8'],
        ];

        // Fetch products
        $products = Product::where('status', true)->get();
        foreach ($products as $product) {
            $urls[] = [
                'loc' => route('product.detail', $product->slug),
                'changefreq' => 'weekly',
                'priority' => '0.8'
            ];
        }

        // Fetch blogs
        $blogs = Blog::where('status', true)->get();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => route('blog.detail', $blog->slug),
                'changefreq' => 'weekly',
                'priority' => '0.6'
            ];
        }

        // Generate XML string directly for simplicity & speed
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . htmlspecialchars($url['loc']) . '</loc>';
            $xml .= '<lastmod>' . now()->toDateString() . '</lastmod>';
            $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $url['priority'] . '</priority>';
            $xml .= '</url>';
        }
        
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
