<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- SweetAlert -->
        <script src="{{ asset('js/sweetalert-dev.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <style>
        .center-div
        {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            max-width: 800px;
            height: 250px;
            border-radius: 3px;
            padding:0px 5px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #FFC312;
            color: black;
            border: 0 !important;
        }
        .login_btn {
            color: black;
            background-color: #FFC312;
            width: 100px;
        }
        html, body {
            font-family: Kanit;
            /* background-image: linear-gradient(#0f98e7, #6a70fc); */
            background-color: black;
            background-attachment: fixed;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
    </style>
<body style="text-align:center;padding-top:20px;background-image:none;">
    <!-- <img src="{{ asset('dist/img/logo.png') }}" style="width:175px;"> -->
    <div class="center-div">
        <div class="d-flex justify-content-center h-100">
            <div class="card" style="height: 250px;width: 400px;background-color:transparent;border-color:white;">
                <div class="card-header" style="color:white;font-weight:bold;font-size:20px;">{{ __('Login') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin-auth-login') }}">
                        @csrf
                        <fieldset class="form-group">
                            <div tabindex="-1" role="group">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="username" autocomplete="off" required="">

                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div tabindex="-1" role="group">
                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control" minlength="4" placeholder="password" required="">
                                </div>
                                <div class="form-group" align="center">
                                    <input id="btn-login" type="submit" value="เข้าสู่ระบบ" class="btn login_btn">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@if(\Session::get('message') == 'success')
    <?php
        echo '
            <script type="text/javascript">
                setTimeout(function () {
                    swal({
                        title: "Richer246 ยินดีต้อนรับ!",
                        text: "เว็บหวยออนไลน์ที่ดีที่สุด จ่ายเยอะที่สุด",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#228B22",
                        confirmButtonText: "รับทราบ",
                        closeOnConfirm: false
                    });
                }, 1000);
            </script>
        ';
    ?>
@elseif(\Session::get('message') == 'error')
    <?php
        echo '
            <script type="text/javascript">
                setTimeout(function () {
                    swal({
                        title: "เกิดข้อผิดพลาด!",
                        text: "คุณป้อน ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "รับทราบ",
                        closeOnConfirm: false
                    });
                }, 1000);
            </script>
        ';
    ?>
@endif
</body>
</html>