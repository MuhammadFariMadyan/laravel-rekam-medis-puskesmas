@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Dokter</li>
           
          </ol>
@stop
@section('content')
          <h3> Data Dokter di UPT. Puskesmas Talang Padang </h3>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Tambah Dokter <a href="{{{ URL::to('teknisi/tambahdokter') }}}" class="btn btn-success btn-flat btn-sm" id="tambahDokter" title="Tambah"><i class="fa fa-plus"></i></a></h3>
                </div><!-- /.box-header -->
                
                <div class="box-body">
                  <table id="dataTabelDokter" class="table table-bordered table-hover">
                    <thead>
                      <tr> 
                        <th>Kode Dokter</th>                                         
                        <th>Nama Dokter</th>                                               
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Telpon</th>                          
                        
                        <th>Aksi</th>

                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach ($dokter as $dataDokter):  ?>
                      <tr>
                        <td>{{$dataDokter->kode_dktr}}</td>
                        <td>{{$dataDokter->nama_dktr}}</td>
                        <td>{{$dataDokter->alamat_dktr}}</td>
                        <td>{{$dataDokter->tgl_lahir_dktr}}</td>                                               
                        <td>{{$dataDokter->agama_dktr}}</td>
                        <td>{{$dataDokter->pend_trkhr_dktr}}</td>
                        <td>{{$dataDokter->telp_dktr}}</td>                                                                    
                        <td><a href="{{{ URL::to('teknisi/dokter/'.$dataDokter->kode_dktr.'/edit') }}}">
                              <span class="label label-warning" ><i class="fa fa-edit" >&nbsp;&nbsp; Edit &nbsp;&nbsp;</i></span>
                              </a> 
                          <a href="{{{ action('Teknisi\DokterController@hapus',[$dataDokter->kode_dktr]) }}}" title="hapus"   onclick="return confirm('Apakah anda yakin akan menghapus Dokter {{{($dataDokter->kode_dktr).' - '.$dataDokter->nama_dktr }}}?')">
                              <span class="label label-danger"><i class="fa fa-trash">&nbsp;&nbsp; Delete &nbsp;&nbsp; </i></span>
                              </a>                          
                          </td>                              
                      </tr>
                      <?php endforeach  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Kode Dokter</th>                                         
                        <th>Nama Dokter</th>                                               
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Pendidikan Terakhir</th>
                        <th>Telpon</th> 
                        
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

        $('#dataTabelDokter').DataTable({"pageLength": 10, "scrollX": true});

      });

    </script>

@endsection

