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

    <div class="page-heading">
        <h3>Merek</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Authorization</span>
                {{-- <a href="/admin/brands/create" class="btn btn-success icon icon-left"><i data-feather="file-plus"></i>
                    <span>Tambah Merek</span></a> --}}
            </div>
            <div class="card-body">
                <table class="table" id="table_posts">
                    <thead>
                        <tr>
                            <th class="col-1 text-center">#</th>
                            <th class="col-2 text-center">Nama</th>
                            <th class="col-2 text-center">Perizinan</th>
                            <th class="col-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $users->find($item->model_id)->name }}</td>
                                <td>
                                    <div
                                        class="text-center">
                                        <i class="bi {{ $item->role_id == 2 ? 'bi-gear-fill' : 'bi-person-fill' }}"></i>
                                        {{ $item->role_id == 2 ? 'Admin' : 'User' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                            data-bs-target="#roles{{ $loop->iteration }}">Edit Authorization</button>
                                    </div>
                                    <div class="modal fade text-left" id="roles{{ $loop->iteration }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="myModalLabel33">Perizinan</h2>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="/admin/roles/{{ $item->model_id }}" method="POST">
                                                    @method('put')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text"
                                                                class="form-control"
                                                                id="name" value="{{ $users->find($item->model_id)->name }}" readonly>
                                                            <label for="floatingInput">Nama</label>
                                                        </div>
                                                        <div class="form-group text-center">
                                                            <label class="mb-1">Hak Akses:</label>
                                                        </div>
                                                        <div class="form-group mb-3 text-center">
                                                            <input type="radio" class="btn-check success-outlined" name="role_id"
                                                                id="option{{ $loop->iteration }}" autocomplete="off" {{ $item->role_id == 2 ? 'checked' : '' }} value=2>
                                                            <label class="btn btn-outline-primary"
                                                                for="option{{ $loop->iteration }}">
                                                                <i class="bi bi-gear-fill"></i>
                                                                Admin
                                                            </label>

                                                            <input type="radio" class="btn-check info-outlined" name="role_id"
                                                                id="option{{ $loop->iteration + 10000 }}" autocomplete="off" {{ $item->role_id == 1 ? 'checked' : '' }} value=1>
                                                            <label class="btn btn-outline-primary"
                                                                for="option{{ $loop->iteration + 10000 }}">
                                                                <i class="bi bi-person-fill"></i>
                                                                User
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success bg-gradient">
                                                            <i class="bi bi-check-lg me-2"></i>
                                                            <span>Submit</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
