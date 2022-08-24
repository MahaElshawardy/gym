<?php
$title = "Edit | Food System";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Food_System.php";
$foodObject = new Food_System;



if ($_GET) {
  if (isset($_GET['Food_System_ID'])) {
    if (is_numeric($_GET['Food_System_ID'])) {
      // check if id exists in your db
      $foodObject->setFood_System_ID($_GET['Food_System_ID']);
      $foodData = $foodObject->read();
      // print_r($foodData);die;
          if ($foodData) {
            $foodResult = $foodData->fetch_object();
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
    $foodObject->setData($_POST['Data']);
    $result = $foodObject->update();
    // print_r($result);die;
    if($result){
      header('location:dataFoodSystem.php');
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
              <label for="Info">Data</label>
              <textarea name="Data" id="" class="form-control" rows="3" required><?= $foodResult->Data?></textarea>
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" name="edit" class="btn btn-success float-right">
        </div>
      </div>
      </form>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php
include_once "layout/footer.php";
