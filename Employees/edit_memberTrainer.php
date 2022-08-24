<?php
$title = "Edit |members";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Member.php";

if ($_GET) {
  if (isset($_GET['Member_ID'])) {
      if (is_numeric($_GET['Member_ID'])) {
          // check if id exists in your db
          $memberObject = new Member;
          $memberObject->setMember_ID($_GET['Member_ID']);
          $memberData = $memberObject->searchOnId();
          if ($memberData) {
            $memberResult = $memberData->fetch_object();
            // print_r($memberResult);die;
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
} else {
  header('location:layout/errors/404.php');
  die;
}
// $memberObject = new Member;
// $memberObject->setMember_ID($_GET['Member_ID']);
// $members = $memberObject->searchOnId();
// // print_r($members);die;
// if($members){
//   $member = $members->fetch_object(MYSQLI_ASSOC);
// }
if($_POST){
    $memberObject->setWeight($_POST['weight']);
    $memberObject->setHeight($_POST['height']);
    $memberObject->setHealth_Statue($_POST['Health_Statue']);
    $result = $memberObject->updateMember();
    // print_r($result);die;
    if($result){
      header('location:data_membersTrainer.php');
      die;
    }else{
      echo "error";
    }
  }

?>

<div class="container-fluid row">
    <div class="card  col-md-6 offset-3">
        <div class="card-header">
            <h3 class="card-title"><b>Update</b></h3>
        </div>

        <!-- form start -->
        <form action="" method="post">
            <div class="card-body">
            <div class="form-group">
                <label for="Weight">Weight </label>
                <input type="text" name ="weight" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                <label for="Height">Height </label>
                <input type="text" name ="height" placeholder="" class="form-control">
              </div>
              <div class="form-group">
                <label for="Health_Statue">Health Statue </label>
                <textarea name="Health_Statue" class="form-control" id="" cols="30" rows="10"></textarea>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>

<?php
include_once "layout/footer.php";
