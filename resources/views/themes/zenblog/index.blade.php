<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Zenblog</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=EB+Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('themes/zenblog/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/zenblog/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/zenblog/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/zenblog/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('themes/zenblog/css/main.css') }}" rel="stylesheet">
    <style>
        /* Default Dropdown Menu Style */
        ul.dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        li.dropdown:hover>ul.dropdown-menu {
            display: block;
        }

        /* Mobile Devices */
        @media (max-width: 768px) {
            .dropdown-menu {
                position: static;
                /* Make it position as part of the flow */
                display: none;
            }

            .dropdown.show>.dropdown-menu {
                display: block;
                /* Show the menu when the parent is active */
            }

            .toggle-dropdown {
                cursor: pointer;
            }
        }

        .navbar {
            border-top: 6px solid #FFB200 !important;
            border-bottom: 1px solid #FFB200 !important;
        }
    </style>
</head>

<body class="index-page">
    <div class="container section">
        <img class="img-fluid" src="{{ asset('hero.jpg') }}" alt="">
    </div>
    <header id="header" class="header d-flex align-items-center sticky-top ">
        <div class="container navbar position-relative d-flex align-items-center justify-content-between p-2">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="">
                <h1 class="sitename">UNIVERSITAS KHAIRUN</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>

                    {{-- @foreach ($menus as $menu)
                        @foreach ($menu->items as $item)
                            <li class="{{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
                                <a class=" {{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                    href="{{ $item->page ? url($item->page->slug) : $item->url }}"
                                    {{ ($item->children ?? collect())->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                    {{ $item->label }}
                                </a>

                                <!-- First-level dropdown menu -->
                                @if (($item->children ?? collect())->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach ($item->children as $child)
                                            <li
                                                class="{{ ($child->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
                                                <a class=" {{ ($child->children ?? collect())->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                    href="{{ $child->page ? url($child->page->slug) : $child->url }}"
                                                    {{ ($child->children ?? collect())->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                    {{ $child->label }}

                                                </a>

                                                <!-- Second-level dropdown menu -->
                                                @if (($child->children ?? collect())->isNotEmpty())
                                                    <ul>
                                                        @foreach ($child->children as $subchild)
                                                            <li>
                                                                <a
                                                                    href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">
                                                                    {{ $subchild->label }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endforeach --}}
                    @foreach ($menus as $menu)
                        @foreach ($menu->items as $item)
                            <li class="{{ $item->children->isNotEmpty() ? 'dropdown' : '' }}">
                                <a href="{{ $item->page ? url($item->page->slug) : $item->url }}"
                                    class="{{ $item->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                    {{ $item->children->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                    {{ $item->label }}
                                </a>

                                <!-- First-level dropdown menu -->
                                @if ($item->children->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach ($item->children as $child)
                                            <li class="{{ $child->children->isNotEmpty() ? 'dropdown' : '' }}">
                                                <a href="{{ $child->page ? url($child->page->slug) : $child->url }}"
                                                    class="{{ $child->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                    {{ $child->children->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                    {{ $child->label }}
                                                </a>

                                                <!-- Second-level dropdown menu -->
                                                @if ($child->children->isNotEmpty())
                                                    <ul>
                                                        @foreach ($child->children as $subchild)
                                                            <li>
                                                                <a
                                                                    href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">
                                                                    {{ $subchild->label }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endforeach





                    {{-- <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="single-post.html">Single Post</a></li>
                    <li class="dropdown"><a href="#"><span>Categories</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="category.html">Category 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="category.html">Category 2</a></li>
                            <li><a href="category.html">Category 3</a></li>
                            <li><a href="category.html">Category 4</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li> --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                {{-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
            </div>

        </div>
    </header>

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
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-1.jpg') }}"
                                                class="img-fluid" alt="">
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
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-2.jpg') }}"
                                                class="img-fluid" alt="">
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
                                                    <i class="bi bi-folder2"></i> <span
                                                        class="ps-2">Economics</span>
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
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-3.jpg') }}"
                                                class="img-fluid" alt="">
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
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-4.jpg') }}"
                                                class="img-fluid" alt="">
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
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-5.jpg') }}"
                                                class="img-fluid" alt="">
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
                                            <img src="{{ asset('themes/zenblog/img/blog/blog-6.jpg') }}"
                                                class="img-fluid" alt="">
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
                                                    <i class="bi bi-folder2"></i> <span
                                                        class="ps-2">Economics</span>
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

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">

                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>

                        </div><!--/Search Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">Trending Posts</h3>

                            <div class="post-item">
                                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-1.jpg') }}" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-2.jpg') }}" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-3.jpg') }}" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a>
                                    </h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-4.jpg') }}" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                            <div class="post-item">
                                <img src="{{ asset('themes/zenblog/img/blog/blog-recent-5.jpg') }}" alt=""
                                    class="flex-shrink-0">
                                <div>
                                    <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                                    <time datetime="2020-01-01">Jan 1, 2020</time>
                                </div>
                            </div><!-- End recent post item-->

                        </div><!--/Recent Posts Widget -->

                        <!-- Tags Widget -->
                        <div class="tags-widget widget-item">

                            <h3 class="widget-title">Kategori Artikel</h3>
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>

                        </div><!--/Tags Widget -->

                    </div>

                </div>

            </div>
        </div>




    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">UNKHAIR</strong> <span>All Rights Reserved</span>
            </p>

        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('themes/zenblog/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/zenblog/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('themes/zenblog/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('themes/zenblog/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('themes/zenblog/js/main.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get all toggle buttons for the dropdowns
            var dropdownToggles = document.querySelectorAll('.dropdown .toggle-dropdown');

            dropdownToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default link behavior
                    var dropdownMenu = this.closest('li').querySelector('.dropdown-menu');

                    // Toggle the 'show' class on the dropdown menu
                    dropdownMenu.classList.toggle('show');

                    // Close other dropdowns when opening a new one
                    // Optionally, you can close other open dropdowns
                    var otherDropdowns = document.querySelectorAll('.dropdown-menu');
                    otherDropdowns.forEach(function(menu) {
                        if (menu !== dropdownMenu) {
                            menu.classList.remove('show');
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
