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
        /* General styling for navbar */
        .navbar-nav .nav-link {
            color: #333;
            padding: 10px 15px;
        }

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

        .navbar-nav .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-left: 0;
            display: none;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .navbar-nav .dropdown-menu a {
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            display: block;
        }

        .navbar-nav .dropdown-menu a:hover {
            background-color: #f8f9fa;
        }

        .dropdown-menu .dropdown-toggle::after {
            display: inline-block;
            margin-left: 4px;
            vertical-align: middle;
            content: "";
            font-size: 12px;
        }

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
    {{-- header --}}
    @include('themes.news-master.layouts.header')
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
    <!-- JavaScript for Toggle Functionality -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Toggle submenu on click
            document.querySelectorAll('.dropdown-submenu > a').forEach(function(element) {
                element.addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    let submenu = this.nextElementSibling;
                    if (submenu.style.display === 'block') {
                        submenu.style.display = 'none';
                    } else {
                        submenu.style.display = 'block';
                    }
                });
            });
        });
    </script>
</body>

</html>
