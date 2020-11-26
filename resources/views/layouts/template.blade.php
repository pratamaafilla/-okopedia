<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>$okopedia</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" defer></script>

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
                            style="width: 343px;"></div>
                    <button class="btn btn-success btn-sm" type="submit" style="margin-left: 10px;">Search</button>
                </form>
                <ul class="nav navbar-nav"></ul>
            </div>
            <div class="collapse navbar-collapse d-lg-flex d-xl-flex justify-content-lg-end align-items-lg-center justify-content-xl-end align-items-xl-center"
                id="navcol-2">
                <ul class="nav navbar-nav text-right d-xl-flex ml-auto justify-content-xl-center align-items-xl-center">
                    <li class="nav-item" role="presentation" style="margin-right: 5px;"><a
                            class="nav-link active d-lg-flex d-xl-flex align-items-lg-center justify-content-xl-center align-items-xl-center"
                            href="#"><img class="img-fluid d-xl-flex justify-content-xl-center align-items-xl-center"
                                src="{{ asset('assets/img/icons8-shopping-cart-64.png')}}" style="width: 30px;"></a>
                    </li>
                    <li class="nav-item d-lg-flex align-items-lg-center" role="presentation"><a
                            class="nav-link d-lg-flex justify-content-lg-center align-items-lg-center" href="#"
                            style="color: rgb(129,129,129);">Login</a></li>
                    <li class="nav-item d-lg-flex align-items-lg-center" role="presentation"><a
                            class="nav-link d-lg-flex justify-content-lg-center align-items-lg-center" href="#"
                            style="color: rgb(129,129,129);">Register</a></li>
                    <li class="nav-item d-lg-flex align-items-lg-center visible" role="presentation"
                        style="margin-left: 10px;">
                        <div class="nav-item dropdown"><a
                                class="dropdown-toggle d-lg-flex justify-content-lg-center align-items-lg-center"
                                data-toggle="dropdown" aria-expanded="false" href="#"
                                style="color: rgb(129,129,129);">Username</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                    href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second
                                    Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </div>
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
