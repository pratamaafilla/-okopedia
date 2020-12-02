<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>$okopedia</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/Footer-Basic.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/Navigation-with-Search.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg navigation-clean-search">
        <div class="container"><a class="navbar-brand text-success" href="{{url('/')}}"
                style="margin-left: 10px;">$okopedia</a><button data-toggle="collapse" data-target="#navcol-2"
                class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search"
                                style="margin: 10px;"></i></label><input
                            class="border rounded-0 shadow-lg form-control form-control-sm search-field" type="search"
                            name="search" value="{{Request::input('search')}}" id="search-field" placeholder="Search"
                            style="width: 400px;"></div>
                    <button class="btn btn-success btn-sm" type="submit" style="margin-left: 10px;">Search</button>
                </form>
                <ul class="nav navbar-nav"></ul>
            </div>
            <div class="collapse navbar-collapse d-lg-flex d-xl-flex justify-content-lg-end align-items-lg-center justify-content-xl-end align-items-xl-center"
                id="navcol-2">
                <ul class="nav navbar-nav text-right d-xl-flex ml-auto justify-content-xl-center align-items-xl-center">

                    @guest
                    <li class="nav-item d-lg-flex align-items-lg-center" role="presentation"><a
                            class="nav-link d-lg-flex justify-content-lg-center align-items-lg-center"
                            style="color: rgb(129,129,129);" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if(Route::has('register'))
                    <li class="nav-item d-lg-flex align-items-lg-center" role="presentation"><a
                            class="nav-link d-lg-flex justify-content-lg-center align-items-lg-center"
                            style="color: rgb(129,129,129);" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    
                    <li class="nav-item" role="presentation" style="margin-right: 5px;">
                        <a class="nav-link" href="{{url ('/cart')}}">
                            <img style="width: 25px;" src="{{ asset('assets/img/icons8-shopping-cart-64.png')}}">
                            <span class='badge badge-success' id='lblCartCount'> {{$count}} </span>
                        </a>
                    </li>
                    <li class="nav-item d-lg-flex align-items-lg-center" role="presentation"
                        style="margin-left: 0px;margin-right: 10px;"><a href="{{url('/history')}}" style="color: white;" class="btn btn-success btn-sm"
                            type="button">History</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: rgb(129,129,129);" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <div class="footer-basic">
        <footer>
            <p class="copyright">$okopedia © 2020</p>
        </footer>
    </div>
</body>

</html>
