<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mpok Sinah Klamben</title>
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
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
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
        <div id="main">
            @yield('container')
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

</body>
@stack('scripts')

</html>
