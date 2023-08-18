<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body class="box-register">
    <a href="{{ url('/') }}" class="a-text">
        <i class="fa fa-angle-left icon-back" style="font-size: 40px"></i>
    </a>

    <p class="register-head">ทะเบียนบัญชี</p>
    <hr class="hr">
    <div class="box-register1">
        <div class="col-10 col-md-10">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                {{-- <div class="mb-3">
                    <div class="register-box">
                        <p class="text-name">ชื่อ:</p>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"
                            style="border:0 px" placeholder="ชื่อ">
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="hr2"></div>
        </div> --}}
        <div class="mb-3">
            <div class="register-box">
                <p class="text-name">ชื่อผู้ใช้:</p>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username"
                    style="border:0 px" placeholder="ชื่อผู้ใช้">
            </div>
            {{-- @error('error')
                        <span class="invalid-feedback" role="alert">
                            <strong class="error-input1">{{ $message }}</strong>
            </span>
            @enderror --}}
            @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif --}}

        <div class="hr2"></div>
    </div>
    <div class="mb-3">
        <div class="register-box">
            <p class="text-name">email:</p>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                style="border:0 px" placeholder="email">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="hr2"></div>
    </div>
    <div class="mb-3">
        <div class="register-box">
            <p class="text-name">รหัสผ่าน:</p>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                style="border:0 px" placeholder="รหัสผ่าน">
        </div>
        <div class="hr2"></div>
    </div>
    <div class="mb-3">
        <div class="register-box">
            <p class="text-name">ยื่นยันรหัสผ่าน:</p>
            <input id="password-confirm" type="password" class="form-control" style="border:0 px"
                name="password_confirmation" required autocomplete="new-password" placeholder="ยื่นยันรหัสผ่าน">
        </div>
        <div class="hr2"></div>
    </div>
    <div class="mb-3">
        <div class="register-box">
            <p class="text-name">เชื้อเชิญ:</p>
            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" style="border:0 px"
                placeholder="รหัสเชิญ">
        </div>
        @error('code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="hr2"></div>
    </div>
    <button type="submit" class="button">สมัครสมาชิก</button>
    </form>
    <a href="{{ url('/') }}" class="a-text">
        <p class="re-login">เข้าสู่ระบบ</p>
    </a>
    </div>
    </div>

</body>

</html>