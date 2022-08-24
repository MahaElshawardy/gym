<?php
$title = "Edit | Classes";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Classe.php";

if ($_GET) {
  if (isset($_GET['Class_ID'])) {
      if (is_numeric($_GET['Class_ID'])) {
          // check if id exists in your db
          $classObject = new Classe;
          $classObject->setClass_ID($_GET['Class_ID']);
          $classData = $classObject->read();
          if ($classData) {
            $classResult = $classData->fetch_object();
            // print_r($classResult);die;
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
    $classObject->setName($_POST['name']);
    $classObject->setCost($_POST['Cost']);
    $classObject->setInfo($_POST['Info']);
    $classObject->setDuration_Per_Time_In_Minuts($_POST['Duration']);
    $classObject->setPeriod_In_Weeks($_POST['Period']);
    $classObject->setNumber_Of_Sessions($_POST['Sessions']);
    $result = $classObject->update();
    // print_r($result);die;
    if($result){
      header('location:data_classes.php');
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
              <label for="name">Name </label>
              <input type="text" name="name" value="<?= $classResult->Name?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Cost">Cost</label>
              <input type="number" value="<?= $classResult->Cost?>" name="Cost" placeholder="Enter Cost" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Info">Info</label>
              <textarea name="Info" id="" class="form-control" rows="3" required><?= $classResult->Info?></textarea>
            </div>
            <div class="form-group">
              <label for="Duration">Duration Per Time In Minuts</label>
              <input type="text" value="<?= $classResult->Duration_Per_Time_In_Minuts?>" name="Duration" placeholder="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Period">Period In Weeks</label>
              <input type="number" value="<?= $classResult->Period_In_Weeks?>" name="Period" placeholder="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Sessions">Number Of Sessions</label>
              <input type="number" value="<?= $classResult->Number_Of_Sessions?>" name="Sessions" placeholder="" class="form-control" required>
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
