<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ @$title != '' ? "$title - " : '' }}{{ config('app.name') }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('backend/assets/img/logo-unkhair.png') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('backend/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" /> --}}

    {{-- summernote --}}
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @stack('css')
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/lfm.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/dropzone.min.css') }}">
</head>

<body>
    <div class="wrapper">
        {{-- sidebar --}}
        @include('backend.layouts.sidebar')

        <div class="main-panel">
            {{-- header --}}
            @include('backend.layouts.header')

            @yield('body')

            {{-- footer --}}
            @include('backend.layouts.footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Google Maps Plugin -->
    <script src="{{ asset('backend/assets/js/plugin/gmaps/gmaps.js') }}"></script>

    <!-- Sweet Alert -->
    {{-- <script src="{{ asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});

            // $("#multi-filter-select").DataTable({
            //     pageLength: 5,
            //     initComplete: function() {
            //         this.api()
            //             .columns()
            //             .every(function() {
            //                 var column = this;
            //                 var select = $(
            //                         '<select class="form-select"><option value=""></option></select>'
            //                     )
            //                     .appendTo($(column.footer()).empty())
            //                     .on("change", function() {
            //                         var val = $.fn.dataTable.util.escapeRegex($(this).val());

            //                         column
            //                             .search(val ? "^" + val + "$" : "", true, false)
            //                             .draw();
            //                     });

            //                 column
            //                     .data()
            //                     .unique()
            //                     .sort()
            //                     .each(function(d, j) {
            //                         select.append(
            //                             '<option value="' + d + '">' + d + "</option>"
            //                         );
            //                     });
            //             });
            //     },
            // });

            // // Add Row
            // $("#add-row").DataTable({
            //     pageLength: 5,
            // });

            // var action =
            //     '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            // $("#addRowButton").click(function() {
            //     $("#add-row")
            //         .dataTable()
            //         .fnAddData([
            //             $("#addName").val(),
            //             $("#addPosition").val(),
            //             $("#addOffice").val(),
            //             action,
            //         ]);
            //     $("#addRowModal").modal("hide");
            // });
        });
    </script>

    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}", 'Success');
        @elseif (session('error'))
            toastr.error("{{ session('error') }}", 'Error');
        @elseif (session('warning'))
            toastr.warning("{{ session('warning') }}", 'Warning');
        @elseif (session('info'))
            toastr.info("{{ session('info') }}", 'Info');
        @endif
    </script>

    @stack('scripts')
    <!-- Include Laravel File Manager's script -->
    <script src="{{ asset('vendor/laravel-filemanager/js/filemanager.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/dropzone.min.js') }}"></script>
    <script>
        // Handle file selection
        window.addEventListener('message', function(event) {
            if (event.origin === "{{ url('/') }}") {
                var data = event.data;
                if (data && data.link) {
                    console.log('File URL:', data.link); // Handle the file URL as needed
                    // Example: Show the selected file URL in an alert
                    alert('File URL: ' + data.link);
                }
            }
        }, false);
    </script>
</body>

</html>
