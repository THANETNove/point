@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body class="box-register">
    <a href="{{ url('/') }}" class="a-text">
        <i class="fa fa-angle-left icon-back" style="font-size: 40px"></i>
    </a>

    <p class="register-head">RESET PASSWORD</p>
    <hr class="hr">
    <div class="box-register1">
        <div class="col-10 col-md-10">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <div class="register-box">
                        <p class="text-name">Email Address:</p>
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                            style="border:0 px" placeholder="ชื่อ">
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="hr2"></div>
                </div>
                <button type="submit" class="button">ส่งเมล์</button>
            </form>
            <a href="{{ url('/') }}" class="a-text">
                <p class="re-login">เข้าสู่ระบบ</p>
            </a>
        </div>
    </div>

</body>

</html> --}}
