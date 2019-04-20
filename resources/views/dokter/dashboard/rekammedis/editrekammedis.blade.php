@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Rekam Medis</li>           
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
                    <h3 class="box-title">Data Rekam Medis - Edit</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">

                      <form id="formRekamMedisEdit" class="form-horizontal" role="form" method="POST" action="{{ url('dokter/rekammedis/'.$no_redis.'/simpanedit') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="no_redis" value="{{$no_redis}}" >
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nomor Rekam Medis</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="no_redis" value="{{$no_redis}}" disabled="true">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Anamnesia </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="Anamnesia" value="{{$Anamnesia}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Pemeriksaan Fisik</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="pmrk_fisik" value="{{$pmrk_fisik}}">
                              <small class="help-block"></small>                             
                          </div>
                      </div>                      

                      <div class="form-group">
                          <label class="col-md-4 control-label">Keluhan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="keluhan" value="{{$keluhan}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Diagnosa</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="diagnosa" value="{{$diagnosa}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Therapy </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="therapy" value="{{$therapy}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Rencana Tindak Lanjut</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="rcn_tndk_lnjt" value="{{$rcn_tndk_lnjt}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Catatan Keperawatan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="cat_kprawatan" value="{{$cat_kprawatan}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Layanan Lain</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="layanan_lain" value="{{$layanan_lain}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Kode Pasien</label>
                          <div class="col-md-6">                               
                            <select class="form-control" name="kode_pasien">
                              <option value="{{$kode_pasien}}">- {{$kode_pasien}} -</option>
                               @foreach ($listdatapasien as $itempasien)
                                  <option value="{{$itempasien->kode_pasien}}">{{$itempasien->kode_pasien}}</option>
                                  @endforeach
                              </select>                              
                              <small class="help-block"></small>
                          </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-4 control-label">Kode Dokter</label>
                          <div class="col-md-6">                               
                            <select class="form-control" name="kode_dktr">
                              <option value="{{$kode_dktr}}">- {{$kode_dktr}} -</option>
                               @foreach ($listdatadokter as $itemdokter)
                                  <option value="{{$itemdokter->kode_dktr}}">{{$itemdokter->kode_dktr}}</option>
                                  @endforeach
                              </select>                              
                              <small class="help-block"></small>
                          </div>
                    </div> 

                      <div class="form-group">
                          <label class="col-md-4 control-label">Paraf/Validasi Dokter</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="paraf_vld_dktr" value="{{$paraf_vld_dktr}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              <a href="{{{ action('Dokter\RekamMedisController@index') }}}" title="Cancel">
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


