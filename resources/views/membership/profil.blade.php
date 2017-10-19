@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Profil</div>

                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="">Nama Member</label>
                        <input type="text" name="" value="{{ $data->name }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="" value="{{ $data->email }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Terdaftar</label>
                        <input type="text" name="" value="{{ $data->created_at }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                      <a href="{{url('/membership')}}" class="btn btn-default btn-flat">Back</a>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
