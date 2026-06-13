<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Blog;
use App\Models\Dealer;
use App\Models\Distributor;
use App\Models\ContactInquiry;
use App\Models\VisitorLog;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalBlogs = Blog::count();
        $totalDealers = Dealer::count();
        $totalDistributors = Distributor::count();
        $totalInquiries = ContactInquiry::count();
        $totalVisitors = VisitorLog::count();

        // Query visitor logs for the last 7 days
        $visitorStats = VisitorLog::select('visited_date', DB::raw('count(*) as count'))
            ->where('visited_date', '>=', now()->subDays(6)->toDateString())
            ->groupBy('visited_date')
            ->orderBy('visited_date', 'asc')
            ->get();

        // Prep chart data
        $chartLabels = [];
        $chartData = [];
        
        // Loop last 7 days to fill zeroes for days with no traffic
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $label = now()->subDays($i)->format('M d');
            $chartLabels[] = $label;
            
            $stat = $visitorStats->firstWhere('visited_date', $date);
            $chartData[] = $stat ? $stat->count : 0;
        }

        return view('admin.dashboard', compact(
            'totalProducts', 'totalCategories', 'totalBlogs',
            'totalDealers', 'totalDistributors', 'totalInquiries',
            'totalVisitors', 'chartLabels', 'chartData'
        ));
    }
}
