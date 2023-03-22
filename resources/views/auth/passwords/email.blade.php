<!DOCTYPE html>
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
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <div class="register-box">
                        <p class="text-name">Email Address:</p>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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

</html>
