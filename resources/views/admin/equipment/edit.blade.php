@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">แก้ไขข้อมูลพนักงาน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลพนักงาน</li>
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
            <form method="POST" action="{{ route('equipment-update') }}">
            @csrf
              <input type="text" name="id" value="{{ $data->id }}" hidden required>
              <div class="form-group row">
                <label for="equipments_name" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                <div class="col-md-6">
                    <input type="text" id="equipments_name" class="form-control" name="equipments_name" value="{{ $data->equipments_name }}" required>
                </div>
              </div>

              <br>
              <div class="form-group row">
                <div class="col-md-6 offset-md-3" style="text-align:center;">
                  <button class="btn btn-success" type="submit" style="margin-right:20px;">
                    <i class="fas fa-check-circle"></i> บันทึก
                  </button>
                  <a href="{{ route('equipments') }}">
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