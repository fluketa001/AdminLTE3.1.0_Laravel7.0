
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin-home') }}" class="brand-link">
      <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Serenity Rent</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth('user')->user()->users_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin-home') }}" class="nav-link" id="DashboardActive">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>ภาพรวม</p>
                </a>
            </li>
            <!-- <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v1</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index2.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v2</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dashboard v3</p>
                    </a>
                </li>
                </ul>
            </li> -->
            @if(auth('user')->user()->users_status == '0' || auth('user')->user()->users_status == '1')
            <li class="nav-header">บันทึก</li>
            <li class="nav-item">
                <a href="{{ route('rents') }}" class="nav-link" id="RentChildActive">
                    <i class="nav-icon fas fa-money-bill-alt"></i>
                    <p>
                        รับค่าเช่า
                    </p>
                </a>
            </li>
            @endif

            @if(auth('user')->user()->users_status == '0')
            <li class="nav-item">
                <a href="{{ route('lists') }}" class="nav-link" id="ListDeleteChildActive">
                    <i class="nav-icon fas fa-trash-alt"></i>
                    <p>
                        รายการที่แจ้งลบ
                    </p>
                    <span class="badge badge-info right" id="list_delete"></span>
                </a>
            </li>
            @endif


            <li class="nav-header">รายงาน</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        สถานะห้องเช่า
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ChildActive">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ห้องระหว่างสัญญา</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ChildActive">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ห้องใกล้หมดสัญญา</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ChildActive">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ห้องว่าง</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        สถานะการเงิน
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ChildActive">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ค้าง</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ChildActive">
                            <i class="far fa-circle nav-icon"></i>
                            <p>ไม่ค้าง</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ChildActive">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>ทั้งหมด</p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>ห้องที่อยู่ในสัญญา</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-dot-circle nav-icon"></i>
                                    <p>ห้องว่าง</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- <li class="nav-item">
                <a href="#" class="nav-link" id="HistoryCustomerChildActive">
                    <i class="nav-icon fas fa-file"></i>
                    <p>สถานะห้องเช่า</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" id="DailyChildActive">
                    <i class="nav-icon fas fa-file"></i>
                    <p>สรุปยอดรายวัน</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" id="SummaryChildActive">
                    <i class="nav-icon fas fa-file"></i>
                    <p>สรุปยอดรวม</p>
                </a>
            </li> -->

            <li class="nav-header">ตั้งค่า</li>
            @if(auth('user')->user()->users_status == '0')
            <li class="nav-item">
                <a href="{{ route('users') }}" class="nav-link" id="UserChildActive">
                    <i class="nav-icon far fa-id-card"></i>
                    <p>
                        ข้อมูลผู้ดูแลระบบ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('config-points') }}" class="nav-link" id="ConfigPointChildActive">
                    <i class="nav-icon fas fa-coins"></i>
                    <p>
                        ตั้งค่าแต้ม
                    </p>
                </a>
            </li>
            @endif
            @if(auth('user')->user()->users_status == '0' || auth('user')->user()->users_status == '1')
            <li class="nav-item">
                <a href="{{ route('equipments') }}" class="nav-link" id="EquipmentChildActive">
                    <i class="nav-icon fas fa-tv"></i>
                    <p>
                        ข้อมูลอุปกรณ์ภายในห้อง
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('rooms') }}" class="nav-link" id="RoomChildActive">
                    <i class="nav-icon fas fa-hotel"></i>
                    <p>
                        ข้อมูลห้องพัก
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('residents') }}" class="nav-link" id="ResidentChildActive">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        ข้อมูลผู้พักอาศัย
                    </p>
                </a>
            </li>
            @endif
            
            <li class="nav-header"></li>
            <li class="nav-item">
                <a href="{{ route('admin-auth-logout') }}" class="nav-link"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                    <p>ออกจากระบบ</p>
                </a>
                <form id="logout-form" action="{{ route('admin-auth-logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<script>
  $(document).ready(function(){
	  
	var pathname = window.location.pathname.split('/');
      pathname = '/'+pathname[1];
    //   console.log(pathname);
	  
      if(pathname == '/home'){
          $('#DashboardActive').addClass('nav-link active');
      } 
      if(pathname == '/users'){
          $('#UserChildActive').addClass('nav-link active');
      }else if(pathname == '/user-add'){
          $('#UserChildActive').addClass('nav-link active');
      }else if(pathname == '/user-edit'){
          $('#UserChildActive').addClass('nav-link active');
      }
      if(pathname == '/config-points'){
          $('#ConfigPointChildActive').addClass('nav-link active');
      }else if(pathname == '/config-edit'){
          $('#ConfigPointChildActive').addClass('nav-link active');
      }
      if(pathname == '/equipments'){
          $('#EquipmentChildActive').addClass('nav-link active');
      }else if(pathname == '/equipment-add'){
          $('#EquipmentChildActive').addClass('nav-link active');
      }else if(pathname == '/equipment-edit'){
          $('#EquipmentChildActive').addClass('nav-link active');
      }
      if(pathname == '/rooms'){
          $('#RoomChildActive').addClass('nav-link active');
      }else if(pathname == '/room-add'){
          $('#RoomChildActive').addClass('nav-link active');
      }else if(pathname == '/room-edit'){
          $('#RoomChildActive').addClass('nav-link active');
      }
      if(pathname == '/residents'){
          $('#ResidentChildActive').addClass('nav-link active');
      }else if(pathname == '/resident-add'){
          $('#ResidentChildActive').addClass('nav-link active');
      }else if(pathname == '/resident-edit'){
          $('#ResidentChildActive').addClass('nav-link active');
      }
      if(pathname == '/rents'){
          $('#RentChildActive').addClass('nav-link active');
      }else if(pathname == '/rent-add'){
          $('#RentChildActive').addClass('nav-link active');
      }else if(pathname == '/rent-edit'){
          $('#RentChildActive').addClass('nav-link active');
      }
      if(pathname == '/lists'){
          $('#ListDeleteChildActive').addClass('nav-link active');
      }

      listDelete();
      setInterval(function(){ listDelete(); }, 5000);
      
  });

  function listDelete(){
        // AJAX request
        $.ajax({
            url: '{{ route("list-num") }}',
            type: 'get',
            data: '',
            success: function(response){ 
                // console.log(response)
                document.getElementById('list_delete').innerHTML = response.num;
            }
        });
    }
</script>