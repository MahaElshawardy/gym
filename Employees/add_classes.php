<?php
$title = "Add Classes";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Classe.php";

$equipmentObject = new Classe;
if ($_POST) {
  $equipmentObject->setName($_POST['name']);
  $equipmentObject->setCost($_POST['Cost']);
  $equipmentObject->setInfo($_POST['Info']);
  $equipmentObject->setDuration_Per_Time_In_Minuts($_POST['Duration']);
  $equipmentObject->setPeriod_In_Weeks($_POST['Period']);
  $equipmentObject->setNumber_Of_Sessions($_POST['Sessions']);
  $result = $equipmentObject->create();
  // print_r($result);die;
  if ($result) {
    header('location:data_classes.php');
    die;
  } else {
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
                  <label for="name">Classes Name </label>
                  <input type="text" name="name" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Cost">Cost</label>
                  <input type="text" name="Cost" value="" class="form-control">
                </div>

                <div class="form-group">
                  <label for="Info">Info </label>
                  <input type="text" name="Info" value="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Duration">Duration Per Time In Minuts</label>
                  <input type="number" value="" name="Duration" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Period">Period In Weeks</label>
                  <input type="number" value="" name="Period" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                  <label for="Sessions">Number Of Sessions</label>
                  <input type="number" value="" name="Sessions" placeholder="" class="form-control">
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

<?php include_once "layout/footer.php";
