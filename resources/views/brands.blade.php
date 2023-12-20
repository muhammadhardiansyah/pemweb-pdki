@extends('layout.guest.search')
@section('container')
    <main class="px-3 mb-3">
        <div class="d-flex align-items-center">
            <div class="container col-lg-8 text-center">
                {{-- <img class="col-4" src="{{ asset('logo/uns_cover.png') }}" alt=""> --}}
                <h1 class="text-primary mb-3">Rekam Permohonan</h1>
                <form>
                    <div class="container col-lg-8 ">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-primary" id="basic-addon1"><i
                                    class="bi bi-search mb-2 text-white"></i></span>
                            <input type="text" class="form-control" name="search_post" type="search" placeholder="Masukkan nama merek"
                                aria-describedby="button-addon2" {{ request('search_post') }} required>
                            <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <section class="container col-lg-10">
        <div class="row g-4">
            @foreach ($brands as $brand)
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-content">
                            <img class="d-block mx-auto img-fluid" src="{{ '/storage/' . $brand->logos }}"
                                alt="Card image cap" onerror="this.src='https://placehold.co/400?text=placeholder';">
                            <div class="card-body">
                                @if ($brand->decision == 1)
                                    <span class="alert alert-success float-end mb-3">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Approved
                                    </span>
                                @elseif($brand->decision == 0)
                                    <span class="alert alert-danger float-end mb-3">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Reject
                                    </span>
                                @elseif($brand->decision == 2)
                                    <span class="alert alert-info float-end mb-3">
                                        <i class="bi bi-circle"></i>
                                        Not Yet
                                    </span>
                                @else
                                    <span class="alert alert-warning float-end mb-3 text-black">
                                        <i class="bi bi-exclamation-circle-fill"></i>
                                        Revision
                                    </span>
                                @endif
                                <h4 class="card-title">{{ $brand->name }}</h4>
                                <p class="card-text mb-0    ">
                                    Address: {{ $brand->address }}
                                </p>
                                <p class="font-bold">Owner: {{ $brand->owner }}</p>


                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span></span>
                            <a href="/home/brands/{{ $brand->id }}" class="btn btn-primary col-12">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="">
                {{ $brands->links() }}
            </div>
        </div>
    </section>
@endsection
