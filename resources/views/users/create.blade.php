@extends('layout.dashboard.main')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Add User</h3>
    </div>

    <form action="/admin/users" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-10 mx-auto">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name='name'
                    placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required autofocus>
                <label for="floatingInput">Nama Lengkap</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name='username'
                    placeholder="Masukkan username" value="{{ old('username') }}" required autofocus>
                <label for="floatingInput">Nama Panggilan</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name='email'
                    placeholder="Masukkan email" value="{{ old('email') }}" required>
                <label for="floatingInput">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name='password'
                    placeholder="Masukkan password" required>
                <label for="floatingInput">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-floating mb-3">
                <input type="text" name="numbers" class="form-control @error('numbers') is-invalid @enderror"
                    placeholder="Masukkan judul" value="{{ old('numbers') }}">
                <label for="floatingInput">Nomor Telepon</label>
                @error('numbers')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <div class="form-floating mb-3">
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                    placeholder="Masukkan judul" value="{{ old('address') }}">
                <label for="floatingInput">Alamat</label>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Masukkan Foto</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="form-floating mb-3">
                <select class="form-select @error('roles_id') is-invalid @enderror" name="roles_id"
                    aria-label="Floating label select example" required>
                    <option {{ old('roles_id') == '' ? 'selected' : '' }} value="">Role</option>
                    @foreach ($roles as $authorization)
                        <option {{ old('roles_id') == $authorization->id ? 'selected' : '' }} value="{{ $authorization->id }}">
                            {{ $authorization->name }}</option>
                    @endforeach
                </select>
                <label for="floatingSelect">Pilih Role</label>

                @error('roles_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <button type="submit" class="btn btn-success">
                <i class="bi bi-plus-square mr-1"></i>
                <span>Create User</span>
            </button>

        </div>


    </form>



    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/category/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
