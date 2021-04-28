<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Akbarali') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app">
      <header class="p-3 mb-3 border-bottom mt-5 border">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
              <svg class="bi me-2" width="40" height="32">
                <use xlink:href="#bootstrap"></use>
              </svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li>
                <a  class="nav-link px-2 link-dark" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
                </a>
              </li>
              <li><a href="#" class="nav-link px-2 link-dark">Выставки</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Тур пакенты</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Сотрудники</a></li>
              <li><a href="#" class="nav-link px-2 link-dark">Маркетинг</a></li>
            </ul>
            <div class="dropdown text-end">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              @auth
              {{ Auth::user()->name }}
              @else
              <img src="https://avatars.githubusercontent.com/u/39323182?v=4" alt="mdo" width="32" height="32" class="rounded-circle">
              @endauth
              </a>
              <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                @guest
                @if (Route::has('login'))
                <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @endif
                @if (Route::has('register'))
                <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
                @else
                <li><a class="dropdown-item" href="#">Birnima</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                @endguest
              </ul>
            </div>
          </div>
        </div>
      </header>
      <main class="py-4">
        @yield('content')
      </main>
    </div>
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}" defer></script> 
  </body>
</html>
