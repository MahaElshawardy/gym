<?php
$title = "Add Mambership";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Mempership.php";

$memberObject = new Mempership;
if ($_POST) {
  $memberObject->setCategory($_POST['Name']);
  $memberObject->setPrice($_POST['Price']);
  $memberObject->setPeriod($_POST['Period']);
  $memberObject->setDiscount_Percentage($_POST['Discount']);
  $result = $memberObject->create();
  // print_r($result);die;
  if ($result) {
    header('location:data_memperships.php');
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
                  <label for="name">Category Name </label>
                  <input type="text" name="Name" value="" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Cost">Price</label>
                  <input type="number" name="Price" value="" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Info">Period </label>
                  <input type="text" name="Period" value="" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Discount">Discount Percentage </label>
                  <input type="text" name="Discount" value="" class="form-control"required>
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
