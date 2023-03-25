<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>

    <div class="box-globlex">
        <div class="col-10 col-md-3">
            <h1 class="text-head-home">ถอยเงิน</h1>
            @include('./layouts/point')

            <div class="button-box-globlex">
                <div class="button-group">
                    <a href="{{ url('/home') }}" class="button-home">หน้าเเรก</a>
                    <a href="{{ url('/create_point') }}" class="button-home1">เติมเงิน</a>
                </div>
            </div>

        </div>
    </div>

    <div class="box-home-logout">
        <div class="box-register1">
            <div class="col-10 col-md-3">
                <form role="form" class="text-start" method="POST" action="{{ 'add-withdraw_money' }}"
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
                        </div>
                        @if (session('error'))
                            <h6 class="error-input1">
                                {{ session('error') }}
                            </h6>
                        @endif
                    </div>
                    <div class="hr3"></div>
                    <br>
                    @if (Auth::user()->ststus_point == 'on')
                        <samp class="button">ยังไม่สามารถถอนเงินได้</samp>
                    @else
                        <button type="submit" class="button">ถอนเงิน</button>
                    @endif


            </div>
            </form>
        </div>
    </div>
    </div>
    </div>



</body>

</html>
