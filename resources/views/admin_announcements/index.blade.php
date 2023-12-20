{{-- {{ dd($announcements[0]->data) }} --}}
@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-12 mx-auto" role="alert">
            <i class="bi bi-check-circle pe-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show col-12 mx-auto" role="alert">
            <i class="bi bi-exclamation-triangle pe-2"></i>
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show col-12 mx-auto" role="alert">
            <i class="bi bi-check-circle pe-2"></i>
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="page-heading">
        <h3>Announcements</h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>All Announcements</span>
                <a href="/admin/adminAnnouncements/create" class="btn btn-success icon icon-left"><i data-feather="user"></i> <span>Add Announcement</span></a>
            </div>
            <div class="card-body">
                <table class="table" id="table_posts">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">For</th>
                            <th class="text-center">Note</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($announcements as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $users->find($item->notifiable_id)->name }}</td>
                                <td class="text-center">{{ json_decode($item->data, true)['notes'] }}</td>
                                {{-- <td class="text-center">{{ $user->numbers }}</td> --}}
                                {{-- <td class="text-center">{{ $user->address }}</td> --}}
                                {{-- <td class="text-center">{{ $user->address }}</td> --}}
                                {{-- <td class="text-center" col-4>
                                    @if ($user->image)
                                        <img src="/storage/{{ $user->image }}" class="img-fluid p-1" alt="">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="NULL">
                                    @endif
                                </td> --}}
                                {{-- <td class="text-center">
                                    <span>{{ $user->authorizations->name }}</span>
                                </td> --}}
                                <td class="col-2">
                                    <a class="btn btn-outline-warning m-1 col-12" href="/admin/adminAnnouncements/{{ $item->id }}/edit">
                                        <i class="bi bi-pencil-square"></i>
                                        <span>Edit</span>
                                    </a>
                                    <form action="/admin/adminAnnouncements/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger m-1 col-12" onclick="return confirm('Are you sure?')">
                                            <i class="bi bi-trash-fill"></i>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table_posts').DataTable( {
                retrieve: true,
                responsive: true
            });
        });
        // let jquery_datatable = $("#table_posts").DataTable();
    </script>
@endpush
