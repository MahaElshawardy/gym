<?php
$title = "Data Memberships Subscription";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Membership_Subscription.php";

$memberShipsObject = new Membership_Subscription;
$memberResult = $memberShipsObject->read();


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
                      <th>Membership Subscription ID </th>
                      <th>Member Name</th>
                      <th>Category </th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if ($memberResult) : ?>
                      <?php $members = $memberResult->fetch_all(MYSQLI_ASSOC);//print_r($members);die; ?>
                      <?php foreach ($members as $key => $member) : ?>
                        <tr>
                          <td><a href="#"><?= $member['Membership_Subscription_ID'] ?></a></td>
                          <td><?= $member['Full_Name'] ?></td>
                          <td><?= $member['Category'] ?></td>
                          <td><?= $member['Start_Date'] ?></td>
                          <td><?= $member['End_Date']?></td>
                          <td><a class="btn btn-warning" href="edit_memberships_subs.php?Membership_Subscription_ID=<?= $member['Membership_Subscription_ID'] ?>" >Edit</a></td>
                          <td><a class="btn btn-danger" href="../app/get/delete_membershipsub.php?Membership_Subscription_ID=<?= $member['Membership_Subscription_ID'] ?>" >Delete</a></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Membership Subscription ID </th>
                      <th>Member Name</th>
                      <th>Category</th>
                      <th>Start Date</th>
                      <th>End Date</th>
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
