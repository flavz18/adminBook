@extends('dashboard.layouts.main')
@section('container')
    <!--Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="col-sm-12">
             <h1 class="m-0">Selamat Datang -{{ auth()->user()->name }}</h1>
             <!-- Main content -->
             <nav class="mt-4">
 <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h4 style="text-align: center">Data Buku</h4>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/dashboard/buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h4 style="text-align: center" >Kategori</h4>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/dashboard/kategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
        </div><!--/.col -->
    </div><!--/.container-fluid -->
</div><!--/.content-header -->
@endsection