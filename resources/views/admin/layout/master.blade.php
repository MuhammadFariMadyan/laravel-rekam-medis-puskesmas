<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>REDIS | Dashboard</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{URL::asset('admin/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet"  type="text/css">
    <link href="{{URL::asset('admin/bootstrap/css/font-awesome.min.css')}}"  rel="stylesheet"  type="text/css" >
    <link href="{{URL::asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet"  type="text/css" >
    <link href="{{URL::asset('admin/dist/css/AdminLTE.min.css')}}" rel="stylesheet"  type="text/css" >
    <link href="{{URL::asset('admin/dist/css/skins/_all-skins.min.css')}}"  rel="stylesheet" >
    <link href="{{URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('auth/images/logo.ico') }}" rel="SHORTCUT ICON" />
    <link href="{{URL::asset('admin/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/select2/select2.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('admin/plugins/datepicker/datepicker3.css') }}" type="text/css">
    <!-- bikin script base_url untuk dipanggil dari javascript -->
    <meta name="base_url" content="{{ URL::to('/') }}">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('admin.include.header')
      
      @if(Auth::user()->level==11)
        @include('admin.include.sidebaradm')
      @elseif(Auth::user()->level==12)
        @include('admin.include.sidebardktr')
      @elseif(Auth::user()->level==13)
        @include('admin.include.sidebarpmpn')
      @elseif(Auth::user()->level==14)
        @include('admin.include.sidebartkns')
      @endif
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          @yield('breadcrump')
        </section>

          
        <!-- Main content -->
        <section class="content">
          @include('_partial.flash_message')
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
    @include('admin.include.footer')
    
    <script src="{{ URL::asset('admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>    
    <script src="{{ URL::asset('admin/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
      
    @yield('script')

<!-- <script src="{{ URL::asset('admin/bootstrap/js/modal.js') }}"></script> -->
<!--  <script>
  $.widget.bridge('uibutton', $.ui.button);
</script> -->
    
    
<script src="{{ URL::asset('admin/plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/morris/morris.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>   
<script src="{{ URL::asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/knob/jquery.knob.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<script src="{{ URL::asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>
<script src="{{ URL::asset('admin/dist/js/app.min.js') }}"></script>
<script src="{{ URL::asset('admin/dist/js/pages/dashboard.js') }}"></script> 
<script src="{{ URL::asset('admin/plugins/highcharts/highcharts.js') }}"></script>
 <!--    jQuery 2.1.4
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
 <script>
   $.widget.bridge('uibutton', $.ui.button);
 </script>
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/raphael/raphael-min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/morris/morris.min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/moment/moment.min.js') }}"></script>
  Bootstrap WYSIHTML5
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"src=""></script>
 
 jQuery Knob Chart
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/knob/jquery.knob.js') }}" ></script>
 Bootstrap 3.3.5
 <script type="text/javascript" src="{{ URL::asset('admin/bootstrap/js/bootstrap.min.js') }}"></script>
 FastClick
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/fastclick/fastclick.min.js') }}"></script>
 AdminLTE App
 <script type="text/javascript" src="{{ URL::asset('admin/dist/js/app.min.js') }}"></script>
 Sparkline
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
 jvectormap
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
 SlimScroll 1.3.0
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
 ChartJS 1.0.1
 <script type="text/javascript" src="{{ URL::asset('admin/plugins/chartjs/Chart.min.js') }}"></script>
 AdminLTE dashboard demo (This is only for demo purposes)
 <script type="text/javascript" src="{{ URL::asset('admin/dist/js/pages/dashboard.js') }}"></script>
 AdminLTE for demo purposes
 <script type="text/javascript" src="{{ URL::asset('admin/dist/js/demo.js') }}"></script> -->
  </body>
</html>
