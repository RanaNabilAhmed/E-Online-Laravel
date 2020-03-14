<footer class="main-footer">
    <strong>Copyright &copy; 2019  <a href="">Made by Rana Nabil</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="{{URL::to('')}}/public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- bs-custom-file-input -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- page script -->
<!-- AdminLTE App -->
<script src="{{URL::to('')}}/public/assets/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

<!-- jQuery UI 1.11.4 -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{URL::to('')}}/public/assets/backend/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/moment/moment.min.js"></script>
<script src="{{URL::to('')}}/public/assets/backend/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{URL::to('')}}/public/assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{URL::to('')}}/public/assets/backend/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{URL::to('')}}/public/assets/backend/dist/js/pages/dashboard.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
	{{-- or jb link add krliya to ye kaam is liye kiya k jo message show ho wo is trha ho  --}}
	$(document).ready(function(){
		$(".alert").delay(2000).slideToggle(200);
	})
	

</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
