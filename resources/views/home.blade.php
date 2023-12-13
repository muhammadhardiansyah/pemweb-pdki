@extends('layout.guest.main')
@section('container')
    <main class="px-3">
        <div class="d-flex align-items-center" style="position: fixed; top: 50%; transform: translateY(-50%);">
            <div class="container col-8 text-center">
                <img class="col-4" src="{{ asset('logo/uns_cover.png') }}" alt="">
                <h1 class="text-primary mb-3">Sistem Pendaftaran Merek</h1>
                <form action="/home/search" method="POST">
                    @csrf
                    <div class="container col-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary" id="basic-addon1"><i class="bi bi-search mb-2 text-white"></i></span>
                            <input type="text" class="form-control" name="search" placeholder="Masukkan nama merek" aria-describedby="button-addon2">
                            <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </form>
                {{-- <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit
                    the
                    text, and add your own fullscreen background photo to make it your own.</p> --}}
                {{-- <p class="lead">
                    <a href="#" class="btn btn-lg btn-light fw-bold border-white bg-white">Learn more</a>
                </p> --}}
            </div>
        </div>
    </main>
@endsection
