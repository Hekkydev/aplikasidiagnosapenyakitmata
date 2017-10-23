@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Form Diagnosa</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      <div class="row">
                         <div class="col-lg-12">
                                        <form id="rootwizard" class="form-horizontal form-wizard">
                                             <div class="wizard-navbar">
                                                  <ul>
                                                       <li class="completed"><a href="#tab1" data-toggle="tab"><span>1</span> First</a></li>
                                                       <li class="active"><a href="#tab2" data-toggle="tab"><span>2</span> Second</a></li>
                                                       <li><a href="#tab3" data-toggle="tab"><span>3</span> Third</a></li>
                                                       <li><a href="#tab4" data-toggle="tab"><span>4</span> Forth</a></li>
                                                       <li><a href="#tab5" data-toggle="tab"><span>5</span> Fifth</a></li>
                                                       <li><a href="#tab6" data-toggle="tab"><span>6</span> Sixth</a></li>
                                                       <li><a href="#tab7" data-toggle="tab"><span>7</span> Seventh</a></li>
                                                  </ul>
                                             </div>
                                             <div class="tab-content">
                                                  <div class="tab-pane" id="tab1">

                                                    apakah anda sakit burem otak?

                                                  </div>
                                                  <div class="tab-pane active" id="tab2">Step: 2</div>
                                                  <div class="tab-pane" id="tab3">Step: 3</div>
                                                  <div class="tab-pane" id="tab4">Step: 4</div>
                                                  <div class="tab-pane" id="tab5">Step: 5</div>
                                                  <div class="tab-pane" id="tab6">Step: 6</div>
                                                  <div class="tab-pane" id="tab7">Step: 7</div>
                                                  <ul class="pager wizard">
                                                       <li class="previous first"><a href="javascript:void(0)">First</a></li>
                                                       <li class="previous"><a href="javascript:void(0)"><i class="icon-left-open"></i>Previous</a></li>
                                                       <li class="next last"><a href="javascript:void(0)">Last</a> </li>
                                                       <li class="next"><a href="javascript:void(0)">Next <i class="icon-right-open"></i></a> </li>
                                                  </ul>
                                             </div>
                                        </form>
                              
                         </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
