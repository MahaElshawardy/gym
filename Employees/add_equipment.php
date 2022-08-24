<?php
$title = "Add Equipment";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});

//-------------------subblier------------
$subblierObject = new Subblier;
$subblierResult = $subblierObject->read();

//---------------------equipment----------
$equipmentObject = new Equipment;
if($_POST){
  $equipmentObject->setName($_POST['name']);
  $equipmentObject->setPrice($_POST['price']);
  $equipmentObject->setArrivalDate($_POST['ArrivalDate']);
  $equipmentObject->setSubblier_ID($_POST['Subblier']);
  $result = $equipmentObject->create();
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
                <label for="name">Name Of Equipment</label>
                <input type="text" name ="name"value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" class="form-control">
              </div>
              <div class="form-group">
                <label for="number">Price</label>
                <input type="number" value="<?php if(isset($_POST['price'])){echo $_POST['price'];}?>" name ="price" placeholder="Enter Price" class="form-control">
              </div>
              <div class="form-group">
                <label for="number">Arrival Date</label>
                <input type="date" value="<?php if(isset($_POST['phon2'])){echo $_POST['phone2'];}?>" name ="ArrivalDate" placeholder="Second Number" class="form-control">
              </div>
              <div class="form-group">
                <label for="Subblier">Subblier</label>
                <select name="Subblier" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <?php if($subblierResult): ?>
                  <?php $subbliers = $subblierResult->fetch_all(MYSQLI_ASSOC); ?>
                  <?php foreach ($subbliers as $key => $subblier) : ?>
                  <option value="<?= $subblier['Subblier_ID']?>"><?= $subblier['Name']?></option>
                  <?php endforeach ?>
                  <?php endif ?>
                </select>
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
