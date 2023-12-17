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
        <h3 class="text-center">Buat Pengumuman</h3>
    </div>

    <form action="/admin/adminAnnouncements/{{ $announcement->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="col-lg-10 mx-auto">
            <div class="form-group">
                <label for="floatingInput" class="mb-2">Pengumuman Untuk:</label>
                <select class="choices form-select @error('for') is-invalid @enderror" name="for" required>
                    <option {{ old('for') == 'all' ? 'selected' : '' }} value="all">Semua</option>
                    @foreach ($users as $item)
                        <option {{ old('for', $announcement->notifiable_id) == "$item->id" ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('for')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Catatan</label>
                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="exampleFormControlTextarea1" rows="3">{{ old('notes', json_decode($announcement->data, true)['notes']) }}</textarea>
                @error('notes')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-plus-square mr-1 text-black"></i>
                <span class="text-black">Update Announcement</span>
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

@section('script')
    <script src="{{ asset('/dist/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src=" {{ asset('/dist/assets/js/pages/form-element-select.js') }}"></script>
@endsection
