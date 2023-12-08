@extends('layout.auth.main')
@section('container')
    <div class="container-fluid d-flex align-items-center justify-content-center border" style="height: 100vh">
        <div class="col-lg-6 col-md-10 rounded" style="background-color: #FFFFFF;">
            <div class="col-12 pt-4 px-4 text-end">
                <form action="/logout" id="logout" method="POST">
                    @csrf
                    <a onclick="submit()" class='sidebar-link'>
                        <i class="bi bi-x-circle" style="font-size: 2rem; color: red;"></i>
                    </a>
                </form>
                {{-- <a href="/logout">
                    <i class="bi bi-x-circle" style="font-size: 2rem; color: red;"></i>
                </a> --}}
            </div>
            {{-- <div class="col-lg-2 col-md-4 col-sm-4 my-3 mx-auto">
                <img class="img-fluid" src="images/pod-talk-logo.png" alt="">
            </div> --}}
            {{-- <h4 class="text-center mb-2">{{ __('Verify Your Email Address') }}</h4> --}}
            <div class="col-8 mb-3 mx-auto">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
    
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-secondary bg-gradient mt-2 mb-1">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
                <p class="mt-5 mb-1 text-muted text-center">&copy; 2023</p>
            </div>
        </div>
    </div>
@endsection
