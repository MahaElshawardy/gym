<?php
$title = "Data Paretner";
$icon = "<a href='add_paretner.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Partner.php";
$partnerObject = new Partner;
$partnerResult = $partnerObject->read();
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
                      <th>Partner ID</th>
                      <th>Name</th>
                      <th>Founded Date</th>
                      <th>Phone Number</th>
                      <th>Phone Number2</th>
                      <th>Email</th>
                      <th>Website</th>
                      <th>Certifcations</th>
                      <th>Government Record</th>
                      <th>Address</th>
                      <th>Other Contacts</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($partnerResult) : ?>
                      <?php $Partners = $partnerResult->fetch_all(MYSQLI_ASSOC); ?>
                      <?php foreach ($Partners as $key => $Partner) : ?>
                        <tr>
                          <td><a href="#"><?= $Partner['Partner_ID'] ?></a></td>
                          <td><?= $Partner['Name'] ?></td>
                          <td><?= $Partner['Founded_Date'] ?></td>
                          <td><?= $Partner['Phone_Number'] ?></td>
                          <td><?= $Partner['Phone_Number2'] ?></td>
                          <td><?= $Partner['Email'] ?></td>
                          <td><?= $Partner['Website'] ?></td>
                          <td><?= $Partner['Certifcations'] ?></td>
                          <td><?= $Partner['Government_Record'] ?></td>
                          <td><?= $Partner['Address'] ?></td>
                          <td><?= $Partner['Other_Contacts'] ?></td>
                          <td><a href="../app/get/delete_partner.php?Partner_ID=<?= $Partner['Partner_ID'] ?>" class="btn btn-success">Delete </a></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Partner ID</th>
                      <th>Name</th>
                      <th>Founded Date</th>
                      <th>Phone Number</th>
                      <th>Phone Number2</th>
                      <th>Email</th>
                      <th>Website</th>
                      <th>Certifcations</th>
                      <th>Government Record</th>
                      <th>Address</th>
                      <th>Other Contacts</th>
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
