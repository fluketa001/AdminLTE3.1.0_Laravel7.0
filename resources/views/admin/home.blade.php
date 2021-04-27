@extends('admin.layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <p style="margin-bottom:0;">TODAY'S BANK IN</p>
                        <h3 id="deposit">0</h3>
                    </div>
                    <div class="icon">
                        <i class="fab fa-btc"></i>
                    </div>
                    <hr>
                    <div class="col-lg-12" style="display: flex;">
                        <div class="col-lg-7">
                            <p style="margin-bottom:0;">YESTERDAY</p>
                            <label id="yesterday_deposit">0</label>
                        </div>
                        <div class="col-lg-5">
                            <p style="margin-bottom:0;">THIS WEEK</p>
                            <label id="week_deposit">0</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <p style="margin-bottom:0;">TODAY'S BANK OUT</p>
                        <h3 id="withdraw">0</h3>
                    </div>
                    <div class="icon">
                        <i class="far fa-money-bill-alt"></i>
                    </div>
                    <hr>
                    <div class="col-lg-12" style="display: flex;">
                        <div class="col-lg-7">
                            <p style="margin-bottom:0;">YESTERDAY</p>
                            <label id="yesterday_withdraw">0</label>
                        </div>
                        <div class="col-lg-5">
                            <p style="margin-bottom:0;">THIS WEEK</p>
                            <label id="week_withdraw">0</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-yellow" style="color: white!important;">
                    <div class="inner">
                        <p style="margin-bottom:0;">TODAY'S INCOME</p>
                        <h3 id="income">0</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard"></i>
                    </div>
                    <hr>
                    <div class="col-lg-12" style="display: flex;">
                        <div class="col-lg-7">
                            <p style="margin-bottom:0;">YESTERDAY</p>
                            <label id="yesterday_income">0</label>
                        </div>
                        <div class="col-lg-5">
                            <p style="margin-bottom:0;">THIS WEEK</p>
                            <label id="week_income">0</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <p style="margin-bottom:0;">MEMBER</p>
                        <h3 id="total_customer">0</h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <hr>
                    <div class="col-lg-12" style="display: flex;">
                        <div class="col-lg-7">
                            <p style="margin-bottom:0;">NEW TODAY</p>
                            <label id="new_customer"></label>
                        </div>
                        <div class="col-lg-5">
                            <p style="margin-bottom:0;">THIS WEEK</p>
                            <label id="week_customer">0</label>
                        </div>
                    </div>
                </div>
            </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection