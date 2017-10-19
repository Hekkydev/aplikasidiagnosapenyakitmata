@extends('index')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="{{ url('backend/penyakit/searchproses') }}">
                        <div class="form-group">
                            <label for="search" class="control-label col-md-2">Cari Data Penyakit</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="nama_penyakit">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
@stop