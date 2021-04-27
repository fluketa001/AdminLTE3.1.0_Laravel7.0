@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">รายการที่แจ้งลบ</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">รายการที่แจ้งลบ</li>
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
        </div>
        <div class="row">
            <div class="table-responsive table--no-card m-b-40">
                <table id="list-table" class="table table-borderless table-striped table-earning" style="width:100%">
                    <thead>
                        <tr>
                            <!-- <th>สลิปจ่ายเงิน</th> -->
                            <th>เดือน</th>
                            <th>เลขห้อง</th>
                            <th>ชื่อ-สกุล</th>
                            <th>ค่าเช่า/เดือน</th>
                            <th>วันเวลารับค่าเช่า</th>
                            <th>ผู้แจ้งลบ</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <!-- <td align="center"><img src="{{ asset('slip/'.$list->lists_slip) }}" style="width:100px;"></td> -->
                            <td align="center">
                                <?php 
                                    if(date('m', strtotime($list->rents_month)) == '01' ){
                                        echo 'มกราคม';
                                    }else if(date('m', strtotime($list->rents_month)) == '02' ){
                                        echo 'กุมภาพันธ์';
                                    }else if(date('m', strtotime($list->rents_month)) == '03' ){
                                        echo 'มีนาคม';
                                    }else if(date('m', strtotime($list->rents_month)) == '04' ){
                                        echo 'เมษายน';
                                    }else if(date('m', strtotime($list->rents_month)) == '05' ){
                                        echo 'พฤษภาคม';
                                    }else if(date('m', strtotime($list->rents_month)) == '06' ){
                                        echo 'มิถุนายน';
                                    }else if(date('m', strtotime($list->rents_month)) == '07' ){
                                        echo 'กรกฎาคม';
                                    }else if(date('m', strtotime($list->rents_month)) == '08' ){
                                        echo 'สิงหาคม';
                                    }else if(date('m', strtotime($list->rents_month)) == '09' ){
                                        echo 'กันยายน';
                                    }else if(date('m', strtotime($list->rents_month)) == '10' ){
                                        echo 'ตุลาคม';
                                    }else if(date('m', strtotime($list->rents_month)) == '11' ){
                                        echo 'พฤศจิกายน';
                                    }else if(date('m', strtotime($list->rents_month)) == '12' ){
                                        echo 'ธันวาคม';
                                    }
                                ?>
                                {{ date('Y', strtotime($list->rents_month))+543  }}
                            </td>
                            <td align="center">{{ $list->rooms_number }} | {{ $list->rooms_house_number }}</td>
                            <td align="center">{{ $list->residents_name }}</td>
                            <td align="center">{{ number_format($list->residents_rent_price,2) }}</td>
                            <td align="center">{{ $list->rents_datetime }}</td>
                            <td align="center">{{ $list->users_name }}</td>
                            <td align="center">
                              <button class="btn btn-danger" onclick="Delete({{$list->id}});">อนุมัติลบ</button> 
                                |
                              <button class="btn btn-success" onclick="Cancel({{$list->id}});">ไม่อนุมัติ</button> 
                            </td>
                            <form id="delete-form{{$list->id}}" action="{{ route('list-delete', $list->id) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <form id="cancel-form{{$list->id}}" action="{{ route('list-cancel', $list->id) }}" method="POST" style="display: none;">
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
        $('#list-table').DataTable({
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
                    "order": [[ 0, "DESC" ]],
                    "deferRender" : true,
                    "autoWidth": false,
                });

        $("#search").on('keyup', function() {
            $('#list-table').DataTable().search(
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

    function Cancel(data){
        // var $form =  $(this).closest("delete-form");
        event.preventDefault();
        swal({   title: "คุณต้องการจะยกเลิกลบข้อมูลนี้!",
        text: "คุณแน่ใจที่จะยกเลิก?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "ไม่ยกเลิก!",
        confirmButtonText: "ยืนยันยกเลิก!",
        closeOnConfirm: false,
        closeOnCancel: false },
        function(isConfirm){
            if (isConfirm)
            {
                document.getElementById('cancel-form'+data).submit();
                // $form.submit();
            }else{
                swal("", "ข้อมูลไม่ถูกยกเลิก!", "error");
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