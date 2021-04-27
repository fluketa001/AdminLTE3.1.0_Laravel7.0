@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">แก้ไขค่าแต้ม</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">แก้ไขค่าแต้ม</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <br>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <form method="POST" action="{{ route('config-point-update') }}">
            @csrf
              <input type="text" name="id" value="{{ $data->id }}" hidden required>
              <div class="form-group row">
                <label for="config_points_price" class="col-md-4 col-form-label text-md-right">แต้มที่ใช้แลก(ต่อบาท)</label>

                <div class="col-md-6">
                    <input type="text" id="config_points_price" class="form-control" name="config_points_price" value="{{ $data->config_points_price }}" OnKeyPress="return chkNumber(this)" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="config_points_rate_change" class="col-md-4 col-form-label text-md-right">อัตราได้รับแต้ม((บาทต่อแต้ม))</label>

                <div class="col-md-6">
                    <input type="text" id="config_points_rate_change" class="form-control" name="config_points_rate_change" value="{{ $data->config_points_rate_change }}" OnKeyPress="return chkNumber(this)" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="config_points_expire" class="col-md-4 col-form-label text-md-right">กำหนดหมดอายุแต้ม</label>

                <div class="col-md-6">
                    <select class="form-control" name="config_points_expire">
                      <option value="1" <?php if($data->config_points_expire == '1'){ echo 'selected'; } ?>>1 วัน</option>
                      <option value="2" <?php if($data->config_points_expire == '2'){ echo 'selected'; } ?>>2 วัน</option>
                      <option value="3" <?php if($data->config_points_expire == '3'){ echo 'selected'; } ?>>3 วัน</option>
                      <option value="4" <?php if($data->config_points_expire == '4'){ echo 'selected'; } ?>>4 วัน</option>
                      <option value="5" <?php if($data->config_points_expire == '5'){ echo 'selected'; } ?>>5 วัน</option>
                    </select>
                </div>
              </div>

              <br>
              <div class="form-group row">
                <div class="col-md-6 offset-md-3" style="text-align:center;">
                  <button class="btn btn-success" type="submit" style="margin-right:20px;">
                    <i class="fas fa-check-circle"></i> บันทึก
                  </button>
                  <a href="{{ route('config-points') }}">
                      <button class="btn btn-danger" type="button">
                          <i class="fas fa-times-circle"></i> ยกเลิก
                      </button>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @if(\Session::get('message') == 'error')
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
    @endif
@endsection