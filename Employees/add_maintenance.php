<?php
$title = "Add Maintenance";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
if ($_GET) {
  if (isset($_GET['Equipment_ID'])) {
    if (is_numeric($_GET['Equipment_ID'])) {
      // check if id exists in your db
      $equipmentObject = new Maintenance_Record;
      $equipmentObject->setEquipment_ID($_GET['Equipment_ID']);
      $memberData = $equipmentObject->searchOnId();
      // print_r($memberData);die;
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
//-------------------equipment------------

//---------------------equipment----------
$maintenanceObject = new Maintenance_Record;
if($_POST){
  $maintenanceObject->setDate($_POST['date']);
  $maintenanceObject->setInfo($_POST['info']);
  $maintenanceObject->setEquipment_ID($memberResult->Equipment_ID);
  $result = $maintenanceObject->create();
  // print_r($result);die;
  if($result){
    header('location:data_equipments.php');
    die;
  }else{
    echo "error";
  }
}


?>
<section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card ">
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
                  <label>Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input name="date" value=""type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      </div>
                    </div>
                </div>
              <div class="form-group">
                <label for="info">Info</label>
                <input type="text" value="" name ="info" placeholder="Enter Info" class="form-control">
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <div class="row">
            <div class="col-12">
              <a href="#" class="btn btn-secondary">Cancel</a>
              <input type="submit" name="add" class="btn btn-success float-right">
            </div>
          </div>
        </form>
          <!-- /.card -->
        </div>
        <!-- <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Budget</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Estimated project duration</label>
                <input type="number" id="inputEstimatedDuration" class="form-control">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div> -->
      </div>
    </section>

<?php include_once "layout/footer.php";
