@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">แก้ไขข้อมูลห้องพัก</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลห้องพัก</li>
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
            <form method="POST" action="{{ route('room-update') }}">
              <div class="box-body">
              @csrf
                <input type="text" name="id" value="{{ $data->id }}" hidden required>
                <div class="form-group row">
                  <label for="rooms_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_number" class="form-control" name="rooms_number" value="{{ $data->rooms_number }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_house_number" class="col-md-4 col-form-label text-md-right">เลขที่บ้าน</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_house_number" class="form-control" name="rooms_house_number" value="{{ $data->rooms_house_number }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_contract_type" class="col-md-4 col-form-label text-md-right">ประเภทสัญญา</label>

                  <div class="col-md-6">
                      <select name="rooms_contract_type" class="form-control">
                        <option value="1" <?php if($data->rooms_contract_type == '1'){ echo 'selected'; } ?>>โครงการปล่อยเช่า</option>
                        <option value="2" <?php if($data->rooms_contract_type == '2'){ echo 'selected'; } ?>>ฝากปล่อยแบบการัณตี</option>
                        <option value="3" <?php if($data->rooms_contract_type == '3'){ echo 'selected'; } ?>>ฝากปล่อยแบบไม่การัณตี</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_type" class="col-md-4 col-form-label text-md-right">ประเภทห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_type" class="form-control">
                        <option value="M" <?php if($data->rooms_type == 'M'){ echo 'selected'; } ?>>M</option>
                        <option value="M2" <?php if($data->rooms_type == 'M2'){ echo 'selected'; } ?>>M2</option>
                        <option value="XL" <?php if($data->rooms_type == 'XL'){ echo 'selected'; } ?>>XL</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_size" class="col-md-4 col-form-label text-md-right">ขนาดห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_size" class="form-control">
                        <option value="28" <?php if($data->rooms_size == '28'){ echo 'selected'; } ?>>28 ตร.ม</option>
                        <option value="32" <?php if($data->rooms_size == '32'){ echo 'selected'; } ?>>32 ตร.ม</option>
                        <option value="36" <?php if($data->rooms_size == '36'){ echo 'selected'; } ?>>36 ตร.ม</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_building" class="col-md-4 col-form-label text-md-right">อาคาร</label>

                  <div class="col-md-6">
                      <select name="rooms_building" class="form-control">
                        <option value="A" <?php if($data->rooms_building == 'A'){ echo 'selected'; } ?>>A</option>
                        <option value="B" <?php if($data->rooms_building == 'B'){ echo 'selected'; } ?>>B</option>
                        <option value="C" <?php if($data->rooms_building == 'C'){ echo 'selected'; } ?>>C</option>
                        <option value="D" <?php if($data->rooms_building == 'D'){ echo 'selected'; } ?>>D</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_direction" class="col-md-4 col-form-label text-md-right">ทิศ</label>

                  <div class="col-md-6">
                      <select name="rooms_direction" class="form-control">
                        <option value="north" <?php if($data->rooms_direction == 'north'){ echo 'selected'; } ?>>เหนือ</option>
                        <option value="south" <?php if($data->rooms_direction == 'south'){ echo 'selected'; } ?>>ใต้</option>
                        <option value="east" <?php if($data->rooms_direction == 'east'){ echo 'selected'; } ?>>ตะวันออก</option>
                        <option value="west" <?php if($data->rooms_direction == 'west'){ echo 'selected'; } ?>>คะวันตก</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_standard_price" class="col-md-4 col-form-label text-md-right">ราคามาตรฐาน</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_standard_price" class="form-control" name="rooms_standard_price" OnKeyPress="return chkNumber(this)" value="{{ $data->rooms_standard_price }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_status" class="col-md-4 col-form-label text-md-right">สถานะห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_status" class="form-control">
                        <option value="1" <?php if($data->rooms_status == '1'){ echo 'selected'; } ?>>ปล่อยเช่า</option>
                        <option value="0" <?php if($data->rooms_status == '0'){ echo 'selected'; } ?>>ไม่ได้ปล่อยเช่า</option>
                      </select>
                  </div>
                </div>

                <br>

                <div class="form-group row">
                  <h4 for="rooms_direction" class="col-md-12 text-md-center">รายการอุปกรณ์ภายในห้อง</h4>
                </div>

                <div class="form-group row">
                @foreach($equipment as $equip => $value)
                  <div class="col-md-1 text-md-right mb-4">
                    <input type="checkbox" class="form-control" name="equipments_id[]" value="{{ $value->id }}" <?php foreach($equipments_list as $id => $list){if($list->equipments_id == $value->id){ echo 'checked'; }} ?>>
                  </div>
                  <label class="col-md-2 col-form-label text-md-left">{{ $value->equipments_name }}</label>
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