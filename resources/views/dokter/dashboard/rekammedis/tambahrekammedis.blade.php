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
                    <h3 class="box-title">Data Rekam Medis - Tambah</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">

                      <form id="formRekamMedisTambah" class="form-horizontal" role="form" method="POST" action="{{ url('dokter/rekammedis/tambah') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nomor Rekam Medis</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="no_redis" placeholder="RMx">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Anamnesia </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="Anamnesia" placeholder="Anamnesia">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Pemeriksaan Fisik</label>
                          <div class="col-md-6">
                            <input type="text" class="form-control" name="pmrk_fisik" placeholder="Pemeriksaan Fisik">
                              <small class="help-block"></small>                             
                          </div>
                      </div>                      

                      <div class="form-group">
                          <label class="col-md-4 control-label">Keluhan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="keluhan" placeholder="Keluhan">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Diagnosa</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="diagnosa" placeholder="Diagnosa">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Therapy </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="therapy" placeholder="Therapy">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Rencana Tindak Lanjut</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="rcn_tndk_lnjt" placeholder="Rencana Tindak Lanjut">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Catatan Keperawatan</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="cat_kprawatan" placeholder="Catatan Keperawatan">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Layanan Lain</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="layanan_lain" placeholder="Layanan Lain">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Kode Pasien</label>
                          <div class="col-md-6">                               
                            <select class="form-control" name="kode_pasien">
                               @foreach ($listdatapasein as $itempasien)
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
                              <input type="text" class="form-control" name="paraf_vld_dktr" placeholder="validasi dr.xxx">
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


