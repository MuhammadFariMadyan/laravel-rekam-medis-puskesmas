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
                  <h3 class="box-title">Cetak Laporan Rekam Medis
                  </h3>
                </div><!-- /.box-header -->


                <form id="formLaporanRedis" class="form-horizontal" role="form" method="POST" action="{{ route('pimpinan.laporan_rekammedis.cetak',['kdPrint' => 233]) }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body col-md-12" align="left" >
                    <div class="col-md-4">
                     <div class="input-daterange input-group" id="date-range">
                      <input type="text" class="form-control datepicker" name="tgl_awal">
                        <span class="input-group-addon bg-custom text-white b-0">to</span>
                        <input type="text" class="form-control datepicker" name="tgl_akhir">
                     </div>
                    </div>
                   <div class="col-md-4">
                    <button type="submit" class="btn btn-primary" id="button-reg"><i class="fa fa-print" ></i>
                                  Cetak
                    </button>
                   </div>
                  </div>
                </form>

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

