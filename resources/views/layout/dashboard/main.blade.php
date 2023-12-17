<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PEMWEB - PDKI</title>
    <link href="{{ asset('favicon.ico') }}" rel="icon">
    {{-- dont put in bottom. make error in dashboard! --}}
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/shared/iconly.css') }}">

    {{-- main css --}}
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('/dist/assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/dist/assets/images/logo/favicon.png') }}" type="image/png">

    {{-- datatable css --}}
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/pages/datatables.css') }}">

    {{-- summernote css --}}
    <link rel="stylesheet" href="{{ asset('/dist/assets/css/pages/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/summernote/summernote-lite.css') }}">

    {{-- Need: Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    {{-- <script src="/dist/assets/extensions/jquery/jquery.min.js"></script> --}}
    @yield('style')


</head>

<body>
    {{-- Sidebar --}}
    @include('partials.dashboard_sidebar')
    {{-- End of SideBar --}}
    <div id="app">
        {{-- Container --}}
        <div id="main" class="layout-navbar">
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                {{-- <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle text-gray-600" href="#"
                                        data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4'></i>
                                        @if (auth()->user()->unreadNotifications->count())
                                            <span
                                                class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                        aria-labelledby="dropdownMenuButton">
                                        <li class="dropdown-header">
                                            <h6>Notifications</h6>
                                        </li>
                                        @forelse (auth()->user()->Notifications->take(3) as $notification)
                                            <li class="dropdown-item notification-item">
                                                <a class="d-flex align-items-center position-relative"
                                                    href="/admin/announcements/{{ $notification->id }}">
                                                    @if ($notification->type == 'App\Notifications\ApproveBrandNotification')
                                                        <div class="notification-icon">
                                                            <i class="bi bi-clipboard-check-fill text-success"></i>
                                                        </div>
                                                        <div class="notification-text ms-4">
                                                            <p class="notification-title font-bold">
                                                                Disetujui
                                                            </p>
                                                            <p class="notification-subtitle font-thin text-sm">
                                                                Merek: {{ $notification->data['name'] }}
                                                            </p>
                                                        </div>
                                                    @elseif($notification->type == 'App\Notifications\RejectBrandNotification')
                                                        <div class="notification-icon">
                                                            <i class="bi bi-clipboard2-x-fill text-danger"></i>
                                                        </div>
                                                        <div class="notification-text ms-4">
                                                            <p class="notification-title font-bold">
                                                                Ditolak
                                                            </p>
                                                            <p class="notification-subtitle font-thin text-sm">
                                                                Merek: {{ $notification->data['name'] }}
                                                            </p>
                                                        </div>
                                                    @elseif($notification->type == 'App\Notifications\HelloNotification')
                                                        <div class="notification-icon">
                                                            <i class="bi bi-emoji-smile-fill text-primary"></i>
                                                        </div>
                                                        <div class="notification-text ms-4">
                                                            <p class="notification-title font-bold">
                                                                Halo {{ $notification->data['username'] }}!
                                                            </p>
                                                            <p class="notification-subtitle font-thin text-sm">
                                                                {{ $notification->data['notes'] }}
                                                            </p>
                                                        </div>
                                                    @elseif($notification->type == 'App\Notifications\ReviseBrandNotification')
                                                        <div class="notification-icon">
                                                            <i class="bi bi-clipboard-plus-fill text-warning"></i>
                                                        </div>
                                                        <div class="notification-text ms-4">
                                                            <p class="notification-title font-bold">
                                                                Revisi
                                                            </p>
                                                            <p class="notification-subtitle font-thin text-sm">
                                                                Merek: {{ $notification->data['name'] }}
                                                            </p>
                                                        </div>
                                                    @else
                                                        <div class="notification-icon">
                                                            <i class="bi bi-info-circle-fill text-info"></i>
                                                        </div>
                                                        <div class="notification-text ms-4">
                                                            <p class="notification-title font-bold">
                                                                Informasi
                                                            </p>
                                                            {{-- <p class="notification-subtitle font-thin text-sm">
                                                                Merek: {{ $notification->data['name'] }}
                                                            </p> --}}
                                                        </div>
                                                    @endif
                                                    @if ($notification->unread())
                                                        <span
                                                            class="position-absolute top-20 start-100 translate-middle badge rounded-pill bg-danger">
                                                            new
                                                        </span>
                                                    @endif
                                                </a>
                                            </li>
                                        @empty
                                            <div class="notification-text ms-4">
                                                <p class="notification-title font-bold">
                                                    Tidak ada pengumuman
                                                </p>
                                            </div>
                                        @endforelse
                                        {{-- <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-success">
                                                    <i class="bi bi-clipboard-check-fill"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Successfully check out</p>
                                                    <p class="notification-subtitle font-thin text-sm">Order ID #256</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-danger">
                                                    <i class="bi bi-clipboard2-x-fill"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math
                                                        homework</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-item notification-item">
                                            <a class="d-flex align-items-center" href="#">
                                                <div class="notification-icon bg-warning">
                                                    <i class="bi bi-clipboard-plus-fill"></i>
                                                </div>
                                                <div class="notification-text ms-4">
                                                    <p class="notification-title font-bold">Homework submitted</p>
                                                    <p class="notification-subtitle font-thin text-sm">Algebra math
                                                        homework</p>
                                                </div>
                                            </a>
                                        </li> --}}
                                        <li>
                                            <p class="text-center py-2 mb-0"><a href="/admin/announcements">See all
                                                    announcements</a></p>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img
                                                    @if (auth()->user()->image) src="{{ asset('storage/' . auth()->user()->image) }}"
                                                @else
                                                    src="{{ asset('image/faces/2.jpg') }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ auth()->user()->username }}!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="/admin/users/{{ auth()->user()->id }}"><i
                                                class="icon-mid bi bi-person me-2"></i>
                                            Profile
                                        </a></li>
                                    <li><a class="dropdown-item"
                                            href="/admin/users/{{ auth()->user()->id }}/security"><i
                                                class="icon-mid bi bi-gear me-2"></i>
                                            Security</a></li>
                                    {{-- <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li> --}}
                                    <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">
                @yield('container')
            </div>
        </div>
        {{-- End of Container --}}
    </div>
    <script src="{{ asset('/dist/assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/dist/assets/js/app.js') }}"></script>

    <script>
        function submit() {
            let form = document.getElementById("logout");
            form.submit();
        }
    </script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('/dist/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    {{-- <script src="/dist/assets/js/pages/dashboard.js"></script> --}}

    {{-- Need: Datatables --}}
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('/dist/assets/js/pages/datatables.js') }}"></script>

    {{-- Need: Summernote --}}
    <script src="{{ asset('/dist/assets/extensions/summernote/summernote-lite.min.js') }}"></script>
    {{-- <script src="/dist/assets/js/pages/summernote.js"></script> --}}
    @yield('script')
</body>
@stack('scripts')

</html>
