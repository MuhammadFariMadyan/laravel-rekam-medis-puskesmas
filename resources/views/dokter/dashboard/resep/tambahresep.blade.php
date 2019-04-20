@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Resep</li>
           
          </ol>
@stop
@section('content')
          <div class="row">
            <div class="col-md-6">
                <div class="uk-alert uk-alert-success" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>{{  isset($successMessage) ? $successMessage : '' }}</p>
                     @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box box-primary">
                  <div class="box-header">
                    <h3 class="box-title">Data Resep - Tambah</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">

                      <form id="formResepTambah" class="form-horizontal" role="form" method="POST" action="{{ url('dokter/resep/tambah') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nomor Resep </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="no_resep" placeholder="Nomor Resep">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Resep </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="resep" placeholder="Resep">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Tanggal Resep </label>
                          <div class="col-md-6">
                            {!! Form::date('tgl_resep', null, ['class' => 'form-control', 'placeholder' => 'Masukkan Tanggal Lahir']) !!}                              
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Nomor Rekam Medis</label>
                          <div class="col-md-6">                               
                            <select class="form-control" name="no_redis">
                               @foreach ($listresep as $itemresep)
                                  <option value="{{$itemresep->no_redis}}">{{$itemresep->no_redis}}</option>
                                  @endforeach
                              </select>                              
                              <small class="help-block"></small>
                          </div>
                    </div> 
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              <a href="{{{ action('Dokter\ResepController@index') }}}" title="Cancel">
                              <span class="btn btn-default"><i class="fa fa-back"> Cancel </i></span>
                              </a>  
                          </div>
                      </div>
                      </form>   

                  </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
          </div><!-- /.row (main row) -->
                        
@endsection


