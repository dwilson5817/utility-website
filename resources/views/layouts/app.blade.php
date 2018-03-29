<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @yield('styles')

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('pre-scripts')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard @if(Route::current()->getName() == 'dashboard') <span class="sr-only">(current)</span> @endif</a>
                        </li>
                        <li class="nav-item {{ Route::current()->getName() == 'url.form' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('url.form') }}">URL Shortener @if(Route::current()->getName() == 'url.form') <span class="sr-only">(current)</span> @endif</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        @if (Auth::guest())
                            <li class="nav-item {{ Route::current()->getName() == 'login' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">Login @if(Route::current()->getName() == 'login') <span class="sr-only">(current)</span> @endif</a>
                            </li>
                            <li class="nav-item {{ Route::current()->getName() == 'register' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('register') }}">Register @if(Route::current()->getName() == 'register') <span class="sr-only">(current)</span> @endif</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <div class="container">
            <div class="card my-4">
                <div class="card-body">
                    This website was developed by Dylan Wilson using Laravel and Bootstrap.  This site is licensed under the MIT
                    license.  The source for this website can be found <a href="https://github.com/dwilson5817/utility-website">here</a>.
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    @yield('post-scripts')
</body>
</html>
