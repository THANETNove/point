<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body class="box-globlex">
    <div class="col-10 col-md-3">
        <h1 class="text-head">Globlex</h1>
        <div class="mb-3">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="box-row">
                    <i class="fa fa-user icon-input" style="font-size: 20px"></i>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                        id="exampleFormControlInput1" placeholder="กรุณาใส่ชื่อบัญชีผู้ใช้">
                </div>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br>
                <div class="box-row">
                    <i class="fa fa-lock icon-input" style="font-size: 20px"></i>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        id="exampleFormControlInput1" placeholder="กรุณาใส่รหัสผ่าน">
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="button">เข้าสุ่ระบบ</button>
            </form>
            <a href="{{ url('/register') }}" class="a-text">

                <p class="re-name">--เปิดบัญชีใหม่--</p>
            </a>
            <a href="{{ route('password.request') }}" class="a-text">
                <p class="re-pass">--ลืมรหัสผ่าน--</p>
            </a>
        </div>

    </div>

</body>

</html>
