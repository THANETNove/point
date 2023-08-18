<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>
    <div class="box-globlex">
        <div class="col-10 col-md-3">
            <h1 class="text-head-home">Globlex</h1>
            @include('./layouts/point')
            <div class="button-box-globlex">
                <div class="button-group">
                    <a href="{{ url('/create_point') }}" class="button-home">เติมเงิน</a>
                    <a href="{{ url('/create_withdraw_money') }}" class="button-home1">ถอนเงิน</a>
                </div>
            </div>
        </div>
    </div>

    <div class="box-home-logout">
        <div class="box-register1">
            <div class="col-10 col-md-3">
                <div class="customer-box">
                    <br>
                    <br>
                    <div class="box-row">
                        <div class="customer-div-home">
                            <i class="fa fa-user icon-home" style="font-size: 20px"></i>
                            <a href="https://line.me/ti/p/P7YmAJ6o-5" target="_blank" class="a-text a-color"
                                rel="noopener noreferrer">
                                <p style="customer-home">ฝ่ายบริการลูกค้า</p>
                            </a>
                        </div>
                    </div>
                    <div class="hr3"></div>
                    <br>
                    <div class="box-row">
                        <div class="customer-div-home">
                            <i class="fa fa-bank icon-home" style="font-size: 20px"></i>
                            <a href="{{ url('/bank_name_user') }}" class="a-text a-color ">
                                <p style="customer-home">ผูกบัญชีธนาคาร</p>
                            </a>
                        </div>
                    </div>
                    <div class="hr3"></div>
                    <br>
                    <div class="box-row">
                        <div class="customer-div-home">
                            <i class="fa fa-paypal icon-home" style="font-size: 20px"></i>
                            <a href="{{ url('/add_point') }}" class="a-text a-color ">
                                <p style="customer-home">ประวัติเติมเงิน</p>
                            </a>

                        </div>
                    </div>
                    <div class="hr3"></div>
                    <br>
                    <div class="box-row">
                        <div class="customer-div-home">
                            <i class="fa fa-credit-card icon-home" style="font-size: 20px"></i>
                            <a href="{{ url('/withdraw_money_customers') }}" class="a-text a-color ">
                                <p style="customer-home">ประวัติถอนเงิน</p>
                            </a>

                        </div>
                    </div>
                    <div class="hr3"></div>
                    <br>
                    <div class="box-row">
                        <div class="customer-div-home">
                            <i class="fa fa-power-off icon-home" style="font-size: 20px"></i>

                            <a class="nav-link " href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                                <span class="out-home">ออกจากระบบ</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                        </div>
                    </div>
                    <div class="hr3" style="margin-top: 10px"></div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
