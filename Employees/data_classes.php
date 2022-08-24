<?php
$title = "Data Classes";
$icon = "<a href='add_classes.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Classe.php";

$classObject = new Classe;
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
                      <th>Classes ID</th>
                      <th>Name</th>
                      <th>Cost</th>
                      <th>Info</th>
                      <th>Duration Per Time In Minuts</th>
                      <th>Period In Weeks</th>
                      <th>Number Of Sessions</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($classResult) : ?>
                      <?php $classes = $classResult->fetch_all(MYSQLI_ASSOC); ?>
                      <?php foreach ($classes as $key => $class) : ?>
                        <tr>
                          <td><a href="#"><?= $class['Class_ID'] ?></a></td>
                          <td><?= $class['Name'] ?></td>
                          <td><?= $class['Cost'] ?></td>
                          <td><?= $class['Info'] ?></td>
                          <td><?= $class['Duration_Per_Time_In_Minuts'] ?></td>
                          <td><?= $class['Period_In_Weeks'] ?></td>
                          <td><?= $class['Number_Of_Sessions'] ?></td>
                          <td><a href="edit_classes.php?Class_ID=<?= $class['Class_ID'] ?>" class="btn btn-warning">Edit </a></td>
                        <td><a href="../app/get/delete_class.php?Class_ID=<?= $class['Class_ID'] ?>" class="btn btn-success">Delete </a></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Classes ID</th>
                      <th>Name</th>
                      <th>Cost</th>
                      <th>Info</th>
                      <th>Duration Per Time In Minuts</th>
                      <th>Period In Weeks</th>
                      <th>Number Of Sessions</th>
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
