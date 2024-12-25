@extends('themes.zenblog.layouts.main')

@section('main')
    <main class="main">


        <section id="trending-category" class="trending-category section">
            <!-- Section Title -->
            <div class="container section-title aos-init aos-animate" data-aos="fade-up">
                <div class="section-title-container d-flex align-items-center justify-content-between">
                    <h2>{{ $category->name }}</h2> <!-- Nama kategori -->

                </div>
            </div><!-- End Section Title -->

            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5">
                    <!-- Postingan Besar di Samping Kiri (Cuma 1 Postingan) -->
                    <div class="col-lg-4">
                        @if ($posts->isNotEmpty())
                            @php
                                $featuredPost = $posts->first(); // Ambil satu postingan pertama sebagai featured
                            @endphp
                            <div class="post-entry lg">
                                <a href="{{ route('posts.show', $featuredPost->slug) }}">
                                    <img src="{{ $featuredPost->image }}" alt="{{ $featuredPost->title }}"
                                        class="img-fluid w-100">
                                </a>
                                <div class="post-meta">
                                    <span class="mx-1">•</span>
                                    <span>{{ $featuredPost->created_at->format('M d, Y') }}</span>
                                    <!-- Tanggal postingan -->
                                </div>
                                <h2><a href="{{ route('posts.show', $featuredPost->slug) }}">{{ $featuredPost->title }}</a>
                                </h2>
                                <p class="mb-4 d-block">{{ Str::limit($featuredPost->excerpt, 150) }}</p>
                                <!-- Excerpt (ringkasan) -->

                                <div class="d-flex align-items-center author">
                                    <div class="photo">
                                        <img src="{{ asset('themes/zenblog/img/blog/blog-6.jpg') }}" alt="Penulis"
                                            class="img-fluid">
                                    </div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{ $featuredPost->author }}</h3> <!-- Nama penulis -->
                                    </div>
                                </div>
                                <!-- Share Buttons -->
                                <!-- Share Buttons -->
                                <div class="share-buttons mt-4">
                                    <span>Share:</span>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $featuredPost->slug) }}"
                                        target="_blank" class="btn btn-social-icon btn-facebook">
                                        <i class="bi bi-facebook"></i> <!-- Facebook -->
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $featuredPost->slug) }}"
                                        target="_blank" class="btn btn-social-icon btn-twitter">
                                        <i class="bi bi-twitter"></i> <!-- Twitter -->
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ route('posts.show', $featuredPost->slug) }}"
                                        target="_blank" class="btn btn-social-icon btn-whatsapp">
                                        <i class="bi bi-whatsapp"></i> <!-- WhatsApp -->
                                    </a>
                                    <a href="https://www.instagram.com" target="_blank"
                                        class="btn btn-social-icon btn-instagram">
                                        <i class="bi bi-instagram"></i> <!-- Instagram -->
                                    </a>

                                </div> <!-- End Share Buttons -->

                            </div>
                        @endif
                    </div>

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <!-- Postingan Kecil Grid (Kolom Kecil) -->
                            @foreach ($posts->skip(1) as $post)
                                <div class="col-lg-4">
                                    <div class="row g-5">
                                        <!-- Lewati postingan pertama yang sudah ditampilkan besar -->
                                        <div class="col-lg-12">
                                            <div class="post-entry">
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    <img src="{{ $post->image }}" alt="{{ $post->title }}"
                                                        class="img-fluid">
                                                </a>
                                                <div class="post-meta">
                                                    <span class="mx-1">•</span>
                                                    <span>{{ $post->created_at->format('M d, Y') }} -
                                                        Views {{ $post->views }}</span>
                                                </div>
                                                <h2><a
                                                        href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Trending Section -->
                            <div class="col-lg-4">
                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">
                                        @foreach ($posts->take(5) as $key => $post)
                                            <!-- Mengambil 5 postingan teratas -->
                                            <li>
                                                <a href="{{ route('posts.show', $post->slug) }}">
                                                    <span class="number">{{ $key + 1 }}</span>
                                                    <h3>{{ $post->title }}</h3>
                                                    <span class="author">{{ $post->author }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <!-- End Trending Section -->

                        </div>
                    </div>
                </div> <!-- End .row -->
            </div>
        </section>


    </main>
@endsection
