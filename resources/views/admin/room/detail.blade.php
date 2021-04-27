@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ข้อมูลอุปกรณ์ภายในห้อง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">ข้อมูลอุปกรณ์ภายในห้อง</li>
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
              <div class="box-body">
                <div class="form-group row">
                  <label for="rooms_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_number" class="form-control" name="rooms_number" value="{{ $data->rooms_number }}" required readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_house_number" class="col-md-4 col-form-label text-md-right">เลขที่บ้าน</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_house_number" class="form-control" name="rooms_house_number" value="{{ $data->rooms_house_number }}" required readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_building" class="col-md-4 col-form-label text-md-right">อาคาร</label>

                  <div class="col-md-6">
                      <select name="rooms_building" class="form-control" disabled>
                        <option value="A" <?php if($data->rooms_building == 'A'){ echo 'selected'; } ?>>A</option>
                        <option value="B" <?php if($data->rooms_building == 'B'){ echo 'selected'; } ?>>B</option>
                        <option value="C" <?php if($data->rooms_building == 'C'){ echo 'selected'; } ?>>C</option>
                        <option value="D" <?php if($data->rooms_building == 'D'){ echo 'selected'; } ?>>D</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_standard_price" class="col-md-4 col-form-label text-md-right">ราคามาตรฐาน</label>

                  <div class="col-md-6">
                      <input type="text" id="rooms_standard_price" class="form-control" name="rooms_standard_price" OnKeyPress="return chkNumber(this)" value="{{ $data->rooms_standard_price }}" required disabled>
                  </div>
                </div>

                <div class="form-group row">
                @foreach($equipment as $equip => $value)
                  <div class="col-md-1 text-md-right mb-4">
                    <input type="checkbox" class="form-control" name="equipments_id[]" value="{{ $value->id }}" <?php foreach($equipments_list as $id => $list){if($list->equipments_id == $value->id){ echo 'checked'; }} ?> disabled>
                  </div>
                  <label class="col-md-2 col-form-label text-md-left">{{ $value->equipments_name }}</label>
                @endforeach
                </div>
              </div>
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