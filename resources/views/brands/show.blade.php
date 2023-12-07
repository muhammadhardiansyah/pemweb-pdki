@extends('layout.dashboard.main')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3 class="text-center">Edit Pengajuan Merek</h3>
    </div>

    <form>
        @csrf
        <div class="col-lg-10 mx-auto">
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name='name' placeholder="Masukkan nama usaha" value="{{ old('name', $brand->name) }}" required autofocus disabled>
                <label for="floatingInput">Nama Merek</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error("address") is-invalid @enderror" id="address"
                    name="address" placeholder="Masukkan nama usaha" value="{{ old("address", $brand->address) }}" required disabled>
                <label for="floatingInput">Alamat</label>
                @error("address")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error("owner") is-invalid @enderror" id="owner"
                    name="owner" placeholder="Masukkan nama usaha" value="{{ old("owner", $brand->owner) }}" required disabled>
                <label for="floatingInput">Pemilik Usaha</label>
                @error("owner")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logos" class="form-label">Masukkan Logo Usaha AKU SYANG ISNA</label>
                @if ($brand->logos)
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset("/storage/$brand->logos") }}">    
                @endif
            </div>

            <div class="mb-3">
                <label for="Input">Surat Usaha</label>
                <input type="text" class="form-control @error("certificate") is-invalid @enderror" id="certificate"
                    name="certificate" placeholder="Masukkan surat usaha" value="{{ old("certificate", $brand->certificate) }}" disabled>
            </div>

            <div class="mb-3">
                <label for="signature" class="form-label">Masukkan Tanda Tangan AKU SYANG ISNA</label>
                @if ($brand->signature)
                    <img class="img-preview2 img-fluid mb-3 col-sm-5 d-block" src="{{ asset("/storage/$brand->signature") }}">
                @endif
            </div>

            <a href="/admin/brands"class="btn btn-outline-warning">
                <i class="bi bi-plus-square mr-1"></i>
                <span>Back</span>
            </a>

        </div>


    </form>


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
            const image = document.querySelector('#image');
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
@endsection
