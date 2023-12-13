{{-- {{ dd($response) }} --}}
@extends('layout.guest.search')
@section('container')
    <main class="px-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="container col-lg-8 col-md-8 mb-3">
                                <img class="w-100 active mb-3 text-center"
                                    src="{{ $response['image'][0]['image_path'] }}">
                                <h3 class="text-center">{{ $response['nama_merek'] }}</h3>
                                <p class="text-center">{{ $response['owner'][0]['tm_owner_name'] }}</p>
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
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Nama Merek</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $response['nama_merek'] }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Pemilik</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $response['owner'][0]['tm_owner_name'] }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $response['owner'][0]['tm_owner_address'] }}" readonly>
                                            </div>
                                        </div>
                                        @if ($response['status_permohonan'] == '(TM) Didaftar')
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-success"><i class="bi bi-check-circle pe-1"></i> 
                                                        {{ $response['status_permohonan'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($response['status_permohonan'] == '(TM) Ditolak')
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-danger"><i class="bi bi-x-circle pe-1"></i>
                                                        {{ $response['status_permohonan'] }}
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-warning"><i
                                                            class="bi bi-exclamation-triangle pe-1"></i>
                                                        {{ $response['status_permohonan'] }}
                                                        </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control" rows="3" readonly>{{ $response['t_class'][0]['class_desc'] }}</textarea>
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
    </main>
@endsection
