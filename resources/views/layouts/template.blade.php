<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>$okopedia</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg border rounded-0 navigation-clean-search">
        <div class="container"><a class="navbar-brand text-success" href="#">$okopedia</a><button data-toggle="collapse" data-target="#navcol-2" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse justify-content-start" id="navcol-1">
                <form class="form-inline">
                    <div class="form-group"><label for="search-field"><i class="fa fa-search" style="margin: 10px;"></i></label><input class="border rounded-0 form-control form-control-sm search-field" type="search" id="search-field" placeholder="Search"></div>
                </form>
                <ul class="nav navbar-nav"></ul>
        </div>
        <div class="collapse navbar-collapse d-xl-flex justify-content-xl-end" id="navcol-2">
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color: rgb(129,129,129);">Login</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: rgb(129,129,129);">Register</a></li>
                <li class="nav-item align-self-center" role="presentation">
                    <div class="nav-item dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(129,129,129);margin: 5px;">Username</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>