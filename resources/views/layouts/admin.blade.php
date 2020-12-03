<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://kit.fontawesome.com/9a86b7e128.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">    
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="py-4" container-fluid>
            <aside>
                <div id="sidebar" class="sidebar float-left">
                    <div class="text-center">
                        <i class="fas fa-user-circle fa-5x"></i>
                        <h5> {{ Auth::user()->username }}</h5>
                        <hr>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills  flex-column">
                            <li class="nav-item">
                                <a href="{{ route('home')}}" class="nav-link {{ 'home' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fas fa-mail-bulk" href="#" id="navbarDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Permintaan Surat
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('psurat.index')}}">Semua Surat</a>
                                <a class="dropdown-item" href="{{ route('psurat.diajukan')}}">Belum di proses </a>
                                <a class="dropdown-item" href="{{ route('psurat.diproses')}}">Sedang di Proses</a>
                                <a class="dropdown-item" href="{{ route('psurat.ditolak')}}">Ditolak</a>                                
                                <a class="dropdown-item" href="{{ route('psurat.selesai')}}">Selesai</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('post.index')}}" class="nav-link {{ 'posts' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-scroll"></i> <span>Pemberitahuan</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('user.create')}}" class="nav-link {{ 'user/tambah' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user-plus"></i> <span>Tambah Admin</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="#" class="nav-link {{ '#' == request()->path() ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users-cog"></i> <span>Reset Password Warga</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            
                <div class="content">
                    @yield('content')
                </div>
            </aside>
        </main>
        
        <footer class="footer">
            <div class="text-center">
                <p>Copyright © 2020 Desa Kauman</p>
            </div>
        </footer>
    </div>

</body>

</html>