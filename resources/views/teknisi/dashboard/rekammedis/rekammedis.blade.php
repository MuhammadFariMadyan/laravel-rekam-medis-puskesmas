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
          <h3> Data Rekam Medis di UPT. Puskesmas Talang Padang </h3>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">                
                <div class="box-header" >
                  <h3 class="box-title">Tambah Data Rekam Medis <a href="{{{ URL::to('teknisi/tambahrekammedis') }}}" class="btn btn-success btn-flat btn-sm" id="tambahRekamMedis" title="Tambah"><i class="fa fa-plus"></i></a>                    
                  </h3>                                                                         
                </div><!-- /.box-header -->                 
                <div class="box-body">
                  <table id="dataTabelRekamMedis" class="table table-bordered table-hover">
                    <thead>
                      <tr> 
                        <th>Nomor Rekam Medis</th>                                         
                        <th>Anamnesia</th>                                               
                        <th>Pemeriksaan Fisik</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Therapy</th>
                        <th>Rencana Tindak Lanjut </th>                          
                        <th>Catatan Keperawatan</th>
                        <th>Layanan Lain</th>
                        <th>Kode Pasien</th>
                        <th>Kode Dokter</th>
                        <th>Paraf/Validasi Dokter</th>
                        <th>Tanggal dibuat</th>
                        <th>Tanggal diupdate</th>                        
                        <th>Aksi</th>

                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($rekammedis as $dataRekamMedis):  ?>
                      <tr>
                        <td>{{$dataRekamMedis->no_redis}}</td>
                        <td>{{$dataRekamMedis->Anamnesia}}</td>
                        <td>{{$dataRekamMedis->pmrk_fisik}}</td>
                        <td>{{$dataRekamMedis->keluhan}}</td>                                               
                        <td>{{$dataRekamMedis->diagnosa}}</td>
                        <td>{{$dataRekamMedis->therapy}}</td>
                        <td>{{$dataRekamMedis->rcn_tndk_lnjt}}</td>
                        <td>{{$dataRekamMedis->cat_kprawatan}}</td>
                        <td>{{$dataRekamMedis->layanan_lain}}</td>                                               
                        <td>{{$dataRekamMedis->kode_pasien}}</td>
                        <td>{{$dataRekamMedis->kode_dktr}}</td>
                        <td>{{$dataRekamMedis->paraf_vld_dktr}}</td>
                        <td>{{$dataRekamMedis->created_at}}</td>
                        <td>{{$dataRekamMedis->updated_at}}</td>
                        
                        <td><a href="{{{ URL::to('teknisi/rekammedis/'.$dataRekamMedis->no_redis.'/edit') }}}">
                              <span class="label label-warning" ><i class="fa fa-edit" >&nbsp;&nbsp; Edit &nbsp;&nbsp;</i></span>
                              </a> 
                            <a href="{{{ action('Teknisi\RekamMedisController@hapus',[$dataRekamMedis->no_redis]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Data Rekam Medis {{{($dataRekamMedis->no_redis).' - '.$dataRekamMedis->kode_pasien }}}?')">
                              <span class="label label-danger"><i class="fa fa-trash">&nbsp;&nbsp; Delete &nbsp;&nbsp;</i></span> 
                              </a> 
                            <a href="{{{ URL::to('teknisi/rekammedis/'.$dataRekamMedis->no_redis.'/cetak/233') }}}"><span class="label label-info"><i class="fa fa-print">&nbsp;&nbsp; Cetak &nbsp;&nbsp;</i></span>                             
                              </a>                          
                          </td>                              
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nomor Rekam Medis</th>                                         
                        <th>Anamnesia</th>                                               
                        <th>Pemeriksaan Fisik</th>
                        <th>Keluhan</th>
                        <th>Diagnosa</th>
                        <th>Therapy</th>
                        <th>Rencana Tindak Lanjut </th>                          
                        <th>Catatan Keperawatan</th>
                        <th>Layanan Lain</th>
                        <th>Kode Pasien</th>
                        <th>Kode Dokter</th>
                        <th>Paraf/Validasi Dokter</th>
                        <th>Tanggal dibuat</th>
                        <th>Tanggal diupdate</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div><!-- /.col -->
          </div><!-- /.row -->
       

@endsection
@section('script')

<script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/select2/select2.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script>
   $(document).ready(function() {
   $("select").select2();
      $('.datepicker').datepicker({
                todayBtn: "linked",
                orientation: "left",
                format: 'yyyy-mm-dd'
      });
    }); 
      $(function() {

        $('#dataTabelRekamMedis').DataTable({
          "pageLength": 10, "scrollX": true
        });
      });  
</script>
    
@endsection

