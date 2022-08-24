<?php
$title = "Data Members";
$icon = "<a href='addFoodSystem.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Employee.php";
$employeeObject = new Employee;
$employeeObject->setType('Trainer');
$employeeObject->setEmployee_ID($_SESSION['user']->Employee_ID);
$result = $employeeObject->getEmployeesByEmail();
// print_r($result);die;
$reviewResult = $employeeObject->dataFoodSystem();

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
                    <th>Food System ID</th>
                    <th>Data</th>
                    <th>Date</th>
                    <th>Name Of Members</th>
                    <th>Update/Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php if($reviewResult):?>
                      <?php $employees = $reviewResult->fetch_all(MYSQLI_ASSOC);?>
                      <?php foreach ($employees as $key => $employee) :?>
                        <tr>
                            <td><a href="#"><?= $employee['Food_System_ID']?></a></td>
                            <td><?= $employee['Data']?></td>
                            <td><?= $employee['Date']?></td>
                            <td><?= $employee['name_member']?></td>
                            <!-- <td><?= $employee['Full_Name']?></td> -->
                            <td class="d-flex justify-content-center"><a href="edit_food.php?Food_System_ID=<?= $employee['Food_System_ID']?>" class="btn btn-warning">Edit </a><div class="ml-2"> </div>
                            <a href="../app/get/delete_food.php?Food_System_ID=<?=$employee['Food_System_ID']?>" class="btn btn-danger">Delete</a></td>

                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tr>


                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Food System ID</th>
                    <th>Data</th>
                    <th>Date</th>
                    <th>Name Of Members</th>
                    <th>Update/Delete</th>
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
