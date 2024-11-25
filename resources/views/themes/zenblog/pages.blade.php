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

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="">
                <h1 class="sitename">UNIVERSITAS KHAIRUN</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>

                    @foreach ($menus as $menu)
                        @foreach ($menu->items as $item)
                            <li class="nav-item {{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
                                <a class="nav-link {{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                    href="{{ $item->page ? url($item->page->slug) : $item->url }}"
                                    {{ ($item->children ?? collect())->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                    {{ $item->label }}
                                </a>

                                <!-- First-level dropdown menu -->
                                @if (($item->children ?? collect())->isNotEmpty())
                                    <ul class="dropdown-menu">
                                        @foreach ($item->children as $child)
                                            <li
                                                class="dropdown-submenu {{ ($child->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
                                                <a class="dropdown-item {{ ($child->children ?? collect())->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                    href="{{ $child->page ? url($child->page->slug) : $child->url }}"
                                                    {{ ($child->children ?? collect())->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                    {{ $child->label }}
                                                </a>

                                                <!-- Second-level dropdown menu -->
                                                @if (($child->children ?? collect())->isNotEmpty())
                                                    <ul class="dropdown-menu">
                                                        @foreach ($child->children as $subchild)
                                                            <li><a class="dropdown-item"
                                                                    href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">
                                                                    {{ $subchild->label }}
                                                                </a></li>
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
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

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


                                <div class="content">
                                    {!! $page->content !!}

                                </div><!-- End post content -->

                            </article>

                        </div>
                    </section><!-- /Blog Details Section -->


                </div>

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

                            <h3 class="widget-title">Recent Posts</h3>

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

</body>

</html>
