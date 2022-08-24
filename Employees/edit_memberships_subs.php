<?php
$title = "Edit | Memberships Subscription";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Membership_Subscription.php";

if ($_GET) {
  if (isset($_GET['Membership_Subscription_ID'])) {
    if (is_numeric($_GET['Membership_Subscription_ID'])) {
      // check if id exists in your db
      $memberObject = new Membership_Subscription;
      $memberObject->setMembership_Subscription_ID($_GET['Membership_Subscription_ID']);
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
    $memberObject->setStart_Date($_POST['Start_Date']);
    $memberObject->setEnd_Date($_POST['End_Date']);
    $result = $memberObject->update();
    // print_r($result);die;
    if($result){
      header('location:data_memberships_subscription.php');
      die;
    }else{
      echo "error";
    }
  }

?>

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="card offset-4">
        <div class="card-header">
          <h3 class="card-title"><?= $title ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <form action="" method="post">
          <div class="card-body">
            <div class="form-group">
              <label for="Start_Date">Start Date</label>
              <input type="date" value="<?= $memberResult->Start_Date?>" name="Start_Date" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="End_Date">End Date</label>
              <input type="date" value="<?= $memberResult->End_Date?>" name="End_Date" placeholder="" class="form-control" required>
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="add" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php
include_once "layout/footer.php";
