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
          <h3> Data Resep di UPT. Puskesmas Talang Padang </h3>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tambah Data Resep <a href="{{{ URL::to('teknisi/tambahresep') }}}" class="btn btn-success btn-flat btn-sm" id="tambahResep" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <table id="dataTabelResep" class="table table-bordered table-hover">
                    <thead>
                      <tr> 
                        <th>Nomor Resep</th>                                         
                        <th>Resep</th>                                               
                        <th>Tanggal Resep</th>
                        <th>Nomor Rekam Medis</th>
                        <th>Aksi</th>

                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($resep as $dataResep):  ?>
                      <tr>
                        <td>{{$dataResep->no_resep}}</td>
                        <td>{{$dataResep->resep}}</td>
                        <td>{{$dataResep->tgl_resep}}</td>
                        <td>{{$dataResep->no_redis}}</td>    
                        
                        <td><a href="{{{ URL::to('teknisi/resep/'.$dataResep->no_resep.'/edit') }}}">
                              <span class="label label-warning" ><i class="fa fa-edit" >&nbsp;&nbsp; Edit &nbsp;&nbsp;</i></span>
                              </a> 
                          <a href="{{{ action('Teknisi\ResepController@hapus',[$dataResep->no_resep]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Data Resep {{{($dataResep->no_resep).' - '.$dataResep->no_redis }}}?')">
                              <span class="label label-danger"><i class="fa fa-trash">&nbsp;&nbsp; Delete &nbsp;&nbsp;</i></span>
                              </a> 
                            <a href="{{{ URL::to('teknisi/resep/'.$dataResep->no_resep.'/cetak/233') }}}"><span class="label label-info"><i class="fa fa-print">&nbsp;&nbsp;Cetak&nbsp;&nbsp;</i></span> 
                              </a>                         
                          </td>                              
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nomor Resep</th>                                         
                        <th>Resep</th>                                               
                        <th>Tanggal Resep</th>
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

        $('#dataTabelResep').DataTable({"pageLength": 10, "scrollX": true});

      });

    </script>

@endsection

