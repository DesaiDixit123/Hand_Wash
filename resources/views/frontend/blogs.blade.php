@extends('layouts.frontend')

@section('content')
<!-- Page Banner Header -->
<section class="section-padding text-white" style="background: linear-gradient(135deg, var(--primary-color) 0%, #1e293b 100%); margin-bottom: 50px;">
    <div class="container text-center">
        <h1 class="display-4 font-outfit fw-800 text-white" data-aos="fade-down">Hygiene Insights</h1>
        <p class="fs-6 text-muted-white mx-auto" style="max-width: 600px; color: #cbd5e1;" data-aos="fade-up">Read our latest research posts on industrial sanitation and household cleanliness guidelines.</p>
    </div>
</section>

<!-- Blog Listing Content -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        <div class="row g-4">
            
            <!-- Blog Posts (Left Column) -->
            <div class="col-lg-8">
                <div class="row g-4">
                    @forelse($blogs as $blog)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="product-card h-100 d-flex flex-column">
                            <div class="position-relative" style="height: 200px; background: linear-gradient(135deg, #0d9488 0%, #0284c7 100%); display: flex; align-items: center; justify-content: center; color: #fff;">
                                <i class="fa-solid fa-file-invoice display-3 opacity-25"></i>
                            </div>
                            <div class="p-4 flex-grow-1 d-flex flex-column">
                                <div class="d-flex align-items-center gap-2 mb-2 text-muted" style="font-size: 0.8rem;">
                                    <span class="badge bg-light text-teal border" style="color: var(--secondary-color);">{{ $blog->category->name }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                                </div>
                                <h5 class="fw-700 font-outfit text-dark mb-2">{{ $blog->title }}</h5>
                                <p class="text-muted small flex-grow-1">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                                <div class="border-top pt-3 mt-3 d-flex align-items-center justify-content-between">
                                    <span class="text-muted small">By {{ $blog->author_name }}</span>
                                    <a href="{{ route('blog.detail', $blog->slug) }}" class="text-teal fw-600 text-decoration-none small" style="color: var(--secondary-color);">Read Post <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="fa-regular fa-face-frown display-1 mb-3"></i>
                        <h4>No Blogs Found</h4>
                        <p>We haven't posted any articles matching your search queries.</p>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            </div>

            <!-- Blog Sidebar (Right Column) -->
            <div class="col-lg-4" data-aos="fade-left">
                
                <!-- Search Box -->
                <div class="glass-card mb-4 p-4">
                    <h6 class="font-outfit fw-700 text-dark mb-3">Search Articles</h6>
                    <form action="{{ route('blog') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control rounded-start-3" placeholder="Keywords..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-premium rounded-end-3"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>

                <!-- Blog Categories -->
                <div class="glass-card p-4">
                    <h6 class="font-outfit fw-700 text-dark mb-3">Categories</h6>
                    <div class="list-group list-group-flush">
                        @foreach($categories as $bc)
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between px-0 bg-transparent text-muted small border-0">
                            <span>{{ $bc->name }}</span>
                            <span class="badge rounded-pill bg-light text-muted border">{{ $bc->blogs()->where('status', true)->count() }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
@endsection
