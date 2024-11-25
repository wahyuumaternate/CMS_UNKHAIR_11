@extends('themes.zenblog.layouts.main')
@section('main')
    <main class="main">

        <!-- Slider Section -->
        <section id="slider" class="slider section dark-background">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">

                    <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "centeredSlides": true,
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          }
        }
      </script>

                    <div class="swiper-wrapper">

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('themes/zenblog/img/post-slide-1.jpg') }}');">
                            <div class="content">
                                <h2><a href="single-post.html">The Best Homemade Masks for Face (keep the Pimples
                                        Away)</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia!
                                    Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque
                                    maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                            </div>
                        </div>

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('themes/zenblog/img/post-slide-2.jpg') }}');">
                            <div class="content">
                                <h2><a href="single-post.html">17 Pictures of Medium Length Hair in Layers That Will
                                        Inspire Your New Haircut</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia!
                                    Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque
                                    maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                            </div>
                        </div>

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('themes/zenblog/img/post-slide-3.jpg') }}');">
                            <div class="content">
                                <h2><a href="single-post.html">13 Amazing Poems from Shel Silverstein with Valuable
                                        Life
                                        Lessons</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia!
                                    Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque
                                    maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                            </div>
                        </div>

                        <div class="swiper-slide"
                            style="background-image: url('{{ asset('themes/zenblog/img/post-slide-4.jpg') }}');">
                            <div class="content">
                                <h2><a href="single-post.html">9 Half-up/half-down Hairstyles for Long and Medium
                                        Hair</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque est mollitia!
                                    Beatae minima assumenda repellat harum vero, officiis ipsam magnam obcaecati cumque
                                    maxime inventore repudiandae quidem necessitatibus rem atque.</p>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Slider Section -->

        {{-- <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Category</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Categories</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title --> --}}

        <div class="container">
            <div class="row">
                <div class="container section-title aos-init aos-animate" data-aos="fade-up">
                    <div class="section-title-container d-flex align-items-center justify-content-between">
                        <h2>Informasi Terkini</h2>

                    </div>
                </div>
                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">

                        <div class="container">
                            <div class="row gy-4">

                                <div class="col-lg-6">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-1.jpg') }}" class="img-fluid"
                                                alt="">
                                            <span class="post-date">December 12</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title">Dolorum optio tempore voluptas dignissimos cumque
                                                fuga qui quibusdam quia</h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">John Doe</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                                </div>
                                            </div>

                                            <p>
                                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam
                                                animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid
                                                dicta.
                                            </p>

                                            <hr>

                                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>

                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                                <div class="col-lg-6">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-2.jpg') }}" class="img-fluid"
                                                alt="">
                                            <span class="post-date">March 19</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title">Nisi magni odit consequatur autem nulla dolorem</h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">Julia
                                                        Parker</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                                                </div>
                                            </div>

                                            <p>
                                                Incidunt voluptate sit temporibus aperiam. Quia vitae aut sint ullam
                                                quis illum voluptatum et. Quo libero rerum voluptatem pariatur nam.
                                            </p>

                                            <hr>

                                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>

                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                                <div class="col-lg-6">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-3.jpg') }}" class="img-fluid"
                                                alt="">
                                            <span class="post-date">June 24</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title">Possimus soluta ut id suscipit ea ut. In quo quia et
                                                soluta libero sit sint.</h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">Maria Doe</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                                </div>
                                            </div>

                                            <p>
                                                Aut iste neque ut illum qui perspiciatis similique recusandae non. Fugit
                                                autem dolorem labore omnis et. Eum temporibus fugiat voluptate enim
                                                tenetur sunt omnis.
                                            </p>

                                            <hr>

                                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>

                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                                <div class="col-lg-6">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-4.jpg') }}" class="img-fluid"
                                                alt="">
                                            <span class="post-date">August 05</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title">Non rem rerum nam cum quo minus. Dolor distinctio
                                                deleniti explicabo eius exercitationem.</h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">Maria Doe</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                                                </div>
                                            </div>

                                            <p>
                                                Aspernatur rerum perferendis et sint. Voluptates cupiditate voluptas
                                                atque quae. Rem veritatis rerum enim et autem. Saepe atque cum eligendi
                                                eaque iste omnis a qui.
                                            </p>

                                            <hr>

                                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>

                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                                <div class="col-lg-6">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-5.jpg') }}" class="img-fluid"
                                                alt="">
                                            <span class="post-date">September 17</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title">Accusamus quaerat aliquam qui debitis facilis
                                                consequatur</h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">John
                                                        Parker</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                                                </div>
                                            </div>

                                            <p>
                                                In itaque assumenda aliquam voluptatem qui temporibus iusto nisi quia.
                                                Autem vitae quas aperiam nesciunt mollitia tempora odio omnis. Ipsa odit
                                                sit ut amet necessitatibus. Quo ullam ut corrupti autem consequuntur
                                                totam dolorem.
                                            </p>

                                            <hr>

                                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>

                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                                <div class="col-lg-6">
                                    <article class="position-relative h-100">

                                        <div class="post-img position-relative overflow-hidden">
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-6.jpg') }}" class="img-fluid"
                                                alt="">
                                            <span class="post-date">December 07</span>
                                        </div>

                                        <div class="post-content d-flex flex-column">

                                            <h3 class="post-title">Distinctio provident quibusdam numquam aperiam aut
                                            </h3>

                                            <div class="meta d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-person"></i> <span class="ps-2">Julia
                                                        White</span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                                                </div>
                                            </div>

                                            <p>
                                                Quo ex voluptas dolorem qui ratione aut. Quo velit quas eveniet aut
                                                laboriosam iure alias fuga eius velit. Accusamus itaque aut quia ut.
                                            </p>

                                            <hr>

                                            <a href="blog-details.html" class="readmore stretched-link"><span>Read
                                                    More</span><i class="bi bi-arrow-right"></i></a>

                                        </div>

                                    </article>
                                </div><!-- End post list item -->

                            </div>
                        </div>

                    </section><!-- End Blog Posts Section -->

                    <section id="blog-pagination" class="blog-pagination section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#" class="active">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li>...</li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </section>


                </div><!-- End Blog Section -->

                @include('themes.zenblog.layouts.sidebar')
            </div>
        </div>


    </main>
@endsection
