      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>LARASIA</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION MAHASISWA</li>
            
            
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Mahasiswa</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu collapse">
                <li><a href="{{{URL::to('nilai/semester')}}}"><i class="fa fa-circle-o"></i> Nilai Semester</a></li>                
                <li><a href="{{{URL::to('reset/password/mahasiswa')}}}"><i class="fa fa-circle-o"></i> Reset Password</a></li>
              </ul>
            </li>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Modal -->
      <div class="modal fade" id="myModalq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabelq">Modal title</h4>
            </div>
            <div class="modal-bodyq">
              ...
            </div>
            <div class="modal-footerq">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end of modal -->
