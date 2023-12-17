@extends('layout.dashboard.main')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="container col-lg-8 col-md-8 mb-3">
                            <img class="w-100 active mb-3 text-center"
                            @if ($user->image)
                                src="{{ asset('storage/'.$user->image) }}"
                            @else
                                src="{{ asset('image/faces/2.jpg') }}"
                            @endif
                            >
                            <h3 class="text-center">{{ $user->name }}</h3>
                            <p class="text-center">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control"
                                                value="{{ $user->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control"
                                                value="{{ $user->username }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control"
                                                value="{{ $user->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control"
                                                value="{{ $user->address }}" readonly>
                                        </div>
                                    </div>
                                    {{-- @if ($announcement->data['decision'] == 1)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-success"><i class="bi bi-check-circle pe-1"></i> Ok!
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($announcement->data['decision'] == 0)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-danger"><i class="bi bi-x-circle pe-1"></i>Ditolak
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Catatan</label>
                                                <textarea class="form-control" rows="3" readonly>{{ $announcement->data['notes'] }}</textarea>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-warning"><i
                                                        class="bi bi-exclamation-triangle pe-1"></i>Revisi</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Catatan</label>
                                                <textarea class="form-control" rows="3" readonly>{{ $announcement->data['notes'] }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="/admin/brands/{{ $announcement->data['id_brand'] }}/edit" class="btn btn-warning me-1 mb-1 text-black"><i class="bi bi-pencil-square me-1"></i>Edit Pengajuan Merek</a>
                                        </div>
                                    @endif --}}
                                    <div class="col-12">
                                        <div class="form-group d-flex justify-content-end">
                                            <a href="/admin/profiles/{{ auth()->user()->id }}/edit" class="btn btn-warning text-black">
                                                <i class="bi bi-pencil-square me-1"></i>
                                                <span class="">Edit Data</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
