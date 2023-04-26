<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{asset('custom/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('custom/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="body-pd">

@guest
    <header class="header  navbar_guest" id="header">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </nav>
    </header>
@else
    <header class="header" id="header">
        <div class="header_toggle"><i class='bx bx-menu' id="header-toggle"></i></div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="{{route('home')}}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Notificator</span>
                </a>
                <div class="nav_list">
{{--                    <a href="{{route('administration')}}" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span>--}}
{{--                    </a>--}}
{{--                    <a href="{{route('administration')}}" class="nav_link"> <i class='bx bx-cog nav_icon'></i> <span--}}
{{--                            class="nav_name">Administration</span> </a>--}}
                    <a href="{{route('agents')}}" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span
                            class="nav_name">Agents/Servers</span> </a>
                    <a href="{{route('sites')}}" class="nav_link"> <i class='bx bx-customize nav_icon'></i> <span
                            class="nav_name">Sites</span> </a>
{{--                    <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span>--}}
{{--                    </a>--}}
{{--                    <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span--}}
{{--                            class="nav_name">Files</span> </a>--}}
{{--                    <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span>--}}
{{--                    </a>--}}
                </div>
            </div>

            <a href="{{ route('logout') }}" class="nav_link"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">{{ __('Logout') }}</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
    </div>
    <!--Container Main start-->
@endguest

<div id="app">
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                    <main>
                        @yield('content')
                    </main>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<script src="{{ asset('custom/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('custom/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('custom/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('custom/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
{{--<script src="{{ asset('custom/vendor/chart.js/Chart.min.js') }}"></script>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>--}}
{{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.com/libraries/Chart.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.bundle.js"></script>
</body>
</html>
