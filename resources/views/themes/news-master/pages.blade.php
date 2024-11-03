<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News Master </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/logo-unkhair.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/newsMaster/css/style.css') }}">
    <style>
        /* Style dasar untuk navbar */
        #navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #navigation>li {
            position: relative;
            display: inline-block;
            margin-right: 20px;
        }

        #navigation>li>a {
            text-decoration: none;
            padding: 10px 15px;
            color: #333;
            display: block;
        }

        /* Tambahkan indikator panah untuk item dengan submenu */
        .has-submenu>a::after {
            content: " ▼";
            font-size: 0.8em;
            margin-left: 5px;
            display: inline-block;
            color: #555;
        }

        /* Style untuk submenu */
        .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            min-width: 200px;
            z-index: 1;
        }

        .submenu li {
            position: relative;
        }

        .submenu li a {
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            display: block;
            white-space: nowrap;
        }

        .submenu li a:hover {
            background-color: #ddd;
        }

        /* Tampilkan submenu saat item di-hover */
        #navigation>li:hover>.submenu,
        .submenu li:hover>.submenu {
            display: block;
        }

        /* Untuk submenu tingkat berikutnya (sub-submenu) */
        .submenu .submenu {
            top: 0;
            left: 100%;
            margin-left: 1px;
            border-left: 1px solid #ccc;
        }

        /* Perbaiki tampilan saat hover untuk multi-level */
        .submenu .submenu li a:hover {
            background-color: #ccc;
        }

        /* Responsif untuk mobile/tablet */
        @media (max-width: 768px) {

            /* Submenu turun ke bawah pada ukuran mobile */
            #navigation {
                display: block;
            }

            #navigation>li {
                display: block;
                margin: 0;
            }

            .submenu {
                position: relative;
                top: auto;
                left: auto;
                border: none;
            }

            .submenu .submenu {
                position: relative;
                top: auto;
                left: auto;
                margin-left: 0;
                border: none;
            }

            /* Hapus indikator pada mobile untuk menghemat ruang */
            .has-submenu>a::after {
                content: "";
            }
        }
    </style>
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top black-bg d-none d-sm-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                                        <li>Class property employ ancho red multi level mansion</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-date">
                                        <li><span class="flaticon-calendar"></span> +880166 253 232</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mid gray-bg">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                                <div class="logo">
                                    <a href=""><img src="{{ asset('backend/assets/img/logo-unkhair.png') }}"
                                            alt="" width="70"></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    {{-- <img src="{{ asset('themes/newsMaster/img/gallery/header_card.png') }}"
                                        alt=""> --}}
                                    <h3>Fakultas Teknik</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-lg-12 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href=""><img src="{{ asset('backend/assets/img/logo-unkhair.png') }}"
                                            alt="" width="50"></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <nav>
                                        <ul id="navigation">
                                            @foreach ($menus as $menu)
                                                @foreach ($menu->items as $item)
                                                    <li
                                                        class="{{ $item->children->isNotEmpty() ? 'has-submenu' : '' }}">
                                                        <a
                                                            href="{{ $item->page ? url($item->page->slug) : $item->url }}">{{ $item->label }}</a>

                                                        @if ($item->children->isNotEmpty())
                                                            <ul class="submenu">
                                                                @foreach ($item->children as $child)
                                                                    <li
                                                                        class="{{ $child->children->isNotEmpty() ? 'has-submenu' : '' }}">
                                                                        <a
                                                                            href="{{ $child->page ? url($child->page->slug) : $child->url }}">{{ $child->label }}</a>

                                                                        {{-- Cek untuk sub-submenu --}}
                                                                        @if ($child->children->isNotEmpty())
                                                                            <ul class="submenu">
                                                                                @foreach ($child->children as $subchild)
                                                                                    <li>
                                                                                        <a
                                                                                            href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">{{ $subchild->label }}</a>
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
                                        </ul>
                                    </nav>



                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    <main>
        <!-- End Weekly-News -->
        <!--  Recent Articles start -->
        <div class="recent-articles pt-80 pb-80">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3> {{ $page->title }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p> {!! $page->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->

    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-main footer-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href=""><img src="themes/newsMaster/img/logo/logo2_footer.png"
                                                alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p class="info1">Lorem ipsum dolor sit amet, nsectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore.</p>
                                            <p class="info2">198 West 21th Street, Suite 721 New York,NY 10010</p>
                                            <p class="info2">Phone: +95 (0) 123 456 789 Cell: +95 (0) 123 456 789</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Popular post</h4>
                                </div>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="themes/newsMaster/img/gallery/footer_post1.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a>
                                        </h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="themes/newsMaster/img/gallery/footer_post2.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a>
                                        </h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                                <!-- Popular post -->
                                <div class="whats-right-single mb-20">
                                    <div class="whats-right-img">
                                        <img src="themes/newsMaster/img/gallery/footer_post3.png" alt="">
                                    </div>
                                    <div class="whats-right-cap">
                                        <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a>
                                        </h4>
                                        <p>Jhon | 2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                            <div class="single-footer-caption mb-50">
                                <div class="banner">
                                    <img src="themes/newsMaster/img/gallery/body_card4.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom aera -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> All rights reserved | This template is made with <i
                                            class="fa fa-heart" aria-hidden="true"></i> by <a
                                            href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Search model Begin -->
    <div class="search-model-box">
        <div class="d-flex align-items-center h-100 justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="{{ asset('themes/newsMaster/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('themes/newsMaster/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/popper.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('themes/newsMaster/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('themes/newsMaster/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('themes/newsMaster/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('themes/newsMaster/js/wow.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/animated.headline.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/jquery.magnific-popup.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('themes/newsMaster/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('themes/newsMaster/js/contact.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/jquery.form.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/mail-script.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('themes/newsMaster/js/plugins.js') }}"></script>
    <script src="{{ asset('themes/newsMaster/js/main.js') }}"></script>

</body>

</html>
