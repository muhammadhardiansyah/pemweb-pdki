@extends('layout.dashboard.main')
@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="container col-lg-8 col-md-8 mb-3">
                            <img class="w-100 active mb-3 text-center" src="{{ asset('storage/' . $brand->logos) }}">
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
                                            <input type="text" class="form-control" value="{{ $brand->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Pemilik</label>
                                            <input type="text" class="form-control" value="{{ $brand->owner }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" value="{{ $brand->address }}"
                                                readonly>
                                        </div>
                                    </div>
                                    @if ($brand->decision == 1)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-success"><i class="bi bi-check-circle pe-1"></i> Ok!
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($brand->decision == 0)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-danger"><i class="bi bi-x-circle pe-1"></i>Ditolak
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Catatan</label>
                                                <textarea class="form-control" rows="3" readonly>{{ $brand->notes }}</textarea>
                                            </div>
                                        </div>
                                    @elseif($brand->decision == 2)
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-warning"><i
                                                        class="bi bi-exclamation-triangle pe-1"></i>Belum Diverifikasi</div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="/admin/brands/{{ $brand->id }}/edit"
                                                class="btn btn-warning me-1 mb-1 text-black"><i
                                                    class="bi bi-pencil-square me-1"></i>Edit Pengajuan Merek</a>
                                            {{-- <button type="submit" class="btn btn-primary me-1 mb-1">Edit Pengajuan Merek</button> --}}
                                        </div>
                                    @else
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Status Verifikasi</label>
                                                <div class="alert alert-warning"><i
                                                        class="bi bi-exclamation-triangle pe-1"></i>Revisi</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-label">Catatan</label>
                                                <textarea class="form-control" rows="3" readonly>{{ $brand->notes }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="/admin/brands/{{ $brand->id }}/edit"
                                                class="btn btn-warning me-1 mb-1 text-black"><i
                                                    class="bi bi-pencil-square me-1"></i>Edit Pengajuan Merek</a>
                                            {{-- <button type="submit" class="btn btn-primary me-1 mb-1">Edit Pengajuan Merek</button> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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
