@extends('layout.auth.main')
@section('container')
    <div class="container-fluid d-flex align-items-center justify-content-center border" style="height: 100vh">
        <div class="col-lg-6 col-md-10 rounded" style="background-color: #FFFFFF;">
            <div class="col-12 pt-4 px-4 text-end">
                <a href="/posts">
                    <i class="bi bi-x-circle" style="font-size: 2rem; color: red;"></i>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 my-3 mx-auto">
                <img class="img-fluid" src="images/bootstrap-logo.svg" alt="">
            </div>
            <h3 class="text-center mb-2">Register</h3>
            <div class="col-8 mb-3 mx-auto">
                <form action="/signin" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingInput1"
                            name="name" placeholder="Nama" value="{{ old('name') }}" required>
                        <label for="floatingInput">Nama</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput2" name="username" placeholder="ardian" value="{{ old('username') }}" required>
                        <label for="floatingInput">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput3" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-success bg-gradient mb-3" type="submit">Sign in</button>
                    <p class="text-center mb-3">Sudah punya akun? <a href="/login">Masuk</a></p>
                    <p class="mt-5 mb-3 text-muted text-center">&copy; 2023</p>
                </form>
            </div>
        </div>
    </div>
@endsection
