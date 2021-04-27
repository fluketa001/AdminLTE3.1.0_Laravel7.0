@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">บันทึกค่าเช่า</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">บันทึกค่าเช่า</li>
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
            <form method="POST" action="{{ route('rent-store') }}" enctype="multipart/form-data">
              <div class="box-body">
                @csrf
                <input type="hidden" name="residents_id" id="residents_id" value="" required>

                <div class="form-group row">
                  <label for="rooms_number" class="col-md-4 col-form-label text-md-right">เลขห้อง</label>

                  <div class="col-md-6">
                      <select name="rooms_id" class="form-control" id="rooms_id" onchange="roomChange(this);" required>
                        @foreach($data as $room)
                          <option value="{{ $room->rooms_id }}">{{ $room->rooms_number }} | {{ $room->rooms_house_number }}</option>
                        @endforeach
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_name" class="col-md-4 col-form-label text-md-right">ชื่อ - นามสกุล</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_name" class="form-control" name="residents_name" required readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_telephone" class="col-md-4 col-form-label text-md-right">เบอร์โทรศัพท์</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_telephone" class="form-control" name="residents_telephone" OnKeyPress="return chkNumber(this)" required readonly>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="residents_rent_price" class="col-md-4 col-form-label text-md-right">ค่าเช่า/เดือน</label>

                  <div class="col-md-6">
                      <input type="text" id="residents_rent_price" class="form-control" name="residents_rent_price" OnKeyPress="return chkNumber(this)" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="month_type" class="col-md-4 col-form-label text-md-right">เลือกเดือน</label>

                  <div class="col-md-2">
                    <input type="radio" class="form-control" name="month_type" value="1" style="display:inline-block;width:30px;height:20px;" onchange="handleChange(this);" checked>
                    <label class="col-form-label">เดือนเดียว</label>
                  </div>

                  <div class="col-md-2">
                    <input type="radio" class="form-control" name="month_type" value="2" style="display:inline-block;width:30px;height:20px;" onchange="handleChange(this);">
                    <label class="col-form-label">หลายเดือน</label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rents_month" class="col-md-4 col-form-label text-md-right">เดือน</label>

                  <div class="col-md-6">
                    <input type="month" id="rents_month" name="rents_month" class="form-control" value="<?php echo date('Y-m'); ?>" onchange="monthChange(this);" required>
                  </div>
                </div>

                <div class="form-group row" id="month_end" style="display:none;">
                  <label for="rents_month_end" class="col-md-4 col-form-label text-md-right">ถึง เดือน</label>

                  <div class="col-md-6">
                    <input type="month" id="rents_month_end" name="rents_month_end" class="form-control" value="<?php echo date('Y-m'); ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rents_datetime" class="col-md-4 col-form-label text-md-right">วันเวลารับค่าเช่า</label>

                  <div class="col-md-6">
                      <input type="datetime-local" id="rents_datetime" class="form-control" name="rents_datetime" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rents_payment" class="col-md-4 col-form-label text-md-right">จ่าย</label>

                  <div class="col-md-2">
                    <input type="radio" class="form-control" name="rents_payment" value="1" style="display:inline-block;width:30px;height:20px;" checked>
                    <label class="col-form-label">เต็มเดือน</label>
                  </div>

                  <div class="col-md-2">
                    <input type="radio" class="form-control" name="rents_payment" value="2" id="half_payment" style="display:inline-block;width:30px;height:20px;">
                    <label class="col-form-label">ครึ่งเดือน</label>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="rents_slip" class="col-md-4 col-form-label text-md-right">แนบสลิปจ่ายเงิน</label>

                  <div class="col-md-6">
                    <input type="file" id="rents_slip" name="rents_slip" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="users_name" class="col-md-4 col-form-label text-md-right">ผู้บันทึก</label>

                  <div class="col-md-6">
                      <input type="text" id="users_name" class="form-control" name="users_name" value="{{ auth('user')->user()->users_name }}" required readonly>
                  </div>
                </div>

                <br>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-3" style="text-align:center;">
                    <button class="btn btn-success" type="submit" style="margin-right:20px;">
                      <i class="fas fa-check-circle"></i> บันทึก
                    </button>
                    <a href="{{ route('rents') }}">
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
    $(document).ready( function () {
      index = $("#rooms_id")[0].selectedIndex
      // console.log($("#rooms_id")[0].selectedIndex)
      var data = JSON.parse('<?php echo $data; ?>')
      if(data){
        //residents_id
        document.getElementById("residents_id").value = data[index].id;
        //residents_name
        document.getElementById("residents_name").value = data[index].residents_name;
        //residents_telephone
        document.getElementById("residents_telephone").value = data[index].residents_telephone;
        //residents_rent_price
        document.getElementById("residents_rent_price").value = data[index].residents_rent_price;
      }
      room = document.getElementById('rooms_id')
      roomChange(room)

    });
    $(document).on('change', '#rooms_id', function(){
      index = $("#rooms_id")[0].selectedIndex
      // console.log($("#rooms_id")[0].selectedIndex)
      var data = JSON.parse('<?php echo $data; ?>')
      // console.log(data)

      //residents_id
      document.getElementById("residents_id").value = data[index].id;
        // console.log(document.getElementById("residents_id").value)
      //residents_name
      document.getElementById("residents_name").value = data[index].residents_name;
      //residents_telephone
      document.getElementById("residents_telephone").value = data[index].residents_telephone;
      //residents_rent_price
      document.getElementById("residents_rent_price").value = data[index].residents_rent_price;
    })

    function handleChange(src) {
      // alert(src.value);
      month = document.getElementById('month_end')
      half = document.getElementById('half_payment')
      if(src.value == '1'){
        half.removeAttribute('disabled')
        month.setAttribute('style','display:none;')
      }else if(src.value == '2'){
        half.setAttribute('disabled','true')
        month.removeAttribute('style')
        rents_month = document.getElementById('rents_month')
        monthChange(rents_month)
      }
    }

    function monthChange(val) {
      // alert(val.value)
      month_type = $('input[name=month_type]:checked').val()
      if(month_type == '2'){
        month_end = document.getElementById('rents_month_end')
        month = val.value.substring(5,7)
        year = val.value.substring(0,4)
        if(month == '12'){
          month = 0
          year = (parseInt(year)+1)
        }
        month = ('0' + (parseInt(month)+1)).slice(-2)
        month_end.setAttribute('min',year+'-'+month)
        month_end.value = year+'-'+month
      }
    }

    function roomChange(val) {
      // alert(val.value)
      $.ajax({
          url: '{{ route("room-month") }}',
          type: 'post',
          data: {id:val.value},
          success: function(response){ 
              // console.log(response)
              data = response.month
              rents_month = document.getElementById('rents_month')
              if(data){
                year_month = data.rents_month_end;
                year = year_month.substring(0,4)
                month =  year_month.substring(5,7)
                if(month == '12'){
                  month = 0
                  year = (parseInt(year)+1)
                }
                month = ('0' + (parseInt(month)+1)).slice(-2)
                // console.log(year)
                rents_month.setAttribute('min',year+'-'+month)
                rents_month.value = year+'-'+month
              }else{
                var d = new Date()
                year = d.getFullYear();
                month = d.getMonth();
                month = ('0' + (parseInt(month)+1)).slice(-2)
                rents_month.removeAttribute('min')
                rents_month.value = year+'-'+month
                // console.log(month)
              }
          }
      });
    }
  </script>
@endsection