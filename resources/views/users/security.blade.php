@extends('layout.dashboard.main')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4 class="font-bold">Ganti Password</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show col-12 mx-auto" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('danger'))
                            <div class="alert alert-danger alert-dismissible fade show col-12 mx-auto" role="alert">
                                {{ session('danger') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session()->has('warning'))
                            <div class="alert alert-warning alert-dismissible fade show col-12 mx-auto" role="alert">
                                {{ session('warning') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="/admin/users/changePassword" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Password Lama</label>
                                            <input type="password" name="old_password"
                                                class="form-control @error('old_password') is-invalid @enderror" required>
                                            @error('old_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Password Baru</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" required>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-1">Konfirmasi Password Baru</label>
                                            <input type="password" name="re_password"
                                                class="form-control @error('re_password') is-invalid @enderror" required>
                                            @error('re_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-key-fill"></i>
                                                <span class="">Ubah Password</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4 class="font-bold">Hapus Akun</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <span>Apakah anda yakin ingin menghapus akun? Setelah anda menekan hapus akun, maka akun Anda
                                akan dihapus permanen!
                            </span>
                            <form action="/admin/users/{{ auth()->user()->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <div class="col-12 d-flex justify-content-end my-3">
                                    <button class="btn btn-danger m-1" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash-fill"></i>
                                        <span>Hapus Akun</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


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
