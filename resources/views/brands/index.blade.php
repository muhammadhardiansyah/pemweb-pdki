@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-12 mx-auto" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show col-12 mx-auto" role="alert">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show col-12 mx-auto" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="page-heading">
        <h3>Merek</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Data Merek</span>
                <a href="/admin/brands/create" class="btn btn-success icon icon-left"><i data-feather="file-plus"></i> <span>Tambah Merek</span></a>
            </div>
            <div class="card-body">
                <table class="table" id="table_posts">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Owner</th>
                            <th>Keputusan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->address }}</td>
                                <td>{{ $brand->owner }}</td>
                                <td>{{ $brand->decision }}</td>
                                <td class="col-2">
                                    <a class="btn btn-outline-info m-1 col-12" href="/admin/brands/{{ $brand->id }}">
                                        <i class="bi bi-eye-fill"></i>
                                        <span>Show</span>
                                    </a>
                                    <a class="btn btn-outline-warning m-1 col-12" href="/admin/brands/{{ $brand->id }}/edit">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="/admin/brands/{{ $brand->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger m-1 col-12" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash-fill"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
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
