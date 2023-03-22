<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>

    <div class="box-globlex">
        <div class="col-10 col-md-3">
            <h1 class="text-head-home">เติมเงิน</h1>
            @include('./layouts/point')

            <div class="button-box-globlex">
                <div class="button-group">
                    <a href="{{ url('/home') }}" class="button-home">หน้าเเรก</a>
                    <a href="{{ url('/create_withdraw_money') }}" class="button-home1">ถอนเงิน</a>
                </div>
            </div>

        </div>
    </div>

    <div class="box-home-logout">
        <div class="box-register1">
            <div class="col-10 col-md-3">
                <form role="form" class="text-start" method="POST" action="{{ 'add-point' }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="customer-box">
                        <br>
                        <br>
                        <div class="box-row">
                            <div class="customer-div-home col-12">
                                <p class="text-name-home">จำนวนเงิน:</p>
                                <input type="number" class="form-control  @error('point') is-invalid @enderror"
                                    name="point" placeholder="จำนวนเงิน" required>
                            </div>
                            @error('point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="hr3"></div>
                        <br>
                        <div class="box-row">
                            <div class="customer-div-home col-12">
                                <p class="text-name-home">ว/ด/ป/เวลา:</p>
                                <input type="text" class="form-control  @error('car_name') is-invalid @enderror"
                                    name="date" placeholder="ว/ด/ป/เวลา" required>
                            </div>
                            @error('car_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="hr3"></div>
                        <br>
                        <div class="box-row">
                            <div class="customer-div-home col-12">
                                <p class="text-name-home">ธนาคารที่โอน:</p>
                                <input type="text"
                                    class="form-control  @error('point_bank_name') is-invalid @enderror"
                                    name="point_bank_name" placeholder="ธนาคารที่โอน" required>
                            </div>
                            @error('point_bank_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="hr3"></div>
                        <br>
                        <div class="box-row">
                            <div class="customer-div-home col-12">
                                {{--  <p class="text-name-home">จำนวนเงิน:</p> --}}
                                <input class="form-control @error('image.*') is-invalid @enderror" type="file"
                                    id="formFile" name="image" required>
                                @error('image.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                    </span>
                                @enderror
                            </div>
                            @error('point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <br>
                        <div class="hr3"></div>
                        <br>
                        <button type="submit" class="button">เติมเงิน</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>



</body>

</html>
