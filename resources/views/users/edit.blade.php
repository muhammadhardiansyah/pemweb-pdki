@extends('layout.dashboard.main')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Update User</h3>
    </div>

    <form action="/admin/users/{{ $user->id}}" method="post">
        @method('put')
        @csrf
        <div class="col-lg-10 mx-auto">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name='name'
                    placeholder="Masukkan nama kategori" value="{{ old('name', $user->name) }}" required autofocus>
                <label for="floatingInput">Nama Lengkap</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="title" name='username'
                    placeholder="Masukkan nama kategori" value="{{ old('username', $user->username) }}" required autofocus>
                <label for="floatingInput">Nama Panggilan</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name='email'
                    placeholder="Masukkan email" value="{{ old('email', $user->email) }}" required>
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-floating mb-3">
                <input type="text" name="numbers" class="form-control @error('numbers') is-invalid @enderror"
                    placeholder="Masukkan judul" value="{{ old('numbers', $user->numbers) }}">
                <label for="floatingInput">Nomor Telepon</label>
                @error('numbers')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                    placeholder="Masukkan judul" value="{{ old('address', $user->address) }}">
                <label for="floatingInput">Alamat</label>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select @error('roles_id') is-invalid @enderror" name="roles_id"
                    aria-label="Floating label select example" required>
                    <option {{ old('roles_id', $user->roles_id) == '' ? 'selected' : '' }}
                        value="">Role</option>
                    @foreach ($roles as $authorization)
                        <option
                            {{ old('authorizations_id', $user->roles_id) == $authorization->id ? 'selected' : '' }}
                            value="{{ $authorization->id }}">
                            {{ $authorization->name }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Pilih Role</label>

                @error('authorizations_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <button type="submit" class="btn btn-outline-warning">
                <i class="bi bi-plus-square mr-1"></i>
                <span>Update User</span>
            </button>

        </div>
    </form>
@endsection
