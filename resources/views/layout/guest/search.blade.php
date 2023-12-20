<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemweb-PDKI</title>
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/shared/iconly.css') }}">

    <link rel="stylesheet" href="{{ asset('/dist/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/main/app-dark.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('/dist/assets/images/logo/favicon.svg') }}" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ asset('/logo/uns.png') }}" type="image/png">

</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                {{-- <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a>
                        </div>
                        <div class="header-top-right">
                            <a class="btn btn-primary bg-gradient" href="">
                                <i class="bi bi-box-arrow-in-right me-1"></i>
                                <span>Login</span>
                            </a>
                            <!-- Burger button responsive -->
                            <a href="#" class="burger-btn d-block d-xl-none">
                                <i class="bi bi-justify fs-3"></i>
                            </a>
                        </div>
                    </div>
                </div> --}}
                <nav class="main-navbar">
                    <div class="container">
                        <ul class="d-flex justify-content-end">
                            <li class="menu-item me-auto">
                                <a href="/">
                                    <span class="menu-link">Pemweb - PDKI</span>
                                </a>
                            </li>
                            <li class="menu-item">
                                @if (auth()->user())
                                    <a class="btn btn-success bg-gradient" href="/login">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>
                                        <span>Dashboard</span>
                                    </a>
                                @else
                                    <a class="btn btn-success bg-gradient" href="/login">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>
                                        <span>Login</span>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- Burger button responsive -->
                <div class="container">
                    <div class="float-end">
                        <a href="#" class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>

                </div>

            </header>

            <div class="content-wrapper container">

                <div class="page-heading">

                </div>
                <div class="page-content">
                    @yield('container')
                </div>

            </div>

            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-end">
                            <p>2023 &copy; Pemweb - PDKI</p>
                        </div>
                        <div class="float-end">

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('/dist/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/dist/assets/js/app.js') }}"></script>
    <script src="{{ asset('/dist/assets/js/pages/horizontal-layout.js') }}"></script>

    <script src="{{ asset('/dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src={{ asset('/dist/assets/js/pages/dashboard.js') }}></script>

</body>

</html>
