@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">ประวัติการถอนเงิน</h6>
                        <h6 class="text-white text-capitalize ps-3">
                            <a href="{{ url('/create_withdraw_money') }}" class="btn btn-outline-light">
                                ถอนเงิน
                            </a>
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center ">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1 ">
                                        ลำดับ
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        จำนวนเงิน</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ธนาคาร ที่โอนเงิน</th>
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
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>
                                                <p>{{ $i++ }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $data->point }}</p>
                                            </td>

                                            <td class="align-middle text-center">
                                                @if ($data->status == 'approved')
                                                    <span class="badge badge-sm bg-gradient-success">ถอนเงินสำเร็จ
                                                        โอนเงินเข้าบัญชีเรียบร้อย</span>
                                                @elseif($data->status == 'reject')
                                                    <span
                                                        class="badge badge-sm badge badge badge-sm bg-gradient-danger">ถอนเงิน
                                                        ไม่สำเร็จ</span>
                                                @else
                                                    <span
                                                        class="badge badge-sm badge badge badge-sm bg-gradient-secondary">รอการตรวจสอบ</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
