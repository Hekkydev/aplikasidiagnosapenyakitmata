@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <a href="{{ url('membership/diagnosa')}}">
        <div class="panel panel-primary">
          <div class="panel-heading">
          </div>
          <div class="panel-body" align="center">
            <h1><i class="fa fa-lg fa-stethoscope"></i></h1>
            <small> FORM DIAGNOSA</small>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3">
    <a href="{{ url('membership/hasil-diagnosa')}}">
      <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body" align="center">
          <h1><i class="fa fa-lg fa-medkit"></i></h1>
          <small> HASIL DIAGNOSA</small>
        </div>
      </div>
    </a>
    </div>

    <div class="col-md-3">
    <a href="#">
      <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body" align="center">
          <h1><i class="fa fa-lg fa-info"></i></h1>
          <small> INFORMATION</small>
        </div>
      </div>
    </a>
    </div>
    <div class="col-md-3">
    <a href="{{ url('membership/profil')}}">
      <div class="panel panel-primary">
        <div class="panel-heading">
        </div>
        <div class="panel-body" align="center">
          <h1><i class="fa fa-lg fa-user"></i></h1>
          <small> PROFIL</small>
        </div>
      </div>
    </a>
    </div>
  </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
