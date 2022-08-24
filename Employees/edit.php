<?php
$title = "Edit |members";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});

$memberObject = new Member;
$notMemberObject = new Not_Member_Parent;
if ($_GET) {
  if (isset($_GET['Member_ID'])) {
      if (is_numeric($_GET['Member_ID'])) {
          // check if id exists in your db
          $memberObject->setMember_ID($_GET['Member_ID']);
          $memberData = $memberObject->searchOnId();
          $memberAll = $memberObject->getMembers();
          $notMemberData = $notMemberObject->read();
          if ($memberData) {
            $memberResult = $memberData->fetch_object();
            $memberResults = $memberAll->fetch_all(MYSQLI_ASSOC);
            $notMemberResult = $notMemberData->fetch_all(MYSQLI_ASSOC);
            // print_r($notMemberResult);die;
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

if(isset($_POST['kids'])){
  $memberObject->setParent_Member_ID($_POST['memberParent']);
  $memberObject->setParent_ID($_POST['parent']);
  $memberObject->setStatue($_POST['Status']);
  $result = $memberObject->employeeUpdateMember();
  // print_r($result);die;
  if($result){
    header('location:data_members.php');
    die;
  }else{
    echo "error";
  }
}

if(isset($_POST['status'])){
  $memberObject->setStatue($_POST['Status']);
  $result = $memberObject->employeeUpdateStatue();
  // print_r($result);die;
  if($result){
    header('location:data_members.php');
    die;
  }else{
    echo "error";
  }
}
?>
<?php
  $datetime1 = date_create_from_format('Y-m-d',$memberResult->Birthdate);
  $datetime2 = date_create_from_format('Y-m-d', date('Y-m-d'));
  $interval = date_diff($datetime1, $datetime2)->format('%y');
  if($interval <= 13):
?>
<div class="container-fluid row">
    <div class="card  col-md-6 offset-3">
        <div class="card-header">
            <h3 class="card-title"><b>Update Kids</b></h3>
        </div>

        <!-- form start -->
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                  <label for="Status">Member Of Parent</code></label>
                  <select class="custom-select form-control-border" name="memberParent">
                    <option value="" selected>Select one</option>
                    <?php foreach ($memberResults as $key => $member) : ?>
                    <option value="<?= $member['Member_ID']?>"><?= $member['Full_Name']?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Status">Parent</code></label>
                  <select class="custom-select form-control-border" name="parent">
                    <option value="" selected>Select one</option>
                    <?php foreach ($notMemberResult as $key => $member) : ?>
                    <option value="<?= $member['Parent_ID']?>"><?= $member['Full_Name']?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Status">Status</code></label>
                  <select class="custom-select form-control-border" name="Status">
                    <option <?= (isset($_POST['Status']) && $_POST['Status'] =='1' ) ? 'selected' : '' ?> value="1">Active</option>
                    <option <?= (isset($_POST['Status']) && $_POST['Status'] =='0' ) ? 'selected' : '' ?> value="0">Not Active</option>
                  </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex">
              <button type="submit" name="kids" class="btn btn-dark mr-auto p-2">Update</button>
              <a class="btn btn-success p-2" href="add_parent.php">Add Parent</a>
            </div>
          </form>
      </div>
      <!-- /.card -->
</div>

<?php else :?>
<div class="container-fluid row">
    <div class="card  col-md-6 offset-3">
        <div class="card-header">
            <h3 class="card-title"><b>Status</b></h3>
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

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" name="status" class="btn btn-dark">Update</button>
            </div>
          </form>
      </div>
      <!-- /.card -->
</div>
    <?php endif ?>

<?php
include_once "layout/footer.php";
