<!DOCTYPE html>
<html lang="en">

<head>
    @include('./layouts/head')
</head>

<body>

    <div class="box-globlex">
        <div class="col-10 col-md-3">
            <h1 class="text-head-home">เติมเงิน</h1>
            @include('./layouts/point')

            <div class="button-box-globlex">
                <div class="button-group">
                    <a href="{{ url('/home') }}" class="button-home">หน้าเเรก</a>
                    <a href="{{ url('/create_withdraw_money') }}" class="button-home1">ถอนเงิน</a>
                </div>
            </div>

        </div>
    </div>

    <div class="box-home-logout">
        <div class="col-12">
            <div class="col-12">
                <div>
                    <p id="serve-image" style="color: green; font-size: 18px;" class="text-center mt-5"></p>
                    @foreach ($dataQr as $qr)
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div>
                                    <p class="text-center">
                                        <img class="col-11 col-md-2 "
                                            src="{{ URL::asset('/img/qrcode/' . '' . $qr->url_qrcode) }}"
                                            onclick="showLargeImage('{{ URL::asset('/img/qrcode/' . '' . $qr->url_qrcode) }}')"
                                            alt="...">
                                    </p>
                                    <p class="text-center">
                                        {{--   <button class="btn btn-primary"
                                            onclick="showLargeImage('{{ URL::asset('/img/qrcode/' . '' . $qr->url_qrcode) }}')"
                                            download>serve
                                            ภาพ</button> --}}
                                    <p class="text-center">
                                        <a href="{{ URL::asset('/img/qrcode/' . '' . $qr->url_qrcode) }}" download
                                            class="btn btn-primary">serve ภาพ</a>
                                    </p>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12 d-flex justify-content-center">
                <div class="justify-content-center">
                    <p id="copied-account" style="color: green; font-size: 18px;" class="mt-5"></p>
                    @foreach ($data as $data1)
                        <div class="row mb-4">
                            <div class="col-md-9">
                                <p>ชื่อ &nbsp;{{ $data1->bank_name }} </p>
                                <p>เลขบัญชี &nbsp;{{ $data1->bank_code }}</p>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary copy-btn"
                                    data-content="{{ $data1->bank_code }}">คัดลอก</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="box-register1">

                <div class="col-10 col-md-3">
                    <form role="form" class="text-start" method="POST" action="{{ 'add-point' }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="customer-box">
                            <br>
                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    <p class="text-name-home">จำนวนเงิน:</p>
                                    <input type="number" class="form-control  @error('point') is-invalid @enderror"
                                        name="point" placeholder="จำนวนเงิน" required>
                                </div>
                                @error('point')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="hr3"></div>
                            <br>
                            {{-- < div class="box-row">
                            <div class="customer-div-home col-12">
                                <p class="text-name-home">ว/ด/ป/เวลา:</p>
                                <input type="text" class="form-control  @error('car_name') is-invalid @enderror"
                                    name="date" placeholder="ว/ด/ป/เวลา" required>
                            </div>
                            @error('car_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </>
                        <div class="hr3"></div>
                        <br> --}} <div class="box-row">
                                <div class="customer-div-home col-12">
                                    <p class="text-name-home">ธนาคารที่โอน:</p>
                                    <input type="text"
                                        class="form-control  @error('point_bank_name') is-invalid @enderror"
                                        name="point_bank_name" placeholder="ธนาคารที่โอน">
                                </div>
                                @error('point_bank_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="hr3"></div>
                            <br>
                            <div class="box-row">
                                <div class="customer-div-home col-12">
                                    {{--  <p class="text-name-home">จำนวนเงิน:</p> --}}
                                    <input class="form-control @error('image.*') is-invalid @enderror" type="file"
                                        id="formFile" name="image" required>
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
                            <button type="submit" class="button ">เติมเงิน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // รับปุ่มทั้งหมดที่มี class ชื่อ "copy-btn"
            const copyButtons = document.querySelectorAll('.copy-btn');

            copyButtons.forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    // สร้าง textarea ใน DOM
                    let textarea = document.createElement('textarea');
                    // เติมค่าจาก data-content attribute ไปยัง textarea
                    textarea.value = e.target.getAttribute('data-content');
                    // เพิ่ม textarea ไปยัง body
                    document.body.appendChild(textarea);
                    // เลือกข้อความใน textarea
                    textarea.select();
                    // คัดลอกข้อความ
                    document.execCommand('copy');
                    // ลบ textarea ออกจาก body
                    document.body.removeChild(textarea);
                    // แสดงข้อความแจ้งเตือนหรือการแจ้งเตือนอื่น ๆ ที่ต้องการ (ถ้ามี)
                    /* alert('เลขบัญชีถูกคัดลอกแล้ว'); */
                    document.getElementById('copied-account').textContent =
                        'ข้อความใหม่ที่คุณต้องการ';
                    setTimeout(() => {
                        document.getElementById('copied-account').textContent =
                            '';
                    }, 1000);

                });
            });
        });

        function showLargeImage(url) {
            let imageWindow = window.open('', '_blank');
            imageWindow.document.write('<img src="' + url + '" alt="QR code" style="max-width:100%; height:auto;">');
            imageWindow.document.close();
        }
    </script>
</body>

</html>
