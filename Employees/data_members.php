<?php
$title = "Data Members";
$icon = "<a href='add_member.php'><i class='fas fa-plus-circle'></i></a>";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "../app/models/Member.php";

$memberObject = new Member;
$memberResult = $memberObject->read();
if ($memberResult) :
$members = $memberResult->fetch_all(MYSQLI_ASSOC);
// print_r($members);die;
endif;
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
                      <th>Member ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Gender</th>
                      <th>Phone Number 2</th>
                      <th>Birthdate</th>
                      <th>Age</th>
                      <th>Weight</th>
                      <th>Height</th>
                      <th>Health_Statue</th>
                      <th>Status</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th> Name of Parent </th>
                      <th> Email of Parent </th>
                      <th> phone of Parent </th>
                      <th> phone 2 of Parent </th>
                      <th>Created At</th>
                      <th>Update</th>
                      <th>Add Attending</th>
                      <th>Add Leaving</th>
                      <th>Show</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($members as $key => $member) : //print_r($member);die;?>
                        <tr>
                          <td><a href="#"><?= $member['Member_ID'] ?></a></td>
                          <td><?= $member['Full_Name'] ?></td>
                          <td><?= $member['Email'] ?></td>
                          <td><?= $member['Phone_Number'] ?></td>
                          <td><?= $member['Gender'] ?></td>
                          <td><?= $member['Phone_Number2'] ?></td>
                          <td><?= $member['Birthdate'] ?></td>
                          <td><?php $datetime1 = date_create_from_format('Y-m-d',$member['Birthdate']);
                              $datetime2 = date_create_from_format('Y-m-d', date('Y-m-d'));$interval = date_diff($datetime1, $datetime2); echo $interval->format('%y') ?></td>
                          <td><?= $member['Weight'] ?></td>
                          <td><?= $member['Height'] ?></td>
                          <td><?= $member['Health_Statue'] ?></td>
                          <td><?= $member['Statue'] ?></td>
                          <td><?= $member['Category'] ?></td>
                          <td><?= $member['Price'] ?></td>
                          <td><?= $member['Discount_Percentage']."<b> % </b>" ?></td>
                          <?php if(($member['Parent_Member_ID'] != "")):?>
                            <td><?= $member['name_member'] ?></td>
                            <td><?= $member['email_member'] ?></td>
                            <td><?= $member['phone_member'] ?></td>
                            <td><?= $member['phone2_member'] ?></td>
                          <?php elseif($member['Parent_ID'] != ""):?>
                            <td><?= $member['name_parent'] ?></td>
                            <td><?= $member['email_parent'] ?></td>
                            <td><?= $member['phone_parent'] ?></td>
                            <td><?= $member['phone2_parent'] ?></td>
                          <?php else: ?>
                            <td> Not Allowed </td>
                            <td> Not Allowed </td>
                            <td> Not Allowed </td>
                            <td> Not Allowed </td>
                          <?php endif ?>
                          <td><?= $member['created_at'] ?></td>
                          <td><a href="edit.php?Member_ID=<?= $member['Member_ID'] ?>" class="btn btn-warning">Edit</a></td>
                          <td><form action="../app/post/add_attend_member.php?Member_ID=<?= $member['Member_ID']?>" method="post"><button type="submit" name = "attend" class="btn btn-success">Add</button></form></td>
                          <td><form action="../app/post/add_leving.php?Member_ID=<?= $member['Member_ID']?>" method="post"><button type="submit" name = "leaving" class="btn btn-success">Add</button></form></td>
                          <td><a href="show_member.php?Member_ID=<?= $member['Member_ID'] ?>" class="btn btn-dark">Show</a></td>
                        </tr>
                      <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Member ID</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Gender</th>
                      <th>Phone Number 2</th>
                      <th>Birthdate</th>
                      <th>Age</th>
                      <th>Weight</th>
                      <th>Height</th>
                      <th>Health_Statue</th>
                      <th>Status</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th> Name of Parent </th>
                      <th> Email of Parent </th>
                      <th> phone of Parent </th>
                      <th> phone 2 of Parent </th>
                      <th>Created At</th>
                      <th>Update</th>
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
