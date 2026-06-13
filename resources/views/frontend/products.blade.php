@extends('layouts.frontend')

@section('content')
<!-- Page Banner -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Product Catalog</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Browse our wide range of premium industrial-grade and household cleaning products.</p>
    </div>
</section>

<!-- Catalogue Section -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        <div class="row g-4">
            
            <!-- Filters Sidebar -->
            <div class="col-lg-3" data-aos="fade-right">
                <form action="{{ route('products') }}" method="GET" class="sticky-top" style="top: 100px; z-index: 10;">
                    
                    <!-- Search Input -->
                    <div class="glass-card mb-4 p-3">
                        <h6 class="font-outfit fw-700 text-dark mb-3">Search Products</h6>
                        <div class="input-group">
                            <input type="text" name="search" class="form-control border-end-0" placeholder="Product name..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-outline-secondary border-start-0 bg-white text-muted" style="border-color: #dee2e6;"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>

                    <!-- Categories Filter -->
                    <div class="glass-card mb-4 p-3">
                        <h6 class="font-outfit fw-700 text-dark mb-3">Categories</h6>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('products', ['search' => request('search'), 'sort' => request('sort')]) }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between border-0 px-0 bg-transparent text-dark {{ !request('category') ? 'fw-bold text-teal' : '' }}" style="color: {{ !request('category') ? 'var(--secondary-color) !important' : '' }}">
                                <span>All Categories</span>
                            </a>
                            @foreach($categories as $category)
                            <a href="{{ route('products', ['category' => $category->slug, 'search' => request('search'), 'sort' => request('sort')]) }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between border-0 px-0 bg-transparent text-dark {{ request('category') == $category->slug ? 'fw-bold text-teal' : '' }}" style="color: {{ request('category') == $category->slug ? 'var(--secondary-color) !important' : '' }}">
                                <span>{{ $category->name }}</span>
                                <span class="badge rounded-pill bg-light text-muted small border">{{ $category->products()->where('status', true)->count() }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reset Button -->
                    @if(request('category') || request('search') || request('sort'))
                        <a href="{{ route('products') }}" class="btn btn-sm btn-outline-premium w-100 rounded-3">Clear All Filters</a>
                    @endif
                </form>
            </div>

            <!-- Products Listing Grid -->
            <div class="col-lg-9">
                
                <!-- Filter bar top -->
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4 pb-3 border-bottom" data-aos="fade-up">
                    <p class="text-muted mb-0 font-outfit" style="font-size: 0.95rem;">Showing <span class="text-dark fw-600">{{ $products->count() }}</span> products of <span class="text-dark fw-600">{{ $products->total() }}</span> total</p>
                    
                    <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0">
                        <label class="text-muted small flex-shrink-0">Sort By:</label>
                        <select class="form-select form-select-sm" style="width: auto; font-size: 0.9rem;" onchange="window.location.href=this.value;">
                            <option value="{{ route('products', array_merge(request()->query(), ['sort' => 'default'])) }}" {{ request('sort') == 'default' ? 'selected' : '' }}>Latest</option>
                            <option value="{{ route('products', array_merge(request()->query(), ['sort' => 'name_asc'])) }}" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                            <option value="{{ route('products', array_merge(request()->query(), ['sort' => 'name_desc'])) }}" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name: Z to A</option>
                        </select>
                    </div>
                </div>

                <!-- Catalog Grid -->
                <div class="row g-4">
                    @forelse($products as $product)
                    <div class="col-md-6 col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="premium-glow-card h-100 d-flex flex-column justify-content-between p-4">
                            <div>
                                @php
                                    $bgStyle = 'linear-gradient(135deg, rgba(0, 180, 216, 0.05) 0%, rgba(0, 150, 199, 0.05) 100%)';
                                    $catSlug = $product->category->slug ?? '';
                                    if ($catSlug == 'hand-wash') {
                                        $bgStyle = 'linear-gradient(135deg, rgba(0, 180, 216, 0.06) 0%, rgba(0, 180, 216, 0.15) 100%)';
                                    } elseif ($catSlug == 'dish-wash') {
                                        $bgStyle = 'linear-gradient(135deg, rgba(0, 200, 83, 0.06) 0%, rgba(0, 200, 83, 0.15) 100%)';
                                    } elseif ($catSlug == 'floor-cleaner') {
                                        $bgStyle = 'linear-gradient(135deg, rgba(245, 158, 11, 0.06) 0%, rgba(245, 158, 11, 0.15) 100%)';
                                    } elseif ($catSlug == 'toilet-cleaner') {
                                        $bgStyle = 'linear-gradient(135deg, rgba(30, 41, 59, 0.06) 0%, rgba(30, 41, 59, 0.15) 100%)';
                                    } elseif ($catSlug == 'industrial-degreaser') {
                                        $bgStyle = 'linear-gradient(135deg, rgba(15, 23, 42, 0.08) 0%, rgba(30, 41, 59, 0.2) 100%)';
                                    }
                                @endphp
                                @php
                                    $catProductImage = asset('assets/images/product-placeholder.png');
                                    if ($product->primaryImage) {
                                        $catProductImage = asset($product->primaryImage->image_path);
                                    } else {
                                        $pCatSlug = $product->category->slug ?? '';
                                        if ($pCatSlug == 'hand-wash') {
                                            $catProductImage = asset('assets/images/orvin-handwash.png');
                                        } elseif ($pCatSlug == 'dish-wash') {
                                            $catProductImage = asset('assets/images/orvin-dish.png');
                                        } elseif ($pCatSlug == 'floor-cleaner') {
                                            $catProductImage = asset('assets/images/orvin-floor.png');
                                        } elseif (in_array($pCatSlug, ['liquid-detergent', 'fabric-wash', 'laundry-liquid'])) {
                                            $catProductImage = asset('assets/images/orvin-laundry.png');
                                        }
                                    }
                                @endphp
                                <div class="product-img-wrapper rounded-3 mb-4 d-flex align-items-center justify-content-center overflow-hidden" style="height: 220px; background: {!! $bgStyle !!};">
                                    <img src="{{ $catProductImage }}" alt="{{ $product->name }}" class="h-100 w-auto py-3" style="object-fit: contain; transition: var(--transition-premium);">
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="badge bg-light text-dark border-0 shadow-sm py-2 px-3 font-outfit" style="font-size:0.75rem; font-weight: 700;">{{ $product->category->name }}</span>
                                    @if(isset($product->specifications['pH Level']))
                                        <span class="spec-mini-badge"><i class="fa-solid fa-droplet me-1"></i> pH {{ $product->specifications['pH Level'] }}</span>
                                    @endif
                                </div>
                                
                                <h5 class="fw-800 font-outfit text-dark mb-2" style="font-size: 1.25rem;">{{ $product->name }}</h5>
                                <p class="text-muted small mb-4">{{ $product->short_description }}</p>
                            </div>
                            <div class="row g-2 border-top pt-3 mt-3">
                                <div class="col-6">
                                    <a href="{{ route('product.detail', $product->slug) }}" class="btn btn-sm btn-outline-premium w-100 rounded-3" style="height: 44px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.85rem;">View Info</a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('product.detail', $product->slug) }}#quote" class="btn btn-sm btn-premium w-100 rounded-3" style="height: 44px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.85rem;">Get Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-regular fa-folder-open display-1 mb-3"></i>
                        <h4>No Products Found</h4>
                        <p>Try refining your search queries or clearing active filters.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
