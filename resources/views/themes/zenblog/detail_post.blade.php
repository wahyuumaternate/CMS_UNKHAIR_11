@extends('themes.zenblog.layouts.main')
@section('main')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">{{ $page->title }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">{{ $page->title }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">

                            <article class="article">
                                <img src="{{ $page->image }}" alt="{{ $page->title }}" class="img-fluid ">

                                <div class="content">
                                    {!! $page->content !!}

                                </div><!-- End post content -->

                                <div class="share-buttons mt-4">
                                    {{-- <span>Share:</span> --}}
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $page->slug) }}"
                                        target="_blank" class="btn btn-social-icon btn-facebook">
                                        <i class="bi bi-facebook"></i> <!-- Facebook -->
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $page->slug) }}"
                                        target="_blank" class="btn btn-social-icon btn-twitter">
                                        <i class="bi bi-twitter"></i> <!-- Twitter -->
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ route('posts.show', $page->slug) }}"
                                        target="_blank" class="btn btn-social-icon btn-whatsapp">
                                        <i class="bi bi-whatsapp"></i> <!-- WhatsApp -->
                                    </a>
                                    <a href="https://www.instagram.com" target="_blank"
                                        class="btn btn-social-icon btn-instagram">
                                        <i class="bi bi-instagram"></i> <!-- Instagram -->
                                    </a>

                                </div> <!-- End Share Buttons -->
                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->

                </div>

                @include('themes.zenblog.layouts.sidebar')

            </div>
        </div>

    </main>
@endsection
