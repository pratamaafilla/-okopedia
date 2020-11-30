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
    <link href="{{ asset('assets/css/Login-Form-Clean.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/Navigation-Clean.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container"><a class="navbar-brand text-success" href="{{url('/admin-page')}}">Admin</a><button data-toggle="collapse"
                class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                            aria-expanded="false" href="#">Products</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                href="{{url('/admin/add_product')}}">Add
                                Product</a><a class="dropdown-item" role="presentation" href="{{url('/admin-page')}}">Product
                                List</a></div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                            aria-expanded="false" href="#">Categories</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                href="{{url('/admin/add_category')}}">Add
                                Category</a><a class="dropdown-item" role="presentation"
                                href="{{url('/admin/category_list')}}">Category List</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                            aria-expanded="false" href="#">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li>
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
