<?php
$title = "Data Employees";
$icon = "<a href='add_employee.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Employee.php";
$employeeObject = new Employee;
$employeeResult = $employeeObject->read();
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
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Personal Image</th>
                    <th>National ID Image</th>
                    <th>Phone Number</th>
                    <th>Phone Number 2</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Type</th>
                    <th>Hiring Date</th>
                    <th>Periodic Working Hours</th>
                    <th>Period</th>
                    <th>Certificates</th>
                    <th>Add Attending</th>
                    <th>Add Leaving</th>
                    <th>Show</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if($employeeResult): ?>
                    <?php $employees = $employeeResult->fetch_all(MYSQLI_ASSOC);?>
                    <?php foreach ($employees as $key => $employee) :?>
                      <tr>
                        <td><a href="#"><?= $employee['Employee_ID']?></a></td>
                        <td><?= $employee['Full_Name']?></td>
                        <td><?= $employee['Email']?></td>
                        <td><?= $employee['Personal_Image']?></td>
                        <td><?= $employee['National_ID_Image']?></td>
                        <td><?= $employee['Phone_Number']?></td>
                        <td><?= $employee['Phone_Number2']?></td>
                        <td><?= $employee['Address']?></td>
                        <td><?= $employee['Gender']?></td>
                        <td><?= $employee['Birthdate']?></td>
                        <td><?= $employee['Type']?></td>
                        <td><?= $employee['Hiring_Date']?></td>
                        <td><?= $employee['Periodic_Working_Hours']?></td>
                        <td><?= $employee['Period']?></td>
                        <td><?= $employee['Certificates']?></td>
                        <td><form action="../app/post/add_attend_employee.php?Employee_ID=<?= $employee['Employee_ID']?>" method="post"><button type="submit" name = "attend" class="btn btn-success">Add</button></form></td>
                        <td><form action="../app/post/add_leaving_employee.php?Employee_ID=<?= $employee['Employee_ID']?>" method="post"><button type="submit" name = "leaving" class="btn btn-success">Add</button></form></td>
                        <td><a href="show_employee.php?Employee_ID=<?= $employee['Employee_ID'] ?>" class="btn btn-warning">Show </a></td>
                      </tr>
                      <?php endforeach ?>
                      <?php endif ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Personal Image</th>
                    <th>National ID Image</th>
                    <th>Phone Number</th>
                    <th>Phone Number 2</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Type</th>
                    <th>Hiring Date</th>
                    <th>Periodic Working Hours</th>
                    <th>Period</th>
                    <th>Certificates</th>
                    <th>Add Attending</th>
                    <th>Add Leaving</th>
                    <th>Show</th>
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
