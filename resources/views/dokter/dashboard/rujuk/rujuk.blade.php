@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Rujuk</li>
           
          </ol>
@stop
@section('content')
          <h3> Data Rujuk di UPT. Puskesmas Talang Padang </h3>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tambah Data Rujuk <a href="{{{ URL::to('dokter/tambahrujuk') }}}" class="btn btn-success btn-flat btn-sm" id="tambahRujuk" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <table id="dataTabelRujuk" class="table table-bordered table-hover">
                    <thead>
                      <tr> 
                        <th>Nomor Surat Rujuk</th>                                         
                        <th>Tanggal Rujuk</th>                                               
                        <th>Nomor Rekam Medis</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($rujuk as $dataRujuk):  ?>
                      <tr>
                        <td>{{$dataRujuk->no_surat_rujukan}}</td>
                        <td>{{$dataRujuk->tgl_rujuk}}</td>
                        <td>{{$dataRujuk->no_redis}}</td>
                        <td>
                          <a href="{{{ URL::to('dokter/rujuk/'.$dataRujuk->no_surat_rujukan.'/edit') }}}">
                              <span class="label label-warning" ><i class="fa fa-edit" >&nbsp;&nbsp; Edit &nbsp;&nbsp;&nbsp;</i></span>
                          </a> 
                          <a href="{{{ action('Dokter\RujukController@hapus',[$dataRujuk->no_surat_rujukan]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Data Rujuk {{{($dataRujuk->no_surat_rujukan).' - '.$dataRujuk->no_redis }}}?')">
                              <span class="label label-danger"><i class="fa fa-trash">&nbsp;&nbsp; Delete &nbsp;&nbsp;</i></span>
                          </a> 
                          <a href="{{{ URL::to('dokter/rujuk/'.$dataRujuk->no_surat_rujukan.'/cetak/233') }}}">
                            <span class="label label-info"><i class="fa fa-print">&nbsp;&nbsp; Cetak &nbsp;&nbsp;&nbsp;</i></span>                             
                          </a>                            
                        </td>                              
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nomor Surat Rujuk</th>                                         
                        <th>Tanggal Rujuk</th>                                               
                        <th>Nomor Rekam Medis</th>
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
<script>
      $(function () {

        $('#dataTabelRujuk').DataTable({"pageLength": 10, "scrollX": true});

      });

    </script>

@endsection

