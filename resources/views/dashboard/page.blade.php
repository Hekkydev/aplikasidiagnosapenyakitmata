@extends('index')
@section('content')


<!-- Info boxes -->
     <div class="row" style="margin-top:50px;">
       <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
           <span class="info-box-icon bg-blue"><i class="ion ion-ios-gear-outline"></i></span>

           <div class="info-box-content">
             <span class="info-box-text">Pasien</span>
             <span class="info-box-number">{{ $data['pasien']}}</span>
           </div>
           <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="{{ url('backend/gejala')}}">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-stethoscope"></i></span>
 
            <div class="info-box-content">
              <span class="info-box-text">Daftar Gejala</span>
              <span class="info-box-number">{{ $data['gejala']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
       </div>
       <!-- /.col -->

       <!-- fix for small devices only -->
       <div class="clearfix visible-sm-block"></div>

       <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{ url('backend/penyakit')}}">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-hospital-o"></i></span>
 
            <div class="info-box-content">
              <span class="info-box-text">Daftar Penyakit</span>
              <span class="info-box-number">{{ $data['penyakit']}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </a>
       </div>
       <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="{{ url('backend/account')}}">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>
 
            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{ $data['users'] }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
         </a>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->

@stop
