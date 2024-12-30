<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Erik Borgogno') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/e_logo.ico') }}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        @auth
        <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="d-inline-block align-text-top" height="30">
                </a>

                <!-- Hamburger for mobile view -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route('guest.home') ? 'active' : '' }}" href="{{ route('guest.home') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route('admin.home') ? 'active' : '' }}" href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route('admin.skill') ? 'active' : '' }}" href="{{ route('admin.skill') }}">{{ __('Skills') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->route('admin.project') ? 'active' : '' }}" href="{{ route('admin.project') }}">{{ __('Projects') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.work') ? 'active' : '' }}" href="{{ route('admin.work') }}">{{ __('Works') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.certification') ? 'active' : '' }}" href="{{ route('admin.certification') }}">{{ __('Certifications') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link position-relative {{ request()->routeIs('admin.messages') ? 'active' : '' }}" href="{{ route('admin.messages') }}">
                                {{ __('Messages') }}
                                @if(Auth::user()->unreadMessages() && Auth::user()->unreadMessages()->count() > 0)
                                    <span id="messageCOunter" class=" position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ Auth::user()->unreadMessages()->count() <= 99 ? Auth::user()->unreadMessages()->count() : '+99' }}
                                    </span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <a class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}" href="{{ route('admin.profile') }}">{{ __('Profilo') }}</a>
                        </li>
                        <li class="nav-item d-block d-lg-none">
                            <a class="nav-link {{ request()->routeIs('logout') ? 'active' : '' }}" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                        </li>
                    </ul>

                    <!-- Settings dropdown -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-lg-block d-none">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.profile') }}">{{ __('Profilo') }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endauth

        <main class="py-5">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    <script src="{{ asset('js/front.js') }}" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateUnreadCount() {
                fetch('/messages/unread-count')
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('messageCounter').textContent = data.unreadCount <= 99 ? data.unreadCount : '+99';
                    });
            }

            // Chiama la funzione per aggiornare il conteggio quando un messaggio viene visualizzato
            document.querySelectorAll('.message-link').forEach(link => {
                link.addEventListener('click', function() {
                    updateUnreadCount();
                });
            });
        });
    </script>
</body>
</html>
