@extends('layouts.admin')

@section('content')
<!-- Welcome Header -->
<div class="d-flex align-items-center justify-content-between mb-4" data-aos="fade-up">
    <div>
        <h2 class="font-outfit fw-800 text-dark mb-1">Dashboard Overview</h2>
        <p class="text-muted mb-0">Overview of site traffic, dealers network, and lead inquiries.</p>
    </div>
</div>

<!-- Metrics Statistics Grid -->
<div class="row g-4 mb-4">
    <!-- Total Visitors -->
    <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm p-4 rounded-4" style="background: linear-gradient(135deg, #1e293b 0%, #0b132b 100%); color: #fff;">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-white-50 small font-outfit">Total Visitors</span>
                    <h3 class="fw-800 font-outfit mt-1 mb-0">{{ $totalVisitors }}</h3>
                </div>
                <div class="fs-1 text-white-50"><i class="fa-solid fa-users"></i></div>
            </div>
        </div>
    </div>
    
    <!-- Total Products -->
    <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white text-dark">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small font-outfit">Total Products</span>
                    <h3 class="fw-800 font-outfit mt-1 mb-0 text-dark">{{ $totalProducts }}</h3>
                </div>
                <div class="fs-1 text-teal" style="color: var(--secondary-color);"><i class="fa-solid fa-bottle-droplet"></i></div>
            </div>
        </div>
    </div>

    <!-- Total Inquiries -->
    <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white text-dark">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small font-outfit">Lead Inquiries</span>
                    <h3 class="fw-800 font-outfit mt-1 mb-0 text-dark">{{ $totalInquiries }}</h3>
                </div>
                <div class="fs-1 text-info"><i class="fa-solid fa-envelope-open-text"></i></div>
            </div>
        </div>
    </div>

    <!-- Active Dealers -->
    <div class="col-md-3 col-sm-6">
        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white text-dark">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-muted small font-outfit">Active Dealers</span>
                    <h3 class="fw-800 font-outfit mt-1 mb-0 text-dark">{{ $totalDealers }}</h3>
                </div>
                <div class="fs-1 text-success"><i class="fa-solid fa-store"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Chart and System info row -->
<div class="row g-4">
    <!-- Traffic Chart (Left) -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white h-100">
            <h5 class="font-outfit fw-800 text-dark mb-4"><i class="fa-solid fa-chart-area text-teal me-2" style="color: var(--secondary-color);"></i> Visitor Traffic (Last 7 Days)</h5>
            
            <div style="position: relative; height: 300px;">
                <canvas id="trafficChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Quick Stats Summary (Right) -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 rounded-4 bg-white h-100 d-flex flex-column justify-content-between">
            <div>
                <h5 class="font-outfit fw-800 text-dark mb-4"><i class="fa-solid fa-server text-teal me-2" style="color: var(--secondary-color);"></i> Platform Health</h5>
                
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <span class="text-muted small">Laravel Framework</span>
                    <span class="badge bg-light text-dark border">v12.0</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <span class="text-muted small">PHP Interpreter</span>
                    <span class="badge bg-light text-dark border">v8.5</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <span class="text-muted small">Active Categories</span>
                    <span class="badge bg-teal text-white" style="background-color: var(--secondary-color);">{{ $totalCategories }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <span class="text-muted small">Blog Articles</span>
                    <span class="badge bg-light text-dark border">{{ $totalBlogs }}</span>
                </div>
            </div>
            
            <div class="bg-light p-3 rounded-3 mt-4 text-center">
                <span class="text-muted d-block small mb-1">Exclusive Distributorship Requests</span>
                <span class="fw-800 text-dark font-outfit" style="font-size: 1.5rem;">{{ $totalDistributors }} Registered</span>
            </div>
        </div>
    </div>
</div>

<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('trafficChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    label: 'Unique Daily Visits',
                    data: {!! json_encode($chartData) !!},
                    borderColor: '#0d9488',
                    backgroundColor: 'rgba(13, 148, 136, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
