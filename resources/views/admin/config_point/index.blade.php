@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ตั้งค่าแต้ม</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Home</a></li>
              <li class="breadcrumb-item active">ตั้งค่าแต้ม</li>
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
            <div class="table-responsive table--no-card m-b-40">
                <table id="point-table" class="table table-borderless table-striped table-earning" style="width:100%">
                    <thead>
                        <tr>
                            <th>แต้มใช้แลก(แต้ม/บาท)</th>
                            <th>อัตราได้รับแต้ม(บาท/แต้ม)</th>
                            <th>กำหนดหมดอายุแต้ม</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $point)
                        <tr>
                            <td align="center">{{ $point->config_points_price }}</td>
                            <td align="center">{{ $point->config_points_rate_change }}</td>
                            <td align="center">{{ $point->config_points_expire }} วัน</td>
                            <td align="center">
                              <a href="{{ route('config-point-edit', $point->id) }}">
                                <button class="btn btn-info">Edit</button>
                              </a> 
                            </td>
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
        $('#point-table').DataTable({
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
            $('#point-table').DataTable().search(
                $('#search').val()
            ).draw();
        });
    } );
  </script>
@endsection