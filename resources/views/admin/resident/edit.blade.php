@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">แก้ไขข้อมูลผู้พักอาศัย</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">แก้ไขข้อมูลผู้พักอาศัย</li>
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
            <form method="POST" action="{{ route('resident-update') }}">
              <div class="box-body">
              @csrf
                <input type="text" name="id" value="{{ $data->id }}" hidden required>
                <div class="form-group row">
                  <label for="residents_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_id" class="form-control" id="rooms_id">
                      @foreach($rooms as $room)
                          <option value="{{ $room->id }}" <?php if($room->id == $data->rooms_id){ echo 'selected'; } ?>>{{ $room->rooms_number }} | {{ $room->rooms_house_number }}</option>
                      @endforeach
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_type" class="col-md-4 col-form-label text-md-right">ประเภทห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_type" class="form-control" id="rooms_type" disabled>
                        <option >{{ $data->rooms_type }}</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_size" class="col-md-4 col-form-label text-md-right">ขนาดห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_size" class="form-control" id="rooms_size" disabled>
                        <option >{{ $data->rooms_size }}ตร.ม</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_building" class="col-md-4 col-form-label text-md-right">อาคาร</label>

                  <div class="col-md-6">
                      <select name="rooms_building" class="form-control" id="rooms_building" disabled>
                        <option>{{ $data->rooms_building }}</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rooms_direction" class="col-md-4 col-form-label text-md-right">ทิศ</label>

                  <div class="col-md-6">
                      <select name="rooms_direction" class="form-control" id="rooms_direction" disabled>
                        <option value="{{ $data->rooms_direction }}"><?php if($data->rooms_direction == 'north'){ echo 'เหนือ'; }else if($data->rooms_direction == 'south'){ echo 'ใต้'; }else if($data->rooms_direction == 'east'){ echo 'ตะวันออก'; }else if($data->rooms_direction == 'west'){ echo 'ตะวันตก'; } ?></option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_name" class="col-md-4 col-form-label text-md-right">ชื่อ - นามสกุล</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_name" class="form-control" name="residents_name" value="{{ $data->residents_name }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_telephone" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_telephone" class="form-control" name="residents_telephone" value="{{ $data->residents_telephone }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_career" class="col-md-4 col-form-label text-md-right">อาชีพ</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_career" class="form-control" name="residents_career" value="{{ $data->residents_career }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_rent_price" class="col-md-4 col-form-label text-md-right">อัตราค่าเช่า</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_rent_price" class="form-control" name="residents_rent_price" OnKeyPress="return chkNumber(this)" value="{{ $data->residents_rent_price }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_contract_start" class="col-md-4 col-form-label text-md-right">วันเริ่มสัญญา</label>

                  <div class="col-md-6">
                      <input type="datetime-local" id="residents_contract_start" class="form-control" name="residents_contract_start" value="<?php echo date('Y-m-d\TH:i', strtotime($data->residents_contract_start)); ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_contract_end" class="col-md-4 col-form-label text-md-right">วันสิ้นสุดสัญญา</label>

                  <div class="col-md-6">
                      <input type="datetime-local" id="residents_contract_end" class="form-control" name="residents_contract_end" value="<?php echo date('Y-m-d\TH:i', strtotime($data->residents_contract_end)); ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_address" class="col-md-4 col-form-label text-md-right">ที่อยู่</label>

                  <div class="col-md-6">
                      <textarea type="text" id="residents_address" class="form-control" name="residents_address" rows="3" required>{{ $data->residents_address }}</textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_emergency" class="col-md-4 col-form-label text-md-right">เบอร์ติดต่อกรณีฉุกเฉิน</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_emergency" class="form-control" name="residents_emergency" value="{{ $data->residents_emergency }}" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_status" class="col-md-4 col-form-label text-md-right">สถานะการเช่า</label>

                  <div class="col-md-6">
                      <select name="residents_status" class="form-control">
                        <option value="1" <?php if($data->residents_status == '1'){ echo 'selected'; } ?>>กำลังเช่า</option>
                        <option value="0" <?php if($data->residents_status == '0'){ echo 'selected'; } ?>>เลิกเช่า</option>
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_note" class="col-md-4 col-form-label text-md-right">หมายเหตุ</label>

                  <div class="col-md-6">
                      <textarea type="text" id="residents_note" class="form-control" name="residents_note" rows="3">{{ $data->residents_note }}</textarea>
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
  <script>
    $(document).on('change', '#rooms_id', function(){
      index = $("#rooms_id")[0].selectedIndex
      // console.log($("#rooms_id")[0].selectedIndex)
      var data = JSON.parse('<?php echo $rooms; ?>')

      //rooms_id
      // var rooms_number = document.getElementById("rooms_id");
      // var option = document.createElement("option");
      // rooms_number.remove([0])
      // option.value = data[index].id;
      // option.text = data[index].rooms_number+' | '+data[index].rooms_house_number;
      // rooms_number.add(option);

      //rooms_type
      var rooms_type = document.getElementById("rooms_type");
      var option = document.createElement("option");
      rooms_type.remove([0])
      option.text = data[index].rooms_type;
      rooms_type.add(option);

      //rooms_size
      var rooms_size = document.getElementById("rooms_size");
      var option = document.createElement("option");
      rooms_size.remove([0])
      option.text = data[index].rooms_size;
      rooms_size.add(option);

      //rooms_building
      var rooms_building = document.getElementById("rooms_building");
      var option = document.createElement("option");
      rooms_building.remove([0])
      option.text = data[index].rooms_building;
      rooms_building.add(option);

      //rooms_direction
      var rooms_direction = document.getElementById("rooms_direction");
      var option = document.createElement("option");
      rooms_direction.remove([0])
      option.value = data[index].rooms_direction;
      if(data[index].rooms_direction == 'north'){
        text = 'เหนือ'
      }else if(data[index].rooms_direction == 'south'){
        text = 'ใต้'
      }else if(data[index].rooms_direction == 'east'){
        text = 'ตะวันออก'
      }else if(data[index].rooms_direction == 'west'){
        text = 'ตะวันตก'
      }
      option.text = text;
      rooms_direction.add(option);
      
      // console.log(data)
      // console.log(data[index].rooms_number)
      // alert('test');
        // let id = $(this).attr('data-id') // $(this) is an instance of the current select changed
        // let quantityvalue = $(this).val()
        // axios.post(`/panier/${id}`, {
        //     quantity: quantityvalue,
        //     _method: 'patch'

        // })
    })
  </script>
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