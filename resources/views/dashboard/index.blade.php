{{-- {{ dd($posts->where('user_id', auth()->user()->id)) }} --}}
<?php //$myPosts = $posts->where('user_id', auth()->user()->id) ?>
@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Welcome {{ auth()->user()->name }}!</h3>
    </div>

    {{-- <div class="page-content">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon purple mb-2">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">
                                    Users
                                </h6>
                                <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                            </div>
                        </div>
                        <div class="row text-end mt-3">
                            <div class="col">
                                <a href="/admin/users" class="btn badge bg-secondary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon blue mb-2">
                                    <i class="fas fa-th-large"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Berita</h6>
                                <h6 class="font-extrabold mb-0">{{ $posts }}</h6>
                            </div>
                        </div>
                        <div class="row text-end mt-3">
                            <div class="col">
                                <a href="/admin/posts" class="btn badge bg-secondary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <i class="fas fa-handshake"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Acara</h6>
                                <h6 class="font-extrabold mb-0">{{ $events }}</h6>
                            </div>
                        </div>
                        <div class="row text-end mt-3">
                            <div class="col">
                                <a href="/admin/events" class="btn badge bg-secondary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon red mb-2">
                                    <i class="far fa-file-alt"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">UMKM</h6>
                                <h6 class="font-extrabold mb-0">{{ $umkms }}</h6>
                            </div>
                        </div>
                        <div class="row text-end mt-3">
                            <div class="col">
                                <a href="/admin/umkms" class="btn badge bg-secondary">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
{{--
    <div class="col-12">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldUser"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah User</h6>
                                <h6 class="font-extrabold mb-0">{{ '10'($users) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Staff</h6>
                                <h6 class="font-extrabold mb-0">{{ count($staff) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldChart"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Seluruh Postingan</h6>
                                <h6 class="font-extrabold mb-0">{{ count($posts) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Your Posts</h6>
                                <h6 class="font-extrabold mb-0">{{ count($myPosts) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Profil Saya</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="container col-4 d-flex justify-content-center">
                                    @if (auth()->user()->image)
                                        <img class="img-fluid rounded" src="/storage/{{ auth()->user()->image }}"
                                            style="max-height: 300px; min-height:300px; object-fit:cover;" alt="">
                                    @else
                                        <img class="img-fluid" src="https://via.placeholder.com/150"
                                            style="max-height: 300px; min-height:300px; object-fit:cover;" alt="">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 fs-4 lead">
                                <div class="container col-9">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-11">
                                            <h4> Nama </h4>
                                        </div>
                                        <div class="col-1">:</div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4>{{ auth()->user()->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-11">
                                            <h4>Email </h4>
                                        </div>
                                        <div class="col-1">:</div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4>{{ auth()->user()->email }}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-11">
                                            <h4>Username </h4>
                                        </div>
                                        <div class="col-1">:</div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4>{{ auth()->user()->username }}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-11">
                                            <h4>Authorization </h4>
                                        </div>
                                        <div class="col-1">:</div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4>{{ auth()->user()->authorizations->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-end">
                                        <a class="btn btn-outline-warning"
                                            href="/dashboard/users/{{ auth()->user()->username }}/edit">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Postingan Anda</h3>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_posts">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($myPosts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->author->name }}</td>
                                        <td>
                                            <a class="btn btn-outline-info" href="/dashboard/posts/{{ $post->slug }}"><i
                                                    class="bi bi-eye-fill"></i></a>
                                            <a class="btn btn-outline-warning"
                                                href="/dashboard/posts/{{ $post->slug }}/edit"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <form action="/dashboard/posts/{{ $post->slug }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="row">
            <div class="col-12 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Profile Visit</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-primary" width="32" height="32" fill="blue"
                                        style="width:10px">
                                        <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Europe</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0">862</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-europe"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-success" width="32" height="32" fill="blue"
                                        style="width:10px">
                                        <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">America</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0">375</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-america"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi text-danger" width="32" height="32" fill="blue"
                                        style="width:10px">
                                        <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Indonesia</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0">1025</h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-indonesia"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        {{-- <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Comments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="assets/images/faces/5.jpg">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">Si Cantik</p>
                                            </div>
                                        </td>
                                        <td class="col-auto">
                                            <p class=" mb-0">Congratulations on your graduation!</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-md">
                                                    <img src="assets/images/faces/2.jpg">
                                                </div>
                                                <p class="font-bold ms-3 mb-0">Si Ganteng</p>
                                            </div>
                                        </td>
                                        <td class="col-auto">
                                            <p class=" mb-0">Wow amazing design! Can you make another tutorial for
                                                this design?</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
    {{-- </div>
    </div> --}}
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table_posts').DataTable({
                retrieve: true,
                responsive: true
            });
        });
        // let jquery_datatable = $("#table_posts").DataTable();
    </script>
@endpush
