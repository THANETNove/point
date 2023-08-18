@extends('layouts.app2')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 beet">
                    <h6 class="text-white text-capitalize ps-3">เพิ่ม QRCODE</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-5">
                    <form role="form" class="text-start" method="POST" action="{{ 'new-qrcode' }}" enctype="multipart/form-data">
                        @csrf
                        <div class="customer-box">
                            <br>
                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    <p class="text-name-home">ชื่อ:</p>
                                    <input type="text" class="form-control @error('point') is-invalid @enderror" name="name" placeholder="ชื่อ" required>
                                </div>
                                @error('point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="hr3"></div>
                            <br>

                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    {{-- <p class="text-name-home">จำนวนเงิน:</p> --}}
                                    <input class="form-control @error('image.*') is-invalid @enderror" type="file" id="formFile" name="image" required>
                                    @error('image.*')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }} (PNG,JPEG,JPG)</strong>
                                    </span>
                                    @enderror
                                </div>
                                @error('point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <br>
                            <div class="hr3"></div>
                            <br>
                            <button type="submit" class="button">เติมเงิน</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection