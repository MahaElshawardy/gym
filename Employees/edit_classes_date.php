<?php
$title = "Edit | Classes";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Class_Date.php";

if ($_GET) {
  if (isset($_GET['Class_Date_ID'])) {
    if (is_numeric($_GET['Class_Date_ID'])) {
      // check if id exists in your db
      $classObject = new Class_Date;
      $classObject->setClass_ID($_GET['Class_Date_ID']);
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
// print_r($classResult);die;

if($_POST){
    $classObject->setClass_ID($_GET['Class_Date_ID']);
    $classObject->setClass_ID($_POST['name']);
    $classObject->setTrainer_ID($_POST['Trainer']);
    $classObject->setDay($_POST['Day']);
    $classObject->setStart_Time($_POST['Start_Time']);
    $classObject->setEnd_Time($_POST['End_Time']);
    $classObject->setRoom($_POST['Room']);
    $classObject->setRound($_POST['Round']);
    $result = $classObject->update();
    // print_r($result);die;
    if($result){
      header('location:data_classes_date.php');
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
              <label for="name">Classes Name </label>
              <input type="text" name="name" value="<?= $classResult->Name?>" class="form-control" >
            </div>
            <div class="form-group">
              <label for="Trainer">Trainer</label>
              <input type="text" name="Trainer" value="<?= $classResult->Full_Name?>" class="form-control" >
            </div>

            <div class="form-group">
              <label for="name">Day </label>
              <input type="text" name="Day" value="<?= $classResult->Day?>" class="form-control" >
            </div>
            <div class="form-group">
              <label for="Start_Time">Start Time</label>
              <input type="time" value="<?= $classResult->Start_Time?>" name="Start_Time" placeholder="Enter Cost" class="form-control" >
            </div>
            <div class="form-group">
              <label for="End_Time">End Time</label>
              <input type="time" value="<?= $classResult->End_Time?>" name="End_Time" placeholder="Enter Cost" class="form-control" >
            </div>
            <div class="form-group">
              <label for="Room">Room</label>
              <input type="text" value="<?= $classResult->Room?>" name="Room" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label for="Round">Round</label>
              <input type="number" value="<?= $classResult->Round?>" name="Round" placeholder="" class="form-control">
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
