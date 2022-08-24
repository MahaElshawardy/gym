<?php
$title = "Add Classes Data";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});

$classDateObject = new Class_Date;
//--------------------Employee---------------
$trainerObject = new Employee;
$trainerData = $trainerObject->getFEmployee();
//-------------------classes------------------
$classObject = new Classe;
$classData = $classObject->read();
if ($_POST) {
  $classDateObject->setClass_ID($_POST['Class_ID']);
  $classDateObject->setTrainer_ID($_POST['Trainer']);
  $classDateObject->setDay($_POST['Day']);
  $classDateObject->setRoom($_POST['Room']);
  $classDateObject->setRound($_POST['Round']);
  $classDateObject->setStart_Time($_POST['Start_Time']);
  $classDateObject->setEnd_Time($_POST['End_Time']);
  $result = $classDateObject->create();
  // print_r($result);die;
  if ($result) {
    header('location:data_classes_date.php');
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
                  <label for="">Class Name</label>
                  <select class="form-control" name="Class_ID" id=""required>
                  <?php if($classData) : ?>
                    <?php $classes = $classData->fetch_all(MYSQLI_ASSOC);?>
                    <?php foreach ($classes as $key => $class) : ?>
                    <option value="<?= $class['Class_ID'] ?>"><?= $class['Name'] ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Trainer Name</label>
                  <select class="form-control" name="Trainer" id=""required>
                    <?php if($trainerData) : ?>
                    <?php $trainers = $trainerData->fetch_all(MYSQLI_ASSOC); ?>
                    <?php foreach ($trainers as $key => $trainer) : ?>
                    <option value="<?= $trainer['Employee_ID'] ?>"><?= $trainer['Full_Name'] ?></option>
                    <?php endforeach ?>
                    <?php endif ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Day</label>
                  <select class="form-control" name="Day" id=""required>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Cost">Room</label>
                  <input type="number" name="Room" value="" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="Info">Round </label>
                  <input type="number" name="Round" value="" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Duration">Start_Time</label>
                  <input type="time" value="" name="Start_Time" placeholder="" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Period">End_Time</label>
                  <input type="time" value="" name="End_Time" placeholder="" class="form-control"required>
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
