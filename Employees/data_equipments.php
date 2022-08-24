<?php
$title = "Data Equipments";
$icon = "<a href='add_equipment.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Equipment.php";
$equipmentObject = new Equipment;
$equipmentResult = $equipmentObject->read();
$maintenanceResult = $equipmentObject->getmaintenance();
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
                    <th>Equipment ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Arrival Date</th>
                    <th>Name Of Subblier</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Phone Number 2</th>
                    <th>Email</th>
                    <th>Show</th>
                    <th>Add Maintenance</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if($equipmentResult): ?>
                    <?php $equipments = $equipmentResult->fetch_all(MYSQLI_ASSOC);?>
                    <?php foreach ($equipments as $key => $equipment):?>
                  <tr>
                    <td><?= $equipment['Equipment_ID']?></td>
                    <td><?= $equipment['name_equipment']?></td>
                    <td><?= $equipment['Price']?></td>
                    <td><?= $equipment['ArrivalDate']?></td>
                    <td><?= $equipment['Name']?></td>
                    <td><?= $equipment['Address']?></td>
                    <td><?= $equipment['Phone_Number']?></td>
                    <td><?= $equipment['phone_Number2']?></td>
                    <td><?= $equipment['Email']?></td>
                    <td><a href="show_equipment.php?Equipment_ID=<?= $equipment['Equipment_ID']?>" class="btn btn-warning">Show</td>
                    <td><a href="add_maintenance.php?Equipment_ID=<?= $equipment['Equipment_ID']?>" class="btn btn-success">Add</td>
                  </tr>
                  <?php endforeach ?>
                  <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Equipment ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Arrival Date</th>
                    <th>Name Of Subblier</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Phone Number 2</th>
                    <th>Email</th>
                    <th>Show</th>
                    <th>Add Maintenance</th>
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
