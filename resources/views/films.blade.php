<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ url('css/app.css') }}">
        <link rel="stylesheet" href="{{ url('css/style.css') }}">
        <!-- Styles -->
    </head>
    <body>
        <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
            <a href="../" class="navbar-brand">Films</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav menus">
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
        <div class="container">

            <div class="bs-docs-section clearfix">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="page-header">
                            <h1 id="navbars">@yield('title_page')</h1>
                        </div>
                        <div class="bs-component">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="{{ url('js/app.js') }}"></script>
    </body>
</html>
