<?php
$title = "Edit | Memberships";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Mempership.php";

if ($_GET) {
  if (isset($_GET['Mempership_ID'])) {
    if (is_numeric($_GET['Mempership_ID'])) {
      // check if id exists in your db
      $memberObject = new Mempership;
      $memberObject->setMempership_ID($_GET['Mempership_ID']);
      $memberData = $memberObject->searchOnId();
      // print_r($memberData);die;
      if ($memberData) {
        $memberResult = $memberData->fetch_object();
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
    $memberObject->setCategory($_POST['Category']);
    $memberObject->setPrice($_POST['Price']);
    $memberObject->setPeriod($_POST['Period']);
    $memberObject->setDiscount_Percentage($_POST['Discount']);
    $result = $memberObject->update();
    // print_r($result);die;
    if($result){
      header('location:data_memperships.php');
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
              <label for="Category">Category</label>
              <input type="text" value="<?= $memberResult->Category?>" name="Category" placeholder="Enter Category" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Price">Price</label>
              <input type="number" value="<?= $memberResult->Price?>" name="Price" placeholder="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Period">Period</label>
              <input type="text" value="<?= $memberResult->Period?>" name="Period" placeholder="" class="form-control"required>
            </div>
            <div class="form-group">
              <label for="Discount">Discount Percentage</label>
              <input type="number" value="<?= $memberResult->Discount_Percentage?>" name="Discount" placeholder="" class="form-control"required>
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
