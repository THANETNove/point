<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>

    <div class="box-globlex">
        <div class="col-10 col-md-4">
            <h1 class="text-head-home">บัญชีธนาคาร</h1>
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
                @foreach ($data as $data)
                    <form role="form" class="text-start" method="POST"
                        action="{{ url('update-bank_name_user', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="customer-box">
                            <br>
                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    <p class="text-name-home">ชื่อบัญชื่:</p>
                                    <input type="text" class="form-control  @error('bank_user') is-invalid @enderror"
                                        name="bank_user" value={{ $data->bank_user }} placeholder="ชื่อบัญชื่" required>
                                </div>
                                @error('bank_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="hr3"></div>
                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    <p class="text-name-home">หมายเลขบัญชี:</p>
                                    <input type="text"
                                        class="form-control  @error('bank_numbar_user') is-invalid @enderror"
                                        name="bank_numbar_user" value={{ $data->bank_numbar_user }}
                                        placeholder="หมายเลขบัญชี" required>
                                </div>
                                @error('bank_numbar_user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="hr3"></div>
                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    <p class="text-name-home">ธนาคาร:</p>
                                    <input type="text" class="form-control  @error('bank') is-invalid @enderror"
                                        name="bank" placeholder="ธนาคาร" value={{ $data->bank }} required>
                                </div>
                                @error('bank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="hr3"></div>
                            <br>
                            <button type="submit" class="button">ผูกบัญชี</button>
                        </div>
                @endforeach
                </form>
            </div>
        </div>
    </div>



</body>

</html>
