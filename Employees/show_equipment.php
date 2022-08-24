<?php

$title = "Data Equipments";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Equipment.php";
$equipmentObject = new Equipment;
// $equipmentResult = $equipmentObject->read();
// $maintenanceResult = $equipmentObject->getmaintenance();
if ($_GET) {
  if (isset($_GET['Equipment_ID'])) {
    if (is_numeric($_GET['Equipment_ID'])) {
      // check if id exists in your db
      $equipmentObject = new Equipment;
      $equipmentObject->setEquipment_ID($_GET['Equipment_ID']);
      $equipmentData = $equipmentObject->searchOnId();
          if ($equipmentData) {
            $equipmentResult = $equipmentData->fetch_all(MYSQLI_ASSOC);
            // print_r($equipmentResult);die;
          } else {
            echo "<div class='alert  text-center w-100' > No Maintenance Yet </div>";die;
          }
      } else {
          header('location:layout/errors/404.php');
          die;
      }
  } else {
      header('location:layout/errors/404.php');
      die;
  }
} else {
  header('location:layout/errors/404.php');
  die;
}
?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include_once "layout/nav.php";?>
  <!-- /.navbar -->
  <?php include_once "layout/navLeft.php";?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" data-page-length='10' data-order='[[ 1, "asc" ]]'class="table m-0 table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Maintenance ID</th>
                    <th>Equipment Name</th>
                    <th>Date</th>
                    <th>info</th>
                </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($equipmentResult as $key => $equipment):?>
                  <tr>
                    <td><?= $equipment['Maintenance_ID']?></td>
                    <td><?= $equipment['Name']?></td>
                    <td><?= $equipment['Date']?></td>
                    <td><?= $equipment['info']?></td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Maintenance ID</th>
                    <th>Equipment Name</th>
                    <th>Date</th>
                    <th>info</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src=""></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
