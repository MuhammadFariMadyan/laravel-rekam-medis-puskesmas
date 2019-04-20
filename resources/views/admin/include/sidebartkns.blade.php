      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('/img/avatar04.png')}}" class="img-circle" alt="User Image" />
                </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- Sidebar Menu Header-->
        <ul class="sidebar-menu">
            <li class="header"> <font color = "white"><b> MAIN NAVIGATION --> Teknisi </b> </font> </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class='fa fa-link'></i> <span>Dashboard</span></a></li>

            <!-- Menu Admin-->
            <li class="active"><a href="{{ url('teknisi/pasien') }}"><i class='fa fa-file-text'></i> <span>Data Pasien</span></a></li>
            <li class="active"><a href="{{ url('teknisi/dokter') }}"><i class='fa fa-file-text'></i> <span>Data Dokter</span></a></li>

            <!-- Menu Dokter-->
            <li class="active"><a href="{{ url('teknisi/rekammedis') }}"><i class='fa fa-file-text'></i> <span>Data Rekam Medis</span></a></li>
            <li class="active"><a href="{{ url('teknisi/resep') }}"><i class='fa fa-file-text'></i> <span>Data Resep</span></a></li>
            <li class="active"><a href="{{ url('teknisi/rujuk') }}"><i class='fa fa-file-text'></i> <span>Data Rujuk</span></a></li>

            <!-- Menu Pimpinan-->
            <li class="active"><a href="{{ url('teknisi/laporan_rekammedis') }}"><i class='fa fa-file-text'></i> <span>Laporan Rekam Medis</span></a></li>

        </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>