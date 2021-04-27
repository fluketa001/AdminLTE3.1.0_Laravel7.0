@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">เพิ่มข้อมูลพนักงาน</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูลพนักงาน</li>
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
            <form method="POST" action="{{ route('user-store') }}">
              @csrf
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">ชื่อ - นามสกุล</label>

                <div class="col-md-6">
                    <input type="text" id="name" class="form-control" name="name" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">ชื่อผู้ใช้งาน</label>

                <div class="col-md-6">
                    <input type="text" id="username" class="form-control" name="username" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่าน</label>

                <div class="col-md-6">
                    <input type="password" id="password" class="form-control" name="password" minlength="4" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่าน</label>

                <div class="col-md-6">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" minlength="4" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="telephone" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>

                <div class="col-md-6">
                    <input type="text" id="telephone" class="form-control" name="telephone" maxlength="10" OnKeyPress="return chkNumber(this)" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="status" class="col-md-4 col-form-label text-md-right">สถานะ</label>

                <div class="col-md-6">
                    <select name="status" class="form-control">
                      <option value="0">Super Admin</option>
                      <option value="1">Admin</option>
                      <option value="2">Reporter</option>
                    </select>
                </div>
              </div>

              <br>
              <div class="form-group row">
                <div class="col-md-6 offset-md-3" style="text-align:center;">
                  <button class="btn btn-success" type="submit" style="margin-right:20px;">
                    <i class="fas fa-check-circle"></i> บันทึก
                  </button>
                  <a href="{{ route('users') }}">
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
@endsection