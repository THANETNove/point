@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">ตรวจเช็คการถอนเงิน</h6>
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
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อ</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        จำนวนเงิน</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        ยอดเงินคงเหลือ</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อบัญชื่</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        หมายเลขบัญชี</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ชื่อธนาคาร</th>
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
                                @foreach ($data as $data1)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->username }}</span>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 danger-text">
                                                {{ number_format($data1->point_low) }}</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 success-text">
                                                {{ number_format($data1->point) }}</p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->bank_user }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->bank_numbar_user }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $data1->bank }}</span>
                                        </td>


                                        <td class="align-middle text-center">
                                            <div style="padding-left: 100px">
                                                <div class="row col-10">
                                                    <div class="col-12 col-md-6">
                                                        <form role="form" class="text-start" method="POST"
                                                            action="{{ url('update-withdraw_money', $data1->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3 my-3" style="display:none">
                                                                <input type="text" class="form-control" name="add_point"
                                                                    value="{{ $data1->point_low }}"
                                                                    id="exampleFormControlInput1">
                                                                <input type="text" class="form-control" name="app_rej"
                                                                    value="approved" id="exampleFormControlInput1">
                                                            </div>
                                                            <button type="submit" class="btn btn-success">ถอนเงิน</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <form role="form" class="text-start" method="POST"
                                                            action="{{ url('update-withdraw_money', $data1->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3 my-3" style="display:none">
                                                                <input type="text" class="form-control" name="car_name"
                                                                    value="{{ $data1->point }}"
                                                                    id="exampleFormControlInput1">
                                                                <input type="text" class="form-control" name="app_rej"
                                                                    value="reject" id="exampleFormControlInput1">
                                                            </div>
                                                            <button type="submit" class="btn btn-danger">ปฏิเสธ</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{--  --}}

                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data1->created_at }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
