<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


        <link href="{{ asset('libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />
        <link href="{{ asset('libs/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('libs/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
        <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Summernote css -->
        <link href="{{ asset('libs/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />

          <!-- Vendor js -->
          <script src="{{ asset('js/vendor.min.js') }}"></script>
          <!-- App js -->
          <script src="{{ asset('js/app.min.js') }}"></script>


    </head>
    <body class="font-sans antialiased">
        <div id="wrapper">

            @include('layouts.navigation')

            <!-- Page Heading -->
            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <x-validation-errors></x-validation-errors>
                        <x-success-message></x-success-message>
                        <!-- Page Content -->

                            {{ $slot }}
                      </div>
                    </div>
                     <!-- Footer Start -->
                     <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                   {{ now()->year; }} &copy; Code by <a href="">Alois</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

               </div>
        </div>


             <script src="{{ asset('libs/morris-js/morris.min.js') }}"></script>
             <script src="{{ asset('libs/raphael/raphael.min.js') }}"></script>
             <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
             <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
                    <!-- Required datatable js -->
            <script src="{{ asset('libs/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Buttons examples -->
            <script src="{{ asset('libs/datatables/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('libs/datatables/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('libs/datatables/dataTables.keyTable.min.js') }}"></script>
            <script src="{{ asset('libs/datatables/dataTables.select.min.js') }}"></script>
            <script src="{{ asset('libs/jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('libs/pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ asset('libs/pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ asset('libs/datatables/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('libs/datatables/buttons.print.min.js') }}"></script>

            <!-- Responsive examples -->
            <script src="{{ asset('libs/datatables/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('libs/datatables/responsive.bootstrap4.min.js') }}"></script>
            <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>


            <!-- Datatables init -->
            <script src="{{ asset('js/pages/datatables.init.js') }}"></script>
            <script src="{{ asset('libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
            <script src="{{ asset('libs/moment/moment.min.js') }}"></script>
            <script src="{{ asset('libs/switchery/switchery.min.js') }}"></script>
            <script src="{{ asset('libs/select2/select2.min.js') }}"></script>
            <script src="{{ asset('libs/parsleyjs/parsley.min.js') }}"></script>
            <script src="{{ asset('libs/bootstrap-filestyle2/bootstrap-filestyle.min.js') }}"></script>
            <script src="{{ asset('libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
            <script src="{{ asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
            <script src="{{ asset('libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
            <script src="{{ asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
            <script src="{{ asset('libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
            <!-- Summernote js -->
            <script src="{{ asset('libs/summernote/summernote-bs4.min.js') }}"></script>
            <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>
            <script src="{{ asset('js/pages/form-advanced.init.js') }}"></script>
    </body>
</html>
