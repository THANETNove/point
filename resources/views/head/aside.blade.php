<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ URL::asset('img/wallpaper.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Globlex</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- !  ส่วนของ admin  --}}
            @if (Auth::user()->status === 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/money-customers') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                            @if (DB::table('add_points')->where('status', 'null')->count() > 0)
                                <samp class="number-cir">
                                    {{ DB::table('add_points')->where('status', 'null')->count() }}
                                </samp>
                            @endif

                        </div>
                        <span class="nav-link-text ms-1">เติมเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin-withdraw_money') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">call_to_action</i>
                            @if (DB::table('withdraw_money')->where('status', 'null')->count() > 0)
                                <span class="number-cir">
                                    {{ DB::table('withdraw_money')->where('status', 'null')->count() }}
                                </span>
                            @endif

                        </div>
                        <span class="nav-link-text ms-1">ถอนเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/all-user') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_circle</i>
                        </div>
                        <span class="nav-link-text ms-1">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/bonus') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_circle</i>
                        </div>
                        <span class="nav-link-text ms-1">เพิ่ม Bonus</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/qrcode') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">Q</i>
                        </div>
                        <span class="nav-link-text ms-1">Qrcode</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/bank_name') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance</i>
                        </div>
                        <span class="nav-link-text ms-1">เพิ่ม ธนาคาร</span>
                    </a>
                </li>
            @endif

            {{-- !**  user ทั่วไป  --}}
            @if (Auth::user()->status !== 'admin')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="../pages/dashboard.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_circle</i>
                        </div>
                        <span class="nav-link-text ms-1">โปรโฟล์</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/add_point') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance_wallet</i>
                        </div>
                        <span class="nav-link-text ms-1">เติมเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/withdraw_money_customers') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">call_to_action</i>
                        </div>
                        <span class="nav-link-text ms-1">ถอนเงิน</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/bank_name_user') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">account_balance</i>
                        </div>
                        <span class="nav-link-text ms-1">เพิ่ม ธนาคาร</span>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

</aside>
