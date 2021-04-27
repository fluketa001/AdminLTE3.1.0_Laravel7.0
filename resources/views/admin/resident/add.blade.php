@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">เพิ่มข้อมูลผู้พักอาศัย</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">เพิ่มข้อมูลผู้พักอาศัย</li>
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
            <form method="POST" action="{{ route('resident-store') }}">
              <div class="box-body">
                @csrf

                <div class="form-group row">
                  <label for="rooms_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_id" class="form-control">
                        @foreach($data as $room)
                          <option value="{{ $room->id }}">{{ $room->rooms_number }} | {{ $room->rooms_house_number }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_name" class="col-md-4 col-form-label text-md-right">ชื่อ - นามสกุล</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_name" class="form-control" name="residents_name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_telephone" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_telephone" class="form-control" name="residents_telephone" OnKeyPress="return chkNumber(this)" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_career" class="col-md-4 col-form-label text-md-right">อาชีพ</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_career" class="form-control" name="residents_career" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_rent_price" class="col-md-4 col-form-label text-md-right">อัตราค่าเช่า</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_rent_price" class="form-control" name="residents_rent_price" OnKeyPress="return chkNumber(this)" required>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="residents_contract_start" class="col-md-4 col-form-label text-md-right">วันเริ่มสัญญา</label>

                  <div class="col-md-6">
                      <input type="datetime-local" id="residents_contract_start" class="form-control" name="residents_contract_start" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_contract_end" class="col-md-4 col-form-label text-md-right">วันสิ้นสุดสัญญา</label>

                  <div class="col-md-6">
                      <input type="datetime-local" id="residents_contract_end" class="form-control" name="residents_contract_end" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_address" class="col-md-4 col-form-label text-md-right">ที่อยู่</label>

                  <div class="col-md-6">
                      <textarea type="text" id="residents_address" class="form-control" name="residents_address" rows="3" required></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_emergency" class="col-md-4 col-form-label text-md-right">เบอร์ติดต่อกรณีฉุกเฉิน</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_emergency" class="form-control" name="residents_emergency" OnKeyPress="return chkNumber(this)" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_status" class="col-md-4 col-form-label text-md-right">สถานะการเช่า</label>

                  <div class="col-md-6">
                      <select name="residents_status" class="form-control">
                        <option value="1">กำลังเช่า</option>
                        <!-- <option value="2">เลิกเช่า</option> -->
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_note" class="col-md-4 col-form-label text-md-right">หมายเหตุ</label>

                  <div class="col-md-6">
                      <textarea type="text" id="residents_note" class="form-control" name="residents_note" rows="3"></textarea>
                  </div>
                </div>

                <br>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-3" style="text-align:center;">
                    <button class="btn btn-success" type="submit" style="margin-right:20px;">
                      <i class="fas fa-check-circle"></i> บันทึก
                    </button>
                    <a href="{{ route('residents') }}">
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