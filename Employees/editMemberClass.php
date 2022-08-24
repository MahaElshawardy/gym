<?php
$title = "Edit | Members Class";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Member_class.php";
if ($_GET) {
  // print_r($_GET);die;
  if (isset($_GET['Member_Class_ID'])) {
      if (is_numeric($_GET['Member_Class_ID'])) {
          // check if id exists in your db
          $memberObject = new Member_class;
          $memberObject->setMember_Class_ID($_GET['Member_Class_ID']);
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

if($_POST){
    $memberObject->setStatue($_POST['Status']);
    $memberObject->setStart_Date($_POST['date']);
    $result = $memberObject->update();
    // print_r($result);die;
    if($result){
      header('location:memberClass.php');
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
                <label for="Status">Status</code></label>
                  <select class="custom-select form-control-border" name="Status">
                    <option <?= (isset($_POST['Status']) && $_POST['Status'] =='1' ) ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= (isset($_POST['Status']) && $_POST['Status'] =='0' ) ? 'selected' : '' ?> value="0">Not Active</option>
                  </select>
               </div>

              <div class="form-group">
                <label for="">Start Date</label>
                <input type="date" name="date" id="" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}?>" class="form-control">
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
