<?php
$title = "Reviews";
include_once "layout/header.php";
include_once "../app/middleware/authPartner.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
    require '../app/models/' . $models .'.php';
  });
//--------------------------------------------
$employeeObject =new Employee;
if ($_GET) {
  if (isset($_GET['Employee_ID'])) {
    if (is_numeric($_GET['Employee_ID'])) {
      // check if id exists in your db
      $employeeObject->setEmployee_ID($_GET['Employee_ID']);
      $employeeData = $employeeObject->getReviews();
      // print_r($foodData);die;
          if ($employeeData) {
            $employeeResult = $employeeData->fetch_all(MYSQLI_ASSOC);
            // print_r($employeeResult);die;
          } else {
            echo "<div class='alert  text-center w-100' > No Reviews Yet </div>";
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

?>
<div class="col-md-6 offset-3">
        <!-- Review LIST -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reviews</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0 ">
                <ul class="products-list product-list-in-card pr-2">
                    <?php foreach ($employeeResult as $key => $review): ?>
                    <li class="item">
                        <div class="product-info ml-2">
                            <a href="#" class="product-title"><?= $review['Full_Name']?>
                                <span class="product-description">
                                    <?= $review['Comment']?>
                                </span>
                                <span class="product-description">
                                    <?= $review['Date']?>
                                </span>
                            </a>
                        </div>
                    </li>
                    <?php endforeach ?>
                    <!-- /.item -->
                </ul>
            </div>
        </div>
        <!-- Review LIST -->
    </div>

<?php include_once "layout/footer.php";
