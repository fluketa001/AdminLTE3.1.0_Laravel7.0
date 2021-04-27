@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ข้อมูลห้องพัก</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">ข้อมูลห้องพัก</li>
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
        <div class="row">
            <div class="col-md-3">
                <div class="overview-wrap" align="left">
                    <input type="text" class="form-control empty iconified" id="search" placeholder="คำค้นหา">
                    <small class="form-text text-muted">ค้นหาข้อมูลภายในตาราง.</small>
                </div>
            </div>
            <div class="col-md-9">
                <div class="overview-wrap" style="float:right;">
                    <a href="{{ route('room-add') }}">
                        <button class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> เพิ่มข้อมูลห้องพัก
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive table--no-card m-b-40">
                <table id="room-table" class="table table-borderless table-striped table-earning" style="width:100%">
                    <thead>
                        <tr>
                            <th>เลขห้อง</th>
                            <th>เลขที่บ้าน</th>
                            <th>สัญญา</th>
                            <th>ประเภทห้อง</th>
                            <th>ขนาดห้อง</th>
                            <th>สถานะห้อง</th>
                            <th>อาคาร</th>
                            <th>ทิศ</th>
                            <th>ราคามาตรฐาน</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $room)
                        <tr>
                            <td align="center">{{ $room->rooms_number }}</td>
                            <td align="center">{{ $room->rooms_house_number }}</td>
                            <td align="center">{{ $room->rooms_contract_type }}</td>
                            <td align="center">{{ $room->rooms_type }}</td>
                            <td align="center">{{ $room->rooms_size }} ตร.ม</td>
                            <td align="center"><?php if($room->rooms_status == '0'){ echo 'ไม่ได้ปล่อยเช่า'; }else{ echo 'ปล่อยเช่า'; } ?></td>
                            <td align="center">{{ $room->rooms_building }}</td>
                            <td align="center"><?php if($room->rooms_direction == 'north'){ echo 'ทิศเหนือ'; }else if($room->rooms_direction == 'south'){ echo 'ทิศใต้'; }else if($room->rooms_direction == 'east'){ echo 'ทิศตะวันออก'; }else{ echo 'ทิศตะวันตก'; } ?></td>
                            <td align="center">{{ $room->rooms_standard_price }}</td>
                            <td align="center">
                              <a href="{{ route('room-edit', $room->id) }}">
                                <button class="btn btn-info">Edit</button>
                              </a> 
                              |
                              <button class="btn btn-danger" onclick="Delete({{$room->id}});">Delete</button> 
                              |
                              <a class="btn btn-warning" style="margin-top:5px;" href="{{ route('room-detail',$room->id) }}">
                                อุปกรณ์ในห้อง
                              </a>
                            </td>
                            <form id="delete-form{{$room->id}}" action="{{ route('room-delete', $room->id) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(document).ready( function () {
        $('#room-table').DataTable({
                    "scrollX": true,
                    "pageLength": 100,
                    fixedColumns:   {
                        heightMatch: 'none'
                    },
                    "bLengthChange": false,
                    "searching": true,
                    "language": {
                        "info": "แสดง _START_ ถึง _END_ จากทั้งหมด _TOTAL_ แถว",
                        "paginate": {
                            "previous": "<< ย้อนกลับ",
                            "next":"ถัดไป >>"
                        },
                        "emptyTable": "ไม่มีข้อมูลในตาราง",
                        "zeroRecords": "ไม่พบข้อมูลที่ค้นหา",
                        "infoEmpty": "ไม่มีรายการที่จะแสดง",
                        "infoFiltered": "(กรองจากทั้งหมด _MAX_ แถว)",
                    },
                    "order": [[ 0, "asc" ]],
                    "deferRender" : true,
                    "autoWidth": false,
                });

        $("#search").on('keyup', function() {
            $('#room-table').DataTable().search(
                $('#search').val()
            ).draw();
        });
    } );
    function Delete(data){
        // var $form =  $(this).closest("delete-form");
        event.preventDefault();
        swal({   title: "คุณต้องการจะลบข้อมูลนี้!",
        text: "คุณแน่ใจที่จะลบ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "ไม่ลบ!",
        confirmButtonText: "ยืนยันลบ!",
        closeOnConfirm: false,
        closeOnCancel: false },
        function(isConfirm){
            if (isConfirm)
            {
                document.getElementById('delete-form'+data).submit();
                // $form.submit();
            }else{
                swal("", "ข้อมูลไม่ถูกลบ!", "error");
            }
        });
    }

    function ResetPassword(data){
        // var $form =  $(this).closest("delete-form");
        event.preventDefault();
        swal({   title: "คุณต้องการที่จะรีเซตรหัสผ่าน!",
        text: "คุณแน่ใจที่จะรีเซตรหัสเป็น '1234'",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "ไม่รีเซต!",
        confirmButtonText: "ยืนยัน!",
        closeOnConfirm: false,
        closeOnCancel: false },
        function(isConfirm){
            if (isConfirm)
            {
                document.getElementById('reset-form'+data).submit();
                // $form.submit();
            }else{
                swal("", "ข้อมูลไม่ถูกลบ!", "error");
            }
        });
    }
  </script>
@endsection