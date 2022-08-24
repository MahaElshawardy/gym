<?php
$title = "Data Classes Date ";
$icon = "<a href='add_classes_date.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Class_Date.php";

$classObject = new Class_Date;
$classResult = $classObject->read();
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once "layout/nav.php"; ?>
    <!-- /.navbar -->

    <?php include_once "layout/navLeft.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="example1" data-page-length='10' data-order='[[ 1, "asc" ]]' class="table m-0 table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Class Date ID </th>
                      <th>Classes Name</th>
                      <th>Trainer</th>
                      <th>Day</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Room</th>
                      <th>Round</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($classResult) : ?>
                      <?php $classes = $classResult->fetch_all(MYSQLI_ASSOC); ?>
                      <?php foreach ($classes as $key => $class) : ?>
                        <tr>
                          <td><a href="#"><?= $class['Class_Date_ID'] ?></a></td>
                          <td><?= $class['Name'] ?></td>
                          <td><?= $class['Full_Name'] ?></td>
                          <td><?= $class['Day'] ?></td>
                          <td><?= $class['Start_Time'] ?></td>
                          <td><?= $class['End_Time'] ?></td>
                          <td><?= $class['Room'] ?></td>
                          <td><?= $class['Round'] ?></td>
                          <td><a href="edit_classes_date.php?Class_Date_ID=<?= $class['Class_Date_ID'] ?>" class="btn btn-warning">Edit </a></td>
                        <td><a href="../app/get/delete_classesDate.php?Class_ID=<?= $class['Class_Date_ID'] ?>" class="btn btn-success">Delete </a></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Class Date ID </th>
                      <th>Classes Name</th>
                      <th>Trainer</th>
                      <th>Day</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Room</th>
                      <th>Round</th>
                      <th>Edit</th>
                      <th>Delete</th>
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
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>
