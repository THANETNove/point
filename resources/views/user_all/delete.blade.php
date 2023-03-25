@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ถอนโบนัส</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST"
                                    action="{{ url('admin-delete-ponint-user', $data->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 my-3 customer-point">
                                        <label for="exampleFormControlInput1" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" value="{{ $data->username }}"
                                            id="exampleFormControlInput1" placeholder="{{ $data->username }}">
                                    </div>
                                    <div class="mb-3 my-3 customer-point">
                                        <label for="exampleFormControlInput1" class="form-label">จำนวนเงิน</label>
                                        <input type="text" class="form-control" value="{{ number_format($data->point) }}"
                                            id="exampleFormControlInput1" placeholder="{{ $data->point }}">
                                    </div>
                                    <div class="mb-3 my-3 customer-point">
                                        <label for="exampleFormControlInput1" class="form-label">ถอนโบนัส</label>
                                        <input type="text" class="form-control" name="add_poit"
                                            id="exampleFormControlInput1" placeholder="ถอนโบนัส" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-primary w-100 my-4 mb-2">ถอนโบนัส</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="col">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
