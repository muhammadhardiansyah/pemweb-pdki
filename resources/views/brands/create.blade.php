@extends('layout.dashboard.main')
@section('style')
    <link rel="stylesheet" href="{{ asset('/dist/assets/extensions/choices.js/public/assets/styles/choices.css') }}">
@endsection
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Pengajuan Merek</h3>
    </div>

    <form action="/admin/brands" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-10 mx-auto">
            @if (session()->has('name'))
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name='name' placeholder="Masukkan nama merek" value="{{ session('name') }}" required
                            autofocus {{ session()->forget('name') }}>
                        <label for="floatingInput">Nama Merek</label>
                    </div>
                    <button class="btn btn-primary" type="button" id="button-search">Search</button>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cek Kemiripan Merek pada Database (PDKI)</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Merek yang akan anda ajukan, dicek terlebih dahulu kemiripannya dengan beberapa merek yang sudah terdaftar lebih dulu di Database PDKI</p>
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Merek</th>
                                            <th>Class</th>
                                            <th>status</th>
                                            <th>Similiarity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($responses as $item)
                                            <tr>
                                                <td>{{ $item['id'] }}</td>
                                                <td class="text-bold-500">{{ $item['name'] }}</td>
                                                <td class="text-bold-500">{{ $item['class'] }}</td>
                                                <td class="text-bold-500">{{ $item['status'] }}</td>
                                                <td class="text-bold-500">{{ $item['similiarity'] }}%</td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="4">
                                                <p class=" mb-0">Tidak ada data
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
            @else
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name='name' placeholder="Masukkan nama merek" value="{{ old('name') }}" required autofocus>
                        <label for="floatingInput">Nama Merek</label>
                    </div>
                    <button class="btn btn-primary" type="button" id="button-search">Search</button>
                </div>
            @endif

            <div class="form-group">
                <select class="choices form-select @error('brandClass_id') is-invalid @enderror" name="brandClass_id" id="title" required>
                    @foreach ($classes as $item)
                        <option {{ old('brandClass_id') == "$item->id" ? 'selected' : '' }} value="{{ $item->id }}"> 
                            Kelas {{ $item->no_class }}</option>
                    @endforeach
                    <label for="floatingInput" class="mb-2">Kelas</label>
                </select>
                @error('brandClass_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <textarea class="form-control" id="slug" name="desc" rows="4" readonly>{{ old('desc', $classes[0]->desc) }}</textarea>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                    name='address' placeholder="Masukkan alamat" value="{{ old('address') }}" required>
                <label for="floatingInput">Alamat</label>
                @error('address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('owner') is-invalid @enderror" id="owner"
                    name='owner' placeholder="Masukkan alamat" value="{{ old('owner') }}" required>
                <label for="floatingInput">Pemilik</label>
                @error('owner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logos" class="form-label">Masukkan Logo Usaha</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('logos') is-invalid @enderror" type="file" id="image1"
                    name="logos" onchange="previewImage()">
                @error('logos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="certificate" class="form-label">Masukan Surat Keterangan Usaha</label>
                <input class="form-control @error('certificate') is-invalid @enderror" type="file" name="certificate">
                @error('certificate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="signature" class="form-label">Masukkan Tanda Tangan</label>
                <img class="img-preview2 img-fluid mb-3 col-sm-5">
                <input class="form-control @error('signature') is-invalid @enderror" type="file" id="image2"
                    name="signature" onchange="previewImage2()">
                @error('signature')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="summernote" class="form-label">Body</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="summernote" style="height: 100px">{{ old('body') }}</textarea>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-plus-square mr-1"></i>
                <span>Submit</span>
            </button>
        </div>
    </form>



    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/admin/desc?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
    </script>

    <script>
        function previewImage() {
            const image = document.querySelector('#image1');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImage2() {
            const image = document.querySelector('#image2');
            const imgPreview = document.querySelector('.img-preview2');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#button-search').click(function() {
                // Ambil nilai dari input dengan id 'name'
                var nameValue = $('#name').val();

                // Buat URL dengan menggunakan nilai dari input
                var url = 'create/check?name=' + encodeURIComponent(nameValue);

                // Navigasikan ke URL
                window.location.href = url;
            });
        });
    </script>
@endsection


@section('script')
    <script src="{{ asset('/dist/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src=" {{ asset('/dist/assets/js/pages/form-element-select.js') }}"></script>
@endsection