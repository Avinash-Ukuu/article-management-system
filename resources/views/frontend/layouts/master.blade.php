<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="hosting-provider" content="Netlify">
    <meta name="netlify-deploy"
        content="https://netlify.new/?utm_campaign=ai-legible&amp;utm_source=meta&amp;utm_medium=referral&amp;utm_id=65552bbf-c459-4c4a-b1e0-d43e92a7035a">
    <title> @yield('title', 'Best Blog - Article') </title>
     @stack('meta')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="manifest" href="site.webmanifest"> --}}
    <!-- favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="{{ asset('assets/frontend/images/icon.png') }}">

    <meta name="theme-color" content="#030303">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500&amp;family=Poppins:ital,wght@0,300;0,500;0,700;1,300;1,400&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/frontend/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <!-- loading -->
    <div class="loading-container">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <ul class="list-unstyled">
                <li>
                    <img src="{{ asset('assets/frontend/images/loading.png') }}" alt="Alternate Text" height="100">

                </li>
                <li>

                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>

                    </div>

                </li>
                <li>
                    <p>Loading</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- End loading -->

    <!-- loading -->
    <div class="loading-container">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <ul class="list-unstyled">
                <li>
                    <img src="{{ asset('assets/frontend/images/loading.png') }}" alt="Alternate Text" height="100">

                </li>
                <li>

                    <div class="spinner">
                        <div class="rect1"></div>
                        <div class="rect2"></div>
                        <div class="rect3"></div>
                        <div class="rect4"></div>
                        <div class="rect5"></div>

                    </div>

                </li>
                <li>
                    <p>Loading</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- End loading -->

    <!-- Header news -->
    <header class="bg-light">
        <!-- Navbar  Top-->
        <div class="topbar d-none d-sm-block">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="topbar-left">
                            <div class="topbar-text">
                                {{ \Carbon\Carbon::now()->format('l, F d, Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="list-unstyled topbar-right">
                            {{-- <ul class="topbar-link">
                                <li><a href="#" title="">Contact Us</a></li>
                            </ul> --}}
                            <ul class="topbar-sosmed">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar Top  -->
        <!-- Navbar  -->
        <!-- Navbar menu  -->
        <div class="navigation-wrap navigation-shadow bg-white">
            <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
                <div class="container">
                    <div class="offcanvas-header">
                        <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                            <span class="fa fa-align-justify"></span>
                        </div>
                    </div>
                    <figure class="mb-0 mx-auto">
                        <a href="{{ route('home') }}">
                            <img style="height: auto; width: 200px;" src="{{ asset('assets/frontend/images/logo.png') }}" alt=""
                                class="img-fluid logo">
                        </a>
                    </figure>
                    <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                        <ul class="navbar-nav ml-auto ">
                            <li class="nav-item dropdown">
                                <a class="nav-link active" href="{{ route('home') }}"> Home
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="{{ route('about') }}">
                                    About </a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('categories') }}"> Category </a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#"> contact </a></li> --}}
                        </ul>


                        <!-- Search bar.// -->
                        <ul class="navbar-nav ">
                            <li class="nav-item search hidden-xs hidden-sm "> <a class="nav-link" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- Search content bar.// -->
                        <div class="top-search navigation-shadow">
                            <div class="container">
                                <div class="input-group ">
                                    <form action="{{ route('search') }}" method="GET">

                                        <div class="row no-gutters mt-3">
                                            <div class="col">
                                                <input class="form-control border-secondary border-right-0 rounded-0"
                                                    type="search" value="{{ request('q') }}" name="q" placeholder="Search "
                                                    id="example-search-input4">
                                            </div>
                                            <div class="col-auto">
                                                <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                    type="submit">
                                                    <i class="fa fa-search"></i>
                                            </button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Search content bar.// -->
                    </div> <!-- navbar-collapse.// -->
                </div>
            </nav>
        </div>
        <!-- End Navbar menu  -->

        <!-- Navbar sidebar menu  -->
        <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-aside" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="widget__form-search-bar  ">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="row no-gutters">
                                    <div class="col">
                                        <input class="form-control border-secondary border-right-0 rounded-0"
                                            type="search" value="{{ request('q') }}" name="q" placeholder="Search">
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"  type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <nav class="list-group list-group-flush">
                            <ul class="navbar-nav ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-dark" href="{{route('home')}}"> Home
                                    </a>
                                </li>


                                <li class="nav-item dropdown">
                                    <a class="nav-link text-dark" href="{{ route('about') }}"> About
                                    </a>
                                </li>


                                <li class="nav-item"><a class="nav-link  text-dark" href="{{ route('categories') }}"> Category </a>
                                </li>
                                {{-- <li class="nav-item"><a class="nav-link  text-dark" href="#"> contact </a>
                                </li> --}}
                            </ul>

                        </nav>
                    </div>
                    <div class="modal-footer">
                        <p>© 2026 <a href="http://www.nastservices.com/"
                                title="Premium news">NAST Services</a>
                           .</p>
                    </div>
                </div>
            </div> <!-- modal-bialog .// -->
        </div> <!-- modal.// -->
        <!-- End Navbar sidebar menu  -->
        <!-- End Navbar  -->
    </header>
    <!-- End Header news -->
    @yield('content')

   @include('frontend.layouts.footer')


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <script src="{{ asset('assets/frontend/js/index.bundle.js') }}"></script>


</body>

</html>
