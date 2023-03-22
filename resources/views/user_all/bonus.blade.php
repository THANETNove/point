@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                        <h6 class="text-white text-capitalize ps-3">เติมโบนัส</h6>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">
                                        เติมเงิน</th>
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
                                            <p class="text-xs font-weight-bold mb-0 success-text">
                                                {{ number_format($data1->point) }}</p>
                                        </td>
                                        <td> {{ $data1->id }}
                                            <div class="row">
                                                <div class="col-12 col-md-8">
                                                    <form role="form" class="text-start" method="POST"
                                                        action="{{ url('admin-add-ponint-user', $data1->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class=" my-3 customer-point">
                                                            <input type="number"
                                                                class="form-control  @error('add_poit') is-invalid @enderror"
                                                                name="add_poit" placeholder="เติมเงิน">
                                                            @error('add_poit')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <button type="submit"
                                                        class="btn bg-gradient-primary w-100 my-3 mb-2">บันทึก</button>
                                                </div>

                                            </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection