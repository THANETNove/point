<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>

    <div class="box-globlex">
        <div class="col-10 col-md-3">
            <h1 class="text-head-home">ประวัติถอนเงิน</h1>
            @include('./layouts/point')

            <div class="button-box-globlex">
                <div class="button-group">
                    <a href="{{ url('/home') }}" class="button-home">หน้าเเรก</a>
                    <a href="{{ url('create_withdraw_money') }}" class="button-home1">ถอนเงิน</a>
                </div>
            </div>

        </div>
    </div>

    <div class="box-home-logout">
        <div class="box-register1">
            <div class="col-10 col-md-10">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0 text-center ">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1 ">
                                    ลำดับ
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    จำนวนเงิน</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    บัญชี</th>


                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    สถานะ</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @if ($data !== null)
                                @foreach ($data as $data1)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs data1-weight-bold mb-0">
                                                {{ number_format($data1->point_low) }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs data1-weight-bold mb-0">
                                                {{ $data1->withdrawal_bank }}
                                            </p>
                                        </td>

                                        <td class="align-middle text-center">
                                            @if ($data1->status == 'approved')
                                                <span class="success-text">ถอนเงินสำเร็จ
                                                    โอนเงินเข้าบัญชีเรียบร้อย</span>
                                            @elseif($data1->status == 'reject')
                                                <span class="danger-text">ถอนเงิน
                                                    ไม่สำเร็จ</span>
                                            @else
                                                <span class="secondary-text">รอการตรวจสอบ</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->created_at }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($data)
                    {!! $data->links() !!}
                @endif
            </div>
        </div>
    </div>
    </div>



</body>

</html>
