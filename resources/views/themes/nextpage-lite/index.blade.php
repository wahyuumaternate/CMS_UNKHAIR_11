<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NextPage</title>

    <!-- favicon -->
    <link rel=icon href="{{ asset('backend/assets/img/logo-unkhair.png') }}" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('themes/nextpage-lite/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/nextpage-lite/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/nextpage-lite/css/responsive.css') }}">

    <style>
        /* General styling for navbar */
        .navbar-nav .nav-link {
            color: #333;
            padding: 10px 15px;
        }

        /* Dropdown Menu Styling */
        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            display: none;
            margin-top: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            min-width: 200px;
            z-index: 1000;
        }

        /* Show dropdown on hover */
        .navbar-nav .dropdown:hover>.dropdown-menu {
            display: block;
        }

        /* Submenu Positioning */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            /* Aligns the submenu to the right of the parent item */
            margin-left: 0;
            display: none;
        }

        /* Show submenu on hover of parent item */
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        /* Dropdown items styling */
        .navbar-nav .dropdown-menu a {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            display: block;
        }

        .navbar-nav .dropdown-menu a:hover {
            background-color: #f8f9fa;
        }

        /* Custom arrow for dropdown toggle items */
        .dropdown-menu .dropdown-toggle::after {
            display: inline-block;
            margin-left: 4px;
            vertical-align: middle;
            content: "";
            font-size: 12px;
        }

        .dropdown-item,
        .dropdown-submenu,
        .dropdown-menu {
            color: black !important;

        }

        /* Responsive styling for mobile view */
        @media (max-width: 992px) {
            .navbar-nav {
                display: block;
            }

            .dropdown-menu {
                position: static;
            }

            .dropdown-menu .dropdown-submenu .dropdown-menu {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>

    <!-- search popup start-->
    <div class="td-search-popup" id="td-search-popup">
        <form action="" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- header start -->
    <div class="navbar-area">
        <!-- topbar end-->
        <div class="topbar-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 align-self-center">
                        <div class="topbar-menu text-md-left text-center">
                            <ul class="align-self-center">
                                <li><a href="#">Author</a></li>
                                <li><a href="#">Advertisment</a></li>
                                <li><a href="#">Member</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 mt-2 mt-md-0 text-md-right text-center">
                        <div class="topbar-social">
                            <div class="topbar-date d-none d-lg-inline-block"><i class="fa fa-calendar"></i> Saturday,
                                October 7</div>
                            <ul class="social-area social-area-2">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- topbar end-->

        <!-- adbar end-->
        <div class="adbar-area bg-black d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 align-self-center">
                        <div class="logo text-md-left text-center">
                            <a class="main-logo" href=""><img
                                    src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="img"
                                    width="80"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 text-md-right text-center">
                        <a href="#" class="adbar-right">
                            {{-- <img src="themes/nextpage-lite/img/add/1.png" alt="img"> --}}
                            <h3 class="text-white">Fakultas Teknik</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- adbar end-->

        <!-- navbar start -->
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
                        <a class="main-logo" href="#">
                            <img src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="img"
                                style="max-width: 30px">
                        </a>
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#themes/nextpage_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>

                <div class="collapse navbar-collapse" id="themes/nextpage_main_menu">
                    <ul class="navbar-nav menu-open">
                        <!-- Dynamic menu items from database -->
                        @foreach ($menus as $menu)
                            @foreach ($menu->items as $item)
                                <li
                                    class="nav-item {{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
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
                    </ul>
                </div>




            </div>
        </nav>
        <!-- navbar end -->

        <!-- navbar end -->

    </div>
    <!-- navbar end -->

    <!-- banner area start -->
    <div class="banner-area banner-inner-1 bg-black" id="banner">
        <!-- banner area start -->
        <div class="banner-inner pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="thumb after-left-top">
                            <img src="themes/nextpage-lite/img/banner/1.png" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="banner-details mt-4 mt-lg-0">
                            <div class="post-meta-single">
                                <ul>
                                    <li><a class="tag-base tag-blue" href="#">Tech</a></li>
                                    <li class="date"><i class="fa fa-clock-o"></i>08.22.2020</li>
                                </ul>
                            </div>
                            <h2>ReZoom outage left some people locked out.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                            <a class="btn btn-blue" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- banner area end -->

        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/1.png" alt="img">
                            <a class="tag-base tag-blue" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">The FAA will test drone detecting technologies in
                                    airports this year</a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/2.png" alt="img">
                            <a class="tag-base tag-orange" href="#">Food</a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">Rocket Lab will resume launches no sooner than August
                                    27th</a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/3.png" alt="img">
                            <a class="tag-base tag-blue" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">Google Drive flaw may attackers fool you into install
                                    malware</a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-white">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/4.png" alt="img">
                            <a class="tag-base tag-orange" href="#">Food</a>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">TikTok will sue the US over threatened ban</a></h6>
                            <div class="post-meta-single mt-3">
                                <ul>
                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->

    <div class="post-area pd-top-75 pd-bottom-50" id="trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Trending News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="trending-post">
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="themes/nextpage-lite/img/post/5.png" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">The FAA will test drone </a></h6>
                                    </div>
                                </div>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="themes/nextpage-lite/img/post/6.png" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">Flight schedule and quarantine</a></h6>
                                    </div>
                                </div>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="themes/nextpage-lite/img/post/7.png" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">Indore bags cleanest city</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="trending-post">
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="themes/nextpage-lite/img/post/5.png" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">The FAA will test drone </a></h6>
                                    </div>
                                </div>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="themes/nextpage-lite/img/post/6.png" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">Flight schedule and quarantine</a></h6>
                                    </div>
                                </div>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <img src="themes/nextpage-lite/img/post/7.png" alt="img">
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i>December 26, 2018</p>
                                        </div>
                                        <h6 class="title"><a href="#">Indore bags cleanest city</a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Latest News</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/1.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Himachal Pradesh rules in order to
                                                    allow tourists </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/2.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Online registration, booking for
                                                    Vaishno Devi </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/3.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Detecting technologies in airports
                                                    this year</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/4.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">The FAA will drone detect-ing in
                                                    airports this year</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/5.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Thailand makes it mand-atory for
                                                    tourists to stay</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/1.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Himachal Pradesh rules in order to
                                                    allow tourists </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/2.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Online registration, booking for
                                                    Vaishno Devi </a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/3.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Detecting technologies in airports
                                                    this year</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/4.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">The FAA will drone detect-ing in
                                                    airports this year</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="themes/nextpage-lite/img/post/list/5.png" alt="img">
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="#">Thailand makes it mand-atory for
                                                    tourists to stay</a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">What’s new</h6>
                    </div>
                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="single-post-wrap">
                                <div class="thumb">
                                    <img src="themes/nextpage-lite/img/post/8.png" alt="img">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <li><a class="tag-base tag-blue" href="#">Tech</a></li>
                                            <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="#">Uttarakhand’s Hemkund Sahib yatra to start
                                            from September 4</a></h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="single-post-wrap">
                                <div class="thumb">
                                    <img src="themes/nextpage-lite/img/post/8.png" alt="img">
                                </div>
                                <div class="details">
                                    <div class="post-meta-single mb-4 pt-1">
                                        <ul>
                                            <li><a class="tag-base tag-blue" href="#">Tech</a></li>
                                            <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                        </ul>
                                    </div>
                                    <h6 class="title"><a href="#">Uttarakhand’s Hemkund Sahib yatra to start
                                            from September 4</a></h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Join With Us</h6>
                    </div>
                    <div class="social-area-list mb-4">
                        <ul>
                            <li><a class="facebook" href="#"><i
                                        class="fa fa-facebook social-icon"></i><span>12,300</span><span>Like</span> <i
                                        class="fa fa-plus"></i></a></li>
                            <li><a class="twitter" href="#"><i
                                        class="fa fa-twitter social-icon"></i><span>12,600</span><span>Followers</span>
                                    <i class="fa fa-plus"></i></a></li>
                            <li><a class="youtube" href="#"><i
                                        class="fa fa-youtube-play social-icon"></i><span>1,300</span><span>Subscribers</span>
                                    <i class="fa fa-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i
                                        class="fa fa-instagram social-icon"></i><span>52,400</span><span>Followers</span>
                                    <i class="fa fa-plus"></i></a></li>
                            <li><a class="google-plus" href="#"><i
                                        class="fa fa-google social-icon"></i><span>19,101</span><span>Subscribers</span>
                                    <i class="fa fa-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="add-area">
                        <a href="#"><img class="w-100" src="themes/nextpage-lite/img/add/6.png"
                                alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-sky pd-top-80 pd-bottom-50" id="latest">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay-bg">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/9.png" alt="img">
                        </div>
                        <div class="details">
                            <div class="post-meta-single mb-3">
                                <ul>
                                    <li><a class="tag-base tag-blue" href="cat-fashion.html">fashion</a></li>
                                    <li>
                                        <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                                    </li>
                                </ul>
                            </div>
                            <h6 class="title"><a href="#">A Comparison of the Sony FE 85mm f/1.4 GM and
                                    Sigma</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/10.png" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">Rocket Lab will resume launches no sooner than</a>
                            </h6>
                        </div>
                    </div>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/11.png" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">P2P Exchanges in Africa Pivot: Nigeria and Kenya
                                    the</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/12.png" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">Bitmex Restricts Ontario Residents as Mandated by</a>
                            </h6>
                        </div>
                    </div>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/13.png" alt="img">
                            <p class="btn-date"><i class="fa fa-clock-o"></i>08.22.2020</p>
                        </div>
                        <div class="details">
                            <h6 class="title"><a href="#">The Bitcoin Network Now 7 Plants Worth of Power</a>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="trending-post style-box">
                        <div class="section-title">
                            <h6 class="title">Trending News</h6>
                        </div>
                        <div class="post-slider owl-carousel">
                            <div class="item">
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/1.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Important to rate more
                                                        liquidity</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/2.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/3.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin
                                                        Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/4.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap mb-0">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/5.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin
                                                        Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/1.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Important to rate more
                                                        liquidity</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/2.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/3.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin
                                                        Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/4.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Sounds like John got the Josh</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-post-list-wrap mb-0">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="themes/nextpage-lite/img/post/list/5.png" alt="img">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                                <div class="post-meta-single">
                                                    <ul>
                                                        <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                                    </ul>
                                                </div>
                                                <h6 class="title"><a href="#">Grayscale's and Bitcoin
                                                        Trusts</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pd-top-80 pd-bottom-50" id="grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/15.png" alt="img">
                            <a class="tag-base tag-purple" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Why Are the Offspring of Older </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/16.png" alt="img">
                            <a class="tag-base tag-green" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">People Who Eat a Late Dinner May</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/17.png" alt="img">
                            <a class="tag-base tag-red" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Kids eat more calories in </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/18.png" alt="img">
                            <a class="tag-base tag-purple" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">The FAA will test drone </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/19.png" alt="img">
                            <a class="tag-base tag-red" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Lifting Weights Makes Your Nervous</a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/20.png" alt="img">
                            <a class="tag-base tag-blue" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">New, Remote Weight-Loss Method </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/21.png" alt="img">
                            <a class="tag-base tag-light-green" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Social Connection Boosts Fitness App </a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="themes/nextpage-lite/img/post/22.png" alt="img">
                            <a class="tag-base tag-blue" href="#">Tech</a>
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title"><a href="#">Internet For Things - New results </a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-area bg-black pd-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">ABOUT US</h5>
                        <div class="widget_about">
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Quis ipsum ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                                facilisis.</p>
                            <ul class="social-area social-area-2 mt-4">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a>
                                </li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_tag_cloud">
                        <h5 class="widget-title">TAGS</h5>
                        <div class="tagcloud">
                            <a href="#">Consectetur</a>
                            <a href="#">Video</a>
                            <a href="#">App</a>
                            <a href="#">Food</a>
                            <a href="#">Game</a>
                            <a href="#">Internet</a>
                            <a href="#">Phones</a>
                            <a href="#">Development</a>
                            <a href="#">Video</a>
                            <a href="#">Game</a>
                            <a href="#">Gadgets</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h5 class="widget-title">CONTACTS</h5>
                        <ul class="contact_info_list">
                            <li><i class="fa fa-map-marker"></i> 829 Cabell Avenue Arlington, VA 22202</li>
                            <li><i class="fa fa-phone"></i> +088 012121240</li>
                            <li><i class="fa fa-envelope-o"></i> Info@website.com <br> Support@mail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget_recent_post">
                        <h5 class="widget-title">POPULAR NEWS</h5>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="themes/nextpage-lite/img/post/list/1.png" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">Himachal Pradesh rules in order to allow
                                                tourists </a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-post-list-wrap style-white">
                            <div class="media">
                                <div class="media-left">
                                    <img src="themes/nextpage-lite/img/post/list/2.png" alt="img">
                                </div>
                                <div class="media-body">
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <ul>
                                                <li><i class="fa fa-clock-o"></i>08.22.2020</li>
                                            </ul>
                                        </div>
                                        <h6 class="title"><a href="#">Himachal Pradesh rules in order to allow
                                                tourists </a></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <ul class="widget_nav_menu">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">rivacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <p>Copyright ©2021 <a href="https://solverwp.com/">SolverWp</a></p>
            </div>
        </div>
    </div>

    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->

    <!-- all plugins here -->
    <script src="{{ asset('themes/nextpage-lite/js/vendor.js') }}"></script>
    <!-- main js  -->
    <script src="{{ asset('themes/nextpage-lite/js/main.js') }}"></script>
</body>

</html>
