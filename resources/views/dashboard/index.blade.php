{{-- {{ dd(auth()->user()->hasRole('admin')) }} --}}
<?php //$myPosts = $posts->where('user_id', auth()->user()->id)
?>
@extends('layout.dashboard.main')

@section('container')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Dashboard Administrator</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Admin</h6>
                                        <h6 class="font-extrabold mb-0">{{ $countAdmin }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldUser1"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Users</h6>
                                        <h6 class="font-extrabold mb-0">{{ $countUser }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldPaper"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Brands</h6>
                                        <h6 class="font-extrabold mb-0">{{ $brands->count() }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldActivity"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Access</h6>
                                        <h6 class="font-extrabold mb-0">{{ $daily->sum('login_count') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Brands</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-brands"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Access</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-users"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Europe</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">862</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-europe"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-success" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">America</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">375</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-america"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center">
                                            <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                style="width:10px">
                                                <use xlink:href="assets/images/bootstrap-icons.svg#circle-fill" />
                                            </svg>
                                            <h5 class="mb-0 ms-3">Indonesia</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h5 class="mb-0">1025</h5>
                                    </div>
                                    <div class="col-12">
                                        <div id="chart-indonesia"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Recently Approved Brands</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Owner</th>
                                                <th>Address</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($approvedBrands as $approvedBrand)
                                                <tr>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar avatar-md">
                                                                <img src="{{ asset('/storage/' . $approvedBrand->logos) }}" onerror="this.src='https://placehold.co/400?text=placeholder';">
                                                            </div>
                                                            <p class="font-bold ms-3 mb-0">{{ $approvedBrand->name }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0">{{ $approvedBrand->owner }}</p>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0">{{ $approvedBrand->address }}</p>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                {{-- <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">John Duck</h5>
                                <h6 class="text-muted mb-0">@johnducky</h6>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-header">
                        <h4>Verification Brands</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-donuts-brands"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Brands</h4>
                    </div>
                    <div class="card-content pb-4">
                        @forelse ($recentBrands as $recentBrand)
                            <div class="recent-message d-flex px-4 py-3">
                                <div class="avatar avatar-lg">
                                    <img src="{{ asset('/storage/' . $recentBrand->logos) }}"
                                        onerror="this.src='https://placehold.co/400?text=placeholder';">
                                </div>
                                <div class="name ms-4">
                                    <h5 class="mb-1">{{ $recentBrand->name }}</h5>
                                    <h6 class="text-muted mb-0">{{ $recentBrand->owner }}</h6>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <div class="px-4">
                            <a href="/admin/brands" class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">See
                                All Brands</a>
                            {{-- <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>See All Brands</button> --}}
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <footer>
            <div class="footer float-end clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; PDKI - Pemweb</p>
                </div>
                
            </div>
        </footer>
    </div>

    <input type="hidden" id="b_today" value="{{ $brandsToday }}">
    <input type="hidden" id="b_month" value="{{ $brandsMonth }}">
    <input type="hidden" id="b_year" value="{{ $brandsYear }}">

    <input type="hidden" id="u_today" value="{{ $dailyToday }}">
    <input type="hidden" id="u_month" value="{{ $dailyMonth }}">
    <input type="hidden" id="u_year" value="{{ $dailyYear }}">

    <input type="hidden" id="none" value="{{ $brands_none }}">
    <input type="hidden" id="accept" value="{{ $brands_accept }}">
    <input type="hidden" id="reject" value="{{ $brands_reject }}">
    <input type="hidden" id="revise" value="{{ $brands_revise }}">
@endsection

@push('scripts')
    <script>
        var b_today = document.querySelector('#b_today').value;
        var b_month = document.querySelector('#b_month').value;
        var b_year = document.querySelector('#b_year').value;
        var optionsBrands = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                // height: 400 
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'Brands',
                data: [b_year, b_month, b_today]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["Tahun Ini", "Bulan Ini", "Hari Ini"],
            },
        }
        var chartBrands = new ApexCharts(document.querySelector("#chart-brands"), optionsBrands);
        chartBrands.render();

        var u_today = document.querySelector('#u_today').value;
        var u_month = document.querySelector('#u_month').value;
        var u_year = document.querySelector('#u_year').value;
        var optionsUsers = {
            annotations: {
                position: 'back'
            },
            tooltip: {
                enabled: true,
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                // height: 300
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'Sessions',
                data: [u_year, u_month, u_today]
            }],
            colors: '#435ebe',
            xaxis: {
                categories: ["Tahun Ini", "Bulan Ini", "Hari Ini"],
            },
        }
        var chartUsers = new ApexCharts(document.querySelector("#chart-users"), optionsUsers);
        chartUsers.render();

        var none = document.querySelector('#none').value;
        var accept = document.querySelector('#accept').value;
        var reject = document.querySelector('#reject').value;
        var revise = document.querySelector('#revise').value;
        let optionsDonutsBrands = {
            series: [parseInt(accept), parseInt(reject), parseInt(revise), parseInt(none)],
            labels: ['Approved', 'Rejected', 'Revision', 'Not Yet'],
            colors: ['#45FFCA', '#C70039', '#FBCB0A', '#55c6e8'],
            chart: {
                type: 'donut',
                width: '100%',
                height: '350px'
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '30%'
                    }
                }
            }
        }
        var chartDonutsBrands = new ApexCharts(document.getElementById('chart-donuts-brands'), optionsDonutsBrands);
        chartDonutsBrands.render();
    </script>
@endpush

@section('script')
    {{-- <script src="{{ asset('/dist/assets/js/pages/dashboard.js') }}"></script> --}}
@endsection
