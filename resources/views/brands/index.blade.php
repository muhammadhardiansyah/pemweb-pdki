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
                <a href="/admin/brands/create" class="btn btn-success icon icon-left"><i data-feather="file-plus"></i>
                    <span>Tambah Merek</span></a>
            </div>
            <div class="card-body">
                <table class="table" id="table_posts">
                    <thead>
                        <tr>
                            <th class="col-1 text-center">#</th>
                            <th class="col-2 text-center">Nama</th>
                            <th class="col-2 text-center">Alamat</th>
                            <th class="col-2 text-center">Owner</th>
                            <th class="col-2 text-center">Keputusan</th>
                            <th class="col-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->address }}</td>
                                <td>{{ $brand->owner }}</td>
                                <td>
                                    @role('admin')
                                        @if ($brand->decision == 2)
                                            <div class="text-center">
                                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                                    data-bs-target="#verifying{{ $loop->iteration }}">Belum
                                                    Diverifikasi</button>
                                            </div>
                                            <div class="modal fade text-left" id="verifying{{ $loop->iteration }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel33">Verifikasi Pengajuan
                                                                Merek</h4>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i data-feather="x"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    id="name" name='name'
                                                                    placeholder="Masukkan nama usaha"
                                                                    value="{{ old('name', $brand->name) }}" required autofocus
                                                                    readonly>
                                                                <label for="floatingInput">Nama Merek</label>
                                                            </div>

                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('address') is-invalid @enderror"
                                                                    id="address" name="address"
                                                                    placeholder="Masukkan nama usaha"
                                                                    value="{{ old('address', $brand->address) }}" required
                                                                    readonly>
                                                                <label for="floatingInput">Alamat</label>
                                                            </div>

                                                            <div class="form-floating mb-3">
                                                                <input type="text"
                                                                    class="form-control @error('owner') is-invalid @enderror"
                                                                    id="owner" name="owner"
                                                                    placeholder="Masukkan nama usaha"
                                                                    value="{{ old('owner', $brand->owner) }}" required
                                                                    readonly>
                                                                <label for="floatingInput">Pemilik Usaha</label>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="logos" class="form-label">Logo Usaha</label>
                                                                @if ($brand->logos)
                                                                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block"
                                                                        src="{{ asset("/storage/$brand->logos") }}"
                                                                        onerror="this.src='https://placehold.co/400?text=placeholder';">
                                                                @endif
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="Input">Surat Usaha</label>
                                                                @if ($brand->certificate)
                                                                    <br>
                                                                    <a href="{{ asset('/storage/' . $brand->certificate) }}"
                                                                        class="form-control btn btn-primary rounded-pill px-4 py-2 mt-2" download>
                                                                        <i class="bi bi-download pe-2"></i>
                                                                        <span>Download</span>
                                                                    </a>
                                                                @else
                                                                    <input type="text"
                                                                        class="form-control @error('certificate') is-invalid @enderror"
                                                                        id="certificate" name="certificate"
                                                                        placeholder="Masukkan surat usaha"
                                                                        value="{{ old('certificate', $brand->certificate) }}"
                                                                        readonly>
                                                                @endif
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="signature" class="form-label">Tanda Tangan</label>
                                                                @if ($brand->signature)
                                                                    <img class="img-preview2 img-fluid mb-3 col-sm-5 d-block"
                                                                        src="{{ asset("/storage/$brand->signature") }}"
                                                                        onerror="this.src='https://placehold.co/400?text=placeholder';">
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-success bg-gradient"
                                                                href="/admin/brands/accept/{{ $brand->id }}"><i
                                                                    class="bi bi-check-lg"></i></a>
                                                            <button type="button" class="btn btn-warning bg-gradient"
                                                                data-bs-target="#revise{{ $loop->iteration }}"
                                                                data-bs-toggle="modal">
                                                                <i class="bi bi-pencil-square"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger bg-gradient"
                                                                data-bs-target="#reject{{ $loop->iteration }}"
                                                                data-bs-toggle="modal">
                                                                <i class="bi bi bi-x-lg"></i>
                                                            </button>
                                                            {{-- <a class="btn btn-danger bg-gradient"
                                                            href="/admin/brands/reject/{{ $brand->id }}"><i
                                                                class="bi bi-x-lg"></i></a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade text-left" id="revise{{ $loop->iteration }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <form action="/admin/brands/revise" method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel33">Catatan Revisi
                                                                </h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_brand"
                                                                    value="{{ $brand->id }}">
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control" name="notes" placeholder="Leave a comment here" id="floatingTextarea"
                                                                        style="height: 100px"></textarea>
                                                                    <label for="floatingTextarea">Catatan</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#verifying{{ $loop->iteration }}">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-success ml-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Kirim</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade text-left" id="reject{{ $loop->iteration }}"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <form action="/admin/brands/reject" method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel33">Catatan Penolakan
                                                                </h4>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i data-feather="x"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id_brand"
                                                                    value="{{ $brand->id }}">
                                                                <div class="form-floating mb-3">
                                                                    <textarea class="form-control" name="notes" placeholder="Leave a comment here" id="floatingTextarea"
                                                                        style="height: 100px"></textarea>
                                                                    <label for="floatingTextarea">Catatan</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#verifying{{ $loop->iteration }}">
                                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" class="btn btn-success ml-1"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                                    <span class="d-none d-sm-block">Kirim</span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($brand->decision == 1)
                                            <div class="text-center">
                                                <a href="#q" class="btn icon icon-left btn-success bg-gradient"><i
                                                        data-feather="check-circle"></i>Ok</a>
                                            </div>
                                        @elseif ($brand->decision == 0)
                                            <div class="text-center">
                                                <a href="#q" class="btn icon icon-left btn-danger bg-gradient"><i
                                                        data-feather="alert-circle"></i>Ditolak</a>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <a href="#" class="btn icon icon-left btn-warning bg-gradient"><i
                                                        data-feather="alert-triangle"></i> Perbaikan</a>
                                            </div>
                                        @endif
                                    @endrole
                                    @role('user')
                                        @if ($brand->decision == 1)
                                            <div class="text-center">
                                                <a href="#q" class="btn icon icon-left btn-success bg-gradient"><i
                                                        data-feather="check-circle"></i>Ok</a>
                                            </div>
                                        @elseif($brand->decision == 0)
                                            <div class="text-center">
                                                <a href="#q" class="btn icon icon-left btn-danger bg-gradient"><i
                                                        data-feather="alert-circle"></i>Ditolak</a>
                                            </div>
                                        @elseif($brand->decision == 2)
                                            <div class="text-center">
                                                <a href="#"
                                                    class="btn icon icon-left btn-warning bg-gradient text-black"><i
                                                        data-feather="alert-triangle"></i>Belum Diverifikasi</a>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <a href="#"
                                                    class="btn icon icon-left btn-warning bg-gradient text-black"><i
                                                        data-feather="alert-triangle"></i>Perbaikan</a>
                                            </div>
                                        @endif
                                    @endrole
                                </td>
                                <td class="col-2">
                                    <a class="btn btn-outline-info m-1 col-12" href="/admin/brands/{{ $brand->id }}">
                                        <i class="bi bi-eye-fill"></i>
                                        <span>Show</span>
                                    </a>
                                    <a class="btn btn-outline-warning m-1 col-12"
                                        href="/admin/brands/{{ $brand->id }}/edit">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="/admin/brands/{{ $brand->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger m-1 col-12"
                                            onclick="return confirm('Are you sure?')">
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
