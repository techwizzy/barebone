<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />


    </head>
    <body class="font-sans antialiased">
        <div id="wrapper">

            @include('layouts.navigation')

            <!-- Page Heading -->
            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">


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
             <!-- Vendor js -->
             <script src="{{ asset('js/vendor.min.js') }}"></script>

             <script src="{{ asset('libs/morris-js/morris.min.js') }}"></script>
             <script src="{{ asset('libs/raphael/raphael.min.js') }}"></script>

             <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>

             <!-- App js -->
             <script src="{{ asset('js/app.min.js') }}"></script>
    </body>
</html>
