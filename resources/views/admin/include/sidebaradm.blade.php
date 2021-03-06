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
            <li class="header"> <font color = "white"><b>MAIN NAVIGATION --> ADMIN </b> </font> </li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/') }}"><i class='fa fa-link'></i> <span>Dashboard</span></a></li>

            <!-- Menu Admin-->
            <!-- Pilihan, untuk menampilkan menu yang dapat digunakan oleh 3 jenis pengguna, yaitu admin, dokter, dan pimpinan -->
            <li class="active"><a href="{{ url('admin/pasien') }}"><i class='fa fa-file-text'></i> <span>Data Pasien</span></a></li>
            <li class="active"><a href="{{ url('admin/dokter') }}"><i class='fa fa-file-text'></i> <span>Data Dokter</span></a></li>


        </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
