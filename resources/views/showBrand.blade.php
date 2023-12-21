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
                                <img class="w-100 active mb-3 text-center" src="{{ asset('/storage/'.$brand->logos) }}"
                                    onerror="this.src='https://placehold.co/400?text=placeholder';">
                                <h3 class="text-center">{{ $brand->name }}</h3>
                                <p class="text-center">{{ $brand->owner }}</p>
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
                                                <input type="text" class="form-control" value="{{ $brand->name }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Pemilik</label>
                                                <input type="text" class="form-control" value="{{ $brand->owner }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" class="form-control" value="{{ $brand->address }}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Kelas {{ $brand->brandClass->no_class }}</label>
                                                <textarea class="form-control" rows="4" readonly>{{ $brand->brandClass->desc }}</textarea>
                                            </div>
                                        </div>
                                        @if ($brand->decision == 1)
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-success"><i class="bi bi-check-circle pe-1"></i>
                                                        Approved
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($brand->decision == 0)
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-danger"><i class="bi bi-x-circle pe-1"></i>
                                                        Reject
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($brand->decision == 2)
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-info"><i class="bi bi-circle pe-1"></i>
                                                        Not Yet
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Status Verifikasi</label>
                                                    <div class="alert alert-warning"><i
                                                            class="bi bi-exclamation-triangle pe-1"></i>
                                                        Revision
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Deskripsi</label>
                                                <textarea class="form-control" rows="3" readonly>{{ $response['t_class'][0]['class_desc'] }}</textarea>
                                            </div>
                                        </div> --}}
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
