@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ข้อมูลค่าเช่า</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">ข้อมูลค่าเช่า</li>
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
          <div class="col-md-9 box box-primary">
            <form>
              <div class="box-body">
                @csrf
                <div class="form-group row">
                  <label for="rents_month" class="col-md-4 col-form-label text-md-right">เดือน</label>

                  <div class="col-md-6">
                    <input type="month" id="rents_month" name="rents_month" class="form-control" value="<?php echo date('Y-m',strtotime($data->rents_month)); ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rents_datetime" class="col-md-4 col-form-label text-md-right">วันเวลารับค่าเช่า</label>

                  <div class="col-md-6">
                      <input type="datetime-local" id="rents_datetime" class="form-control" name="rents_datetime" value="<?php echo date('Y-m-d\TH:i',strtotime($data->rents_datetime)); ?>" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="offset-4 col-md-6">
                    <img src="{{ asset('slip/'.$data->rents_slip) }}" style="width:250px;">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_id" class="form-control" id="rooms_id" disabled>
                          <option value="{{ $data->rooms_id }}">{{ $data->rooms_number }} | {{ $data->rooms_house_number }}</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_name" class="col-md-4 col-form-label text-md-right">ชื่อ - นามสกุล</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_name" class="form-control" name="residents_name" value="{{ $data->residents_name }}" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_telephone" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_telephone" class="form-control" name="residents_telephone" value="{{ $data->residents_telephone }}" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_rent_price" class="col-md-4 col-form-label text-md-right">ค่าเช่า/เดือน</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_rent_price" class="form-control" name="residents_rent_price" OnKeyPress="return chkNumber(this)" value="{{ $data->residents_rent_price }}" readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="users_name" class="col-md-4 col-form-label text-md-right">ผู้บันทึก</label>

                  <div class="col-md-6">
                      <input type="text" id="users_name" class="form-control" name="users_name" value="{{ auth('user')->user()->users_name }}" readonly>
                  </div>
                </div>

                <br>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-3" style="text-align:center;">
                    <a href="{{ route('rents') }}">
                        <button class="btn btn-danger" type="button">
                            <i class="fas fa-times-circle"></i> ย้อนกลับ
                        </button>
                    </a>
                  </div>
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