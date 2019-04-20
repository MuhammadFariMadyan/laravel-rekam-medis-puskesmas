@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Pasien</li>
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
                    <h3 class="box-title">Data Dokter - Edit</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body no-padding">                         
                       <form id="formDokterEdit" class="form-horizontal" role="form" method="POST" action="{{ url('admin/dokter/'.$kode_dktr.'/simpanedit') }}">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="kode_dktr" value="{{$kode_dktr}}" >
                      
                      <div class="form-group">
                          <label class="col-md-4 control-label">Kode Dokter</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="kode_dokter_show" value="{{$kode_dktr}}" disabled="true">
                              <small class="help-block"></small>
                          </div>
                      </div>
   
                      <div class="form-group">
                          <label class="col-md-4 control-label">Nama </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="nama_dktr" value="{{$nama_dktr}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Alamat </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="alamat_dktr" value="{{$alamat_dktr}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Tanggal Lahir </label>
                          <div class="col-md-6">
                            {!! Form::date('tgl_lahir_dktr', $tgl_lahir_dktr, ['class' => 'form-control', 'placeholder' => 'Masukkan Tanggal Lahir']) !!}                              
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="col-md-4 control-label">Agama</label>
                          <div class="col-md-6">                               
                            <select class="form-control" name="agama_dktr">
                              <option value="{{$agama_dktr}}">- {{$agama_dktr}} -</option>
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Khatolik">Khatolik</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Budha">Budha</option>
                              <option value="Lainnya">Lainnya</option>
                            </select>  
                          </div>
                    </div> 

                      <div class="form-group">
                          <label class="col-md-4 control-label">Pendidikan Terakhir </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="pend_trkhr_dktr" value="{{$pend_trkhr_dktr}}">
                              <small class="help-block"></small>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-4 control-label">Telp </label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="telp_dktr" value="{{$telp_dktr}}">
                              <small class="help-block"></small>
                          </div>
                      </div>
   
                      <div class="form-group">
                          <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary" id="button-reg">
                                  Simpan
                              </button>

                              <a href="{{{ action('Admin\DokterController@index') }}}" title="Cancel">
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


