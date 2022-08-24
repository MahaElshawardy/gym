<?php
$title = "Data Members Classes";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Member_class.php";
$memberClassObject = new Member_Class;
$reviewResult = $memberClassObject->read();

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
                    <th>Name Of Members</th>
                    <th>Name Of Classes</th>
                    <th>Round</th>
                    <th>Statue</th>
                    <th>Start date</th>
                    <th>Update</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php if($reviewResult):?>
                      <?php $employees = $reviewResult->fetch_all(MYSQLI_ASSOC); //print_r($employees)?>
                      <?php foreach ($employees as $key => $employee) :?>
                        <tr>
                            <td><?= $employee['Full_Name']?></td>
                            <td><?= $employee['Name']?></td>
                            <td><?= $employee['Round']?></td>
                            <td><?= $employee['Statue']?></td>
                            <td><?= $employee['Start_Date']?></td>
                            <td class="d-flex justify-content-center"><a href="editMemberClass.php?Member_Class_ID=<?= $employee['Member_Class_ID']?>" class="btn btn-warning">Edit </a></td>

                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tr>


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name Of Members</th>
                    <th>Name Of Classes</th>
                    <th>Round</th>
                    <th>Statue</th>
                    <th>Start date</th>
                    <th>Update</th>
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
