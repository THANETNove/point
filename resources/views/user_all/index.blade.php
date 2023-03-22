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
                                    {{--                                     <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        email</th> --}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 col-3">
                                        จำนวนเงิน</th>

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
                                @foreach ($data as $data)
                                    <tr>
                                        <td>
                                            <p>{{ $i++ }}</p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data->username }}</span>
                                        </td>
                                        {{--                                         <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $data->email }}</p>
                                        </td> --}}
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 success-text">
                                                {{ number_format($data->point) }}</p>
                                        </td>
                                        <td class="col-1">
                                            @if ($data->ststus_point == 'on')
                                                <form role="form" class="text-start" method="POST"
                                                    action="{{ url('update-ststus_point', $data->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3 my-3" style="display:none">
                                                        <input type="text" class="form-control" name="app_rej"
                                                            value="off" id="exampleFormControlInput1">
                                                    </div>
                                                    <button type="submit" class="btn btn-success">เปิดถอนเงิน</button>
                                                </form>
                                            @else
                                                <form role="form" class="text-start" method="POST"
                                                    action="{{ url('update-ststus_point', $data->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3 my-3" style="display:none">
                                                        <input type="text" class="form-control" name="app_rej"
                                                            value="on" id="exampleFormControlInput1">
                                                    </div>
                                                    <button type="submit" class="btn btn-danger">ปิดถอนเงิน</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $data->created_at }}</span>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
