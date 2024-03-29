@extends('layouts.app2')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-6 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ธนาคาร</h4>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row">
                        <div class="col">

                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="card-body">
                                <form role="form" class="text-start" method="POST" action="{{ 'add-bank_name' }}">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">ชื่อ ธนาคาร</label>
                                        <input type="text" class="form-control  @error('bank_name') is-invalid @enderror"
                                            name="bank_name" required>
                                        @error('bank_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">เลขบัญชี ธนาคาร</label>
                                        <input type="text"
                                            class="form-control   @error('bank_code') is-invalid @enderror" name="bank_code"
                                            required>
                                        @error('bank_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn bg-gradient-primary w-100 my-4 mb-2">บันทึก</button>
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
