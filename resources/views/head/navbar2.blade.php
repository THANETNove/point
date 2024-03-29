<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">

            <h6 class="font-weight-bolder mb-0">
                @if (session('message'))
                    <p class="danger-text"> {{ session('message') }}</p>
                @endif
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <?php
            $pathname = $_SERVER['REQUEST_URI'];
            $ex = explode('/', $pathname);
            $desiredPart = $ex[3];
            
            ?>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                @if (
                    $desiredPart == 'bonus' ||
                        $desiredPart == 'all-user' ||
                        $desiredPart == 'money-customers' ||
                        $desiredPart == 'admin-withdraw_money')
                    <div class="ms-md-auto pe-md-4 d-flex align-items-center">
                        <div class="customer-point">
                            <form
                                @if ($desiredPart == 'bonus') action="{{ url('/bonus') }}"
                             @elseif($desiredPart == 'all-user')  action="{{ url('/all-user') }}"
                             @elseif($desiredPart == 'money-customers')  action="{{ url('/money-customers') }}"
                             @elseif($desiredPart == 'admin-withdraw_money')  action="{{ url('/admin-withdraw_money') }}" @endif
                                method="post">
                                @csrf
                                <div class="row">
                                    <div class="col mt-3">
                                        <input class="form-control me-2" name="search" type="text"
                                            placeholder="Search" aria-label="Search">
                                    </div>
                                    <div class="col mt-3">
                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                        </div>
                    </div>
                @endif
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a class="btn btn-outline-primary btn-sm mb-0 me-3">{{ Auth::user()->point }} point</a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none"> {{ Auth::user()->username }}</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
</nav>
