@extends('layout.auth.main')
@section('container')
    <div class="container-fluid d-flex align-items-center justify-content-center border" style="height: 100vh">
        <div class="col-lg-6 col-md-10 rounded" style="background-color: #FFFFFF;">
            <div class="col-12 pt-4 px-4 text-end">
                <a href="/">
                    <i class="bi bi-x-circle" style="font-size: 2rem; color: red;"></i>
                </a>
            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show col-8 mx-auto" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show col-8 mx-auto" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-2 col-md-4 col-sm-4 my-3 mx-auto">
                <img class="img-fluid" src="{{ asset('/logo/uns.png') }}" alt="">
            </div>
            <h3 class="text-center mb-2 text-primary">Sistem Pendaftaran Merek</h3>
            <div class="col-8 mb-3 mx-auto">
                <form action="/login" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                            name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary bg-gradient mb-3" type="submit">Login</button>
                    <p class="text-center mb-3">Belum memiliki akun? <a href="/signin" class="text-primary"><b>Daftar</b></a></p>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
                </form>
            </div>
        </div>
    </div>
@endsection
