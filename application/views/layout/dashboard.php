<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('layout/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php $this->load->view('layout/navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('layout/sidebar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <?php $this->load->view($page); ?>
    <!-- /.content-wrapper -->
    <?php $this->load->view('layout/footer'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php $this->load->view('layout/scriptfooter'); ?>
</body>

</html>