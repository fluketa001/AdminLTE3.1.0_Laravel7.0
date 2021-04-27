<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HANAMI888') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logo.png') }}"/>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- SweetAlert -->
    <script src="{{ asset('js/sweetalert-dev.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

    <!-- Datatable -->
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}" />
    <style>
        div.dataTables_wrapper {
            margin: 0 auto;
        }
        thead, th {text-align: center;}
        .dataTables_filter {
            display: none;
        }
        .modal-header-success {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #5cb85c;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-warning {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #f0ad4e;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-danger {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #d9534f;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-info {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #5bc0de;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .modal-header-primary {
            color:#fff;
            padding:9px 15px;
            border-bottom:1px solid #eee;
            background-color: #428bca;
            -webkit-border-top-left-radius: 5px;
            -webkit-border-top-right-radius: 5px;
            -moz-border-radius-topleft: 5px;
            -moz-border-radius-topright: 5px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('admin.layouts.menu')
        @yield('content')
        @include('admin.layouts.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <!-- <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script> -->
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <!-- <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> -->
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> -->

    @if(\Session::get('message') == 'success')
            <?php
                echo '
                    <script type="text/javascript">
                        setTimeout(function () {
                            swal({
                                title: "สำเร็จ!",
                                text: "คุณได้ทำการบันทึกข้อมูลเรียบร้อย",
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
                            text: "คุณบันทึกข้อมูลไม่สำเร็จ",
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
    @elseif(\Session::get('message') == 'duplicate')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "เกิดข้อผิดพลาด!",
                            text: "มีข้อมูลนี้ซ้ำแล้ว",
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
    @elseif(\Session::get('message') == 'one')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "เกิดข้อผิดพลาด!",
                            text: "จำเป็นต้องมีผู้ดูแล 1 ท่านขึ้นไป",
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
    @elseif(\Session::get('message') == 'edit')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "สำเร็จ!",
                            text: "คุณได้ทำการแก้ไขข้อมูลเรียบร้อย",
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
    @elseif(\Session::get('message') == 'list-delete')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "สำเร็จ!",
                            text: "คุณได้ทำการแจ้งลบรายการไปยังSuperAdminเรียบร้อย",
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
    @elseif(\Session::get('message') == 'list-cancel')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "สำเร็จ!",
                            text: "คุณได้ทำการยกเลิกลบรายการเรียบร้อย",
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
    @elseif(\Session::get('message') == 'delete')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "สำเร็จ!",
                            text: "คุณได้ทำการลบข้อมูลเรียบร้อย",
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
    @elseif(\Session::get('message') == 'reset')
        <?php
            echo '
                <script type="text/javascript">
                    setTimeout(function () {
                        swal({
                            title: "สำเร็จ!",
                            text: "คุณได้ทำการรีเซตรหัสผ่านเรียบร้อย",
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
    @endif

    <script language="JavaScript">
        function chkNumber(ele) {
            var vchar = String.fromCharCode(event.keyCode);
            if (event.keyCode != '13') {
                if ((vchar < '0' || vchar > '9')) {
                    alert("กรุณาป้อนเฉพาะตัวเลขเท่านั้น!");
                    return false;
                } else {
                    ele.onKeyPress = vchar;
                }
            }
        }
    </script>
</body>
</html>
