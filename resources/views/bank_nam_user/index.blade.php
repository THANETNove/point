<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>

    <div class="box-globlex">
        <div class="col-10 col-md-3">
            <h1 class="text-head-home">ผูกบัญชีธนาคาร</h1>
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
            <div class="col-10 col-md-10">
                <div class="col-3 mb-5">
                    <a href="{{ url('/bind-account') }}" class="button-home1">ผูกบัญชี</a>
                    @if (session('message'))
                        <p class=" mt-3" style="color: green; font-size: 18px"> {{ session('message') }}</p>
                    @endif
                    @if (session('messageDate'))
                        <p class="danger-text mt-3" style=" font-size: 18px"> {{ session('messageDate') }}</p>
                    @endif

                </div>
                <table class="table align-items-center mb-0 text-center ">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1 ">
                                ลำดับ
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                ชื่อ</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                เลขบัญชี</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                ธนาคาร/อื่นๆ</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                edit</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Date</th>


                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $bank)
                            <tr>
                                <td>
                                    <p>{{ $i++ }}</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $bank->bank_user }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ $bank->bank_numbar_user }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $bank->bank }}</span>
                                </td>
                                <td class="align-middle">
                                    <a href="{{ url('/edit-account', $bank->id) }}"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="Edit user">
                                        Edit
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <a onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                        href="{{ url('/delete-account', $bank->id) }}"
                                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                        data-original-title="delete user">
                                        delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</body>

</html>
