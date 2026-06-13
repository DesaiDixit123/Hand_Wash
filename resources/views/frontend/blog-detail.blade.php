@extends('layouts.frontend')

@section('content')
<!-- Page Breadcrumb Banner -->
<section class="section-padding bg-light pb-4 mb-5">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog') }}" class="text-decoration-none text-muted">Hygiene Insights</a></li>
                <li class="breadcrumb-item active text-dark" aria-current="page">{{ $blog->title }}</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Blog Main Content -->
<section class="section-padding bg-white pt-0">
    <div class="container">
        <div class="row g-5">
            
            <!-- Article Body (Left Column) -->
            <div class="col-lg-8" data-aos="fade-right">
                
                <!-- Category and Date Meta -->
                <div class="d-flex align-items-center gap-3 mb-3 text-muted" style="font-size: 0.9rem;">
                    <span class="badge bg-teal px-3 py-2 rounded-pill font-outfit" style="background-color: var(--secondary-color);">{{ $blog->category->name }}</span>
                    <span>&bull;</span>
                    <span>Published: {{ $blog->published_at ? $blog->published_at->format('M d, Y') : $blog->created_at->format('M d, Y') }}</span>
                </div>

                <!-- Blog Title -->
                <h1 class="font-outfit fw-800 text-dark display-5 mb-4">{{ $blog->title }}</h1>
                
                <!-- Author block -->
                <div class="d-flex align-items-center gap-3 py-3 border-top border-bottom mb-4">
                    <div class="bg-teal text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px; background-color: var(--secondary-color);">
                        <i class="fa-solid fa-user-pen fs-5"></i>
                    </div>
                    <div>
                        <h6 class="fw-700 text-dark mb-0">{{ $blog->author_name }}</h6>
                        <span class="text-muted small">Sree Chemicals Research Team</span>
                    </div>
                </div>

                <!-- Featured Image Placeholder -->
                <div class="rounded-4 overflow-hidden mb-5" style="height: 380px; background: linear-gradient(135deg, #0b132b 0%, #0d9488 100%); display: flex; align-items: center; justify-content: center; color: #fff;">
                    <div class="text-center">
                        <i class="fa-solid fa-book-open display-1 opacity-20 mb-3"></i>
                        <h4 class="font-outfit text-white-50">Hygiene & Chemistry Article</h4>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="blog-rich-content text-muted" style="line-height: 1.8; font-size: 1.05rem;">
                    {!! $blog->content !!}
                </div>

                <!-- Social Share options -->
                <div class="d-flex align-items-center gap-3 border-top pt-4 mt-5">
                    <span class="fw-700 text-dark font-outfit">Share Article:</span>
                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="btn btn-sm btn-outline-info rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($blog->title) }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-circle" style="width: 36px; height: 36px; display: flex; align-items: center; justify-content: center;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>

            </div>

            <!-- Related Articles Sidebar (Right Column) -->
            <div class="col-lg-4" data-aos="fade-left">
                <div class="glass-card sticky-top" style="top: 100px;">
                    <h5 class="font-outfit fw-800 text-dark mb-4 pb-2 border-bottom">Related Insights</h5>
                    
                    @forelse($relatedBlogs as $rel)
                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="rounded-3 bg-light d-flex align-items-center justify-content-center text-teal flex-shrink-0" style="width: 60px; height: 60px; color: var(--secondary-color); background: rgba(13, 148, 136, 0.1);">
                            <i class="fa-solid fa-file-lines fs-4"></i>
                        </div>
                        <div>
                            <span class="text-muted small d-block" style="font-size: 0.75rem;">{{ $rel->published_at ? $rel->published_at->format('M d, Y') : $rel->created_at->format('M d, Y') }}</span>
                            <a href="{{ route('blog.detail', $rel->slug) }}" class="text-dark fw-600 text-decoration-none font-outfit small d-block" style="line-height: 1.3;">{{ $rel->title }}</a>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted small mb-0">No related posts found.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
