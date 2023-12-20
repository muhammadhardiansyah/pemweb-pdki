@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-12 mx-auto" role="alert">
            <i class="bi bi-check-circle pe-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show col-12 mx-auto" role="alert">
            <i class="bi bi-exclamation-triangle pe-2"></i>
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show col-12 mx-auto" role="alert">
            <i class="bi bi-check-circle pe-2"></i>
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container col-12">
        <div class="card">
            <div class="card-header">
                <h4>Pengumuman</h4>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <p>Penguman terbaru anda:</p>
                        <hr>
                        <tbody>
                            @forelse ($announcements as $announcement)
                                @if ($announcement->unread())
                                    <tr class="font-bold opacity-100">
                                    @else
                                    <tr class="opacity-50">
                                @endif
                                @if ($announcement->type == 'App\Notifications\ApproveBrandNotification')
                                    <td class="col-2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="avatar avatar-xl bg-success">
                                                <span class="avatar-content">
                                                    <i class="bi bi-clipboard-check-fill"></i>
                                                </span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $announcement->data['name'] }}</p>
                                        <p class=" text-primary">
                                            {{ $announcement->created_at->diffForHumans() }}</p>
                                        <p class="mb-1">Selamat! {{ $announcement->data['name'] }} sudah
                                            disetujui!
                                        </p>
                                        <a class="btn btn-primary bg-gradient"
                                            href="/admin/announcements/{{ $announcement->id }}">
                                            <i class="bi bi-eye-fill"></i>
                                            <span>Lihat</span>
                                        </a>
                                        <form action="/admin/announcements/{{ $announcement->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger bg-gradient"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                @elseif($announcement->type == 'App\Notifications\RejectBrandNotification')
                                    <td class="col-2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="avatar avatar-xl bg-danger">
                                                <span class="avatar-content">
                                                    <i class="bi bi-clipboard2-x-fill"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $announcement->data['name'] }}</p>
                                        <p class=" text-primary">
                                            {{ $announcement->created_at->diffForHumans() }}</p>
                                        <p class=" mb-1">Maaf, {{ $announcement->data['name'] }} ditolak.
                                        </p>
                                        <a class="btn btn-primary bg-gradient"
                                            href="/admin/announcements/{{ $announcement->id }}">
                                            <i class="bi bi-eye-fill"></i>
                                            <span>Lihat</span>
                                        </a>
                                        <form action="/admin/announcements/{{ $announcement->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger bg-gradient"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                @elseif($announcement->type == 'App\Notifications\HelloNotification')
                                    <td class="col-2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="avatar avatar-xl bg-success text-dark">
                                                <span class="avatar-content">
                                                    <i class="bi bi-emoji-smile-fill" style="font-size:large"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $announcement->data['username'] }}</p>
                                        <p class=" text-primary">
                                            {{ $announcement->created_at->diffForHumans() }}</p>
                                        <p class=" mb-1">
                                            Halo! Selamat datang {{ $announcement->data['username'] }}!
                                            <br>{{ $announcement->data['notes'] }}
                                        </p>
                                        <a class="btn btn-primary bg-gradient"
                                            href="/admin/announcements/{{ $announcement->id }}">
                                            <i class="bi bi-eye-fill"></i>
                                            <span>Lihat</span>
                                        </a>
                                        {{-- <a class="btn btn-warning bg-gradient text-black" href="">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>
                                        </a> --}}
                                        <form action="/admin/announcements/{{ $announcement->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger bg-gradient"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                        {{-- <a class="btn btn-danger bg-gradient" href="">
                                            <i class="bi bi-x-lg"></i>
                                            <span>Hapus</span>
                                        </a> --}}
                                    </td>
                                @elseif($announcement->type == 'App\Notifications\ReviseBrandNotification')
                                    <td class="col-2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="avatar avatar-xl bg-warning text-dark">
                                                <span class="avatar-content">
                                                    <i class="bi bi-clipboard-plus-fill text-black"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">{{ $announcement->data['name'] }}</p>
                                        <p class=" text-primary">
                                            {{ $announcement->created_at->diffForHumans() }}</p>
                                        <p class=" mb-1">Maaf, {{ $announcement->data['name'] }} perlu direvisi.
                                            <br>
                                            Catatan: <br>{{ $announcement->data['notes'] }}.
                                        </p>
                                        <a class="btn btn-primary bg-gradient"
                                            href="/admin/announcements/{{ $announcement->id }}">
                                            <i class="bi bi-eye-fill"></i>
                                            <span>Lihat</span>
                                        </a>
                                        {{-- <a class="btn btn-warning bg-gradient text-black" href="">
                                                <i class="bi bi-pencil-square"></i>
                                                <span>Edit</span>
                                            </a> --}}
                                        <form action="/admin/announcements/{{ $announcement->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger bg-gradient"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                        {{-- <a class="btn btn-danger bg-gradient" href="">
                                                <i class="bi bi-x-lg"></i>
                                                <span>Hapus</span>
                                            </a> --}}
                                    </td>
                                @else
                                    <td class="col-2">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <div class="avatar avatar-xl bg-info">
                                                <span class="avatar-content">
                                                    <i class="bi bi-info-circle-fill"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-auto">
                                        <p class=" mb-0">Pengumuman</p>
                                        <p class=" text-primary">
                                            {{ $announcement->created_at->diffForHumans() }}</p>
                                        <p class=" mb-1">
                                            {{ $announcement->data['notes'] }}
                                        </p>
                                        <a class="btn btn-primary bg-gradient"
                                            href="/admin/announcements/{{ $announcement->id }}">
                                            <i class="bi bi-eye-fill"></i>
                                            <span>Lihat</span>
                                        </a>
                                        {{-- <a class="btn btn-warning bg-gradient text-black" href="">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>
                                        </a> --}}
                                        <form action="/admin/announcements/{{ $announcement->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger bg-gradient"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash-fill"></i>
                                                <span>Hapus</span>
                                            </button>
                                        </form>
                                        {{-- <a class="btn btn-danger bg-gradient" href="">
                                            <i class="bi bi-x-lg"></i>
                                            <span>Hapus</span>
                                        </a> --}}
                                    </td>
                                @endif
                                </tr>
                            @empty
                                <tr>
                                    <td class="col-auto text-center">
                                        <p class=" mb-0">Tidak ada pengumuman untuk anda!
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
