@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">เพิ่มข้อมูลห้องพัก</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูลห้องพัก</li>
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
            <form method="POST" action="{{ route('room-store') }}">
              <div class="box-body">
                @csrf
                <div class="form-group row">
                  <label for="rooms_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_number" class="form-control" name="rooms_number" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_house_number" class="col-md-4 col-form-label text-md-right">เลขที่บ้าน</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_house_number" class="form-control" name="rooms_house_number" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_contract_type" class="col-md-4 col-form-label text-md-right">ประเภทสัญญา</label>

                  <div class="col-md-6">
                      <select name="rooms_contract_type" class="form-control">
                        <option value="1">โครงการปล่อยเช่า</option>
                        <option value="2">ฝากปล่อยแบบการัณตี</option>
                        <option value="3">ฝากปล่อยแบบไม่การัณตี</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_type" class="col-md-4 col-form-label text-md-right">ประเภทห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_type" class="form-control">
                        <option value="M">M</option>
                        <option value="M2">M2</option>
                        <option value="XL">XL</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_size" class="col-md-4 col-form-label text-md-right">ขนาดห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_size" class="form-control">
                        <option value="28">28 ตร.ม</option>
                        <option value="32">32 ตร.ม</option>
                        <option value="36">36 ตร.ม</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_building" class="col-md-4 col-form-label text-md-right">อาคาร</label>

                  <div class="col-md-6">
                      <select name="rooms_building" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_direction" class="col-md-4 col-form-label text-md-right">ทิศ</label>

                  <div class="col-md-6">
                      <select name="rooms_direction" class="form-control">
                        <option value="north">เหนือ</option>
                        <option value="south">ใต้</option>
                        <option value="east">ตะวันออก</option>
                        <option value="west">คะวันตก</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_standard_price" class="col-md-4 col-form-label text-md-right">ราคามาตรฐาน</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_standard_price" class="form-control" name="rooms_standard_price" OnKeyPress="return chkNumber(this)" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_status" class="col-md-4 col-form-label text-md-right">สถานะห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_status" class="form-control">
                        <option value="1">ปล่อยเช่า</option>
                        <option value="0">ไม่ได้ปล่อยเช่า</option>
                      </select>
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <h4 for="rooms_direction" class="col-md-12 text-md-center">รายการอุปกรณ์ภายในห้อง</h4>
                </div>

                <div class="form-group row">
                @foreach($data as $equip)
                  <div class="col-md-1 text-md-right mb-4">
                    <input type="checkbox" class="form-control" name="equipments_id[]" value="{{ $equip->id }}">
                  </div>
                  <label class="col-md-2 col-form-label text-md-left">{{ $equip->equipments_name }}</label>
                @endforeach
                </div>

                <br>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-3" style="text-align:center;">
                    <button class="btn btn-success" type="submit" style="margin-right:20px;">
                      <i class="fas fa-check-circle"></i> บันทึก
                    </button>
                    <a href="{{ route('rooms') }}">
                        <button class="btn btn-danger" type="button">
                            <i class="fas fa-times-circle"></i> ยกเลิก
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
@endsection