{{-- {{ dd(count($responses)) }} --}}
@extends('layout.guest.search')
@section('container')
    <main class="px-3">
        <div class="container col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row d-flex justify-content-between">
                        <div class="col-auto">
                            <h4>Sistem Pendaftaran Merek</h4>
                        </div>
                        <div class="col-auto">
                        <form action="/home/search" method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <span class="input-group-text bg-primary" id="basic-addon1"><i
                                            class="bi bi-search mb-2 text-white"></i></span>
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Masukkan nama merek" aria-describedby="button-addon2" value="{{ old('search', $request)  }}">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-lg">

                            <p>Hasil pencarian</p>
                            <hr>
                            <tbody>
                                @forelse ($responses as $response)
                                    {{-- {{ dd($response['_source']['image'][0][0]['image_path']) }} --}}

                                    <tr class="font-bold opacity-100">
                                        @if ($response['_source']['status_permohonan'] == '(TM) Didaftar')
                                            <td class="col-2">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="avatar avatar-xl bg-success">
                                                        <span class="avatar-content">
                                                            <img class="img-fluid"
                                                                src="{{ $response['_source']['image'][0]['image_path'] }}"
                                                                alt="" onerror="this.src='https://placehold.co/400?text=placeholder';">
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <a href="/home/search/{{ $response['_source']['id'] }}">
                                                    <p class=" mb-0">{{ $response['_source']['nama_merek'] }}</p>
                                                    <p class=" text-primary">
                                                        {{ $response['_source']['id'] }}</p>
                                                    <p class="mb-1 btn btn-success">
                                                        <i class="bi bi-check-circle-fill me-2"></i>
                                                        {{ $response['_source']['status_permohonan'] }}
                                                    </p>
                                                </a>
                                            </td>
                                        @elseif($response['_source']['status_permohonan'] == '(TM) Ditolak')
                                            <td class="col-2">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="avatar avatar-xl bg-success">
                                                        <span class="avatar-content">
                                                            <img class="img-fluid"
                                                                src="{{ $response['_source']['image'][0]['image_path'] }}"
                                                                alt="" onerror="this.src='https://placehold.co/400?text=placeholder';">
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <a href="/home/search/{{ $response['_source']['id'] }}">
                                                    <p class=" mb-0">{{ $response['_source']['nama_merek'] }}</p>
                                                    <p class=" text-primary">
                                                        {{ $response['_source']['id'] }}</p>
                                                    <p class="mb-1 btn btn-warning">
                                                        <i class="bi bi-x-circle-fill me-2"></i>
                                                        {{ $response['_source']['status_permohonan'] }}
                                                    </p>
                                                </a>
                                            </td>
                                        @else
                                            <td class="col-2">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="avatar avatar-xl bg-success">
                                                        <span class="avatar-content">
                                                            <img class="img-fluid"
                                                                src="{{ $response['_source']['image'][0]['image_path'] }}"
                                                                alt="" onerror="this.src='https://placehold.co/400?text=placeholder';">
                                                        </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <a href="/home/search/{{ $response['_source']['id'] }}">
                                                    <p class=" mb-0">{{ $response['_source']['nama_merek'] }}</p>
                                                    <p class=" text-primary">
                                                        {{ $response['_source']['id'] }}</p>
                                                    <p class="mb-1 btn btn-warning text-black">
                                                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                                        {{ $response['_source']['status_permohonan'] }}
                                                    </p>
                                                </a>
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
    </main>
@endsection
