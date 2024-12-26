<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $site_name->value }}</title>
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

    @stack('styles')

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

        /* Ubah warna teks dan latar belakang saat diblok */
        ::selection {
            background-color: #FFB200;
            /* Warna latar belakang */
            color: black;
            /* Warna teks */
        }

        /* Untuk kompatibilitas dengan Firefox */
        ::-moz-selection {
            background-color: #FFB200;
            color: black;
        }

        .post-img img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .post-img img:hover {
            transform: scale(1.05);
            /* Efek zoom saat hover */
        }

        .post-title {
            text-align: center;
            margin-top: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .gallery-meta ul {
            list-style: none;
            padding: 0;
        }

        .gallery-meta ul li {
            margin-bottom: 8px;
            font-size: 16px;
        }

        .related-gallery h3 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>

<body class="index-page">
    @include('themes.zenblog.layouts.header')

    @yield('main')

    <footer id="footer" class="footer dark-background">

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $site_name->value }}</strong> <span>All Rights
                    Reserved</span>
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
    @stack('scripts')
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
