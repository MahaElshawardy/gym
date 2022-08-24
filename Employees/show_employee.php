<?php
$title = "Show Employees";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Employee.php";
if ($_GET) {
  if (isset($_GET['Employee_ID'])) {
    if (is_numeric($_GET['Employee_ID'])) {
      // check if id exists in your db
      $employeeObject = new Employee;
      $employeeObject->setEmployee_ID($_GET['Employee_ID']);
      $employeeData = $employeeObject->searcheOnId();
      if ($employeeData) {
        $emplpyeeResult = $employeeData->fetch_object();
        $attendanceResult = $employeeData->fetch_all(MYSQLI_ASSOC);
        // print_r($attendanceResult);die;
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
?>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Information</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pr-2">
              <li class="item">
                <div class="product-info ml-2">
                  <table>
                    <tr>
                      <th class="pl-5 pr-5">Name</th>
                      <th><?= $emplpyeeResult->Full_Name?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Email</th>
                      <th><?= $emplpyeeResult->Email?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Personal Image </th>
                      <th><?= $emplpyeeResult->Personal_Image?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">National ID Image </th>
                      <th><?= $emplpyeeResult->National_ID_Image?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Phone Number</th>
                      <th><?= $emplpyeeResult->Phone_Number?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Phone Number2</th>
                      <th><?= $emplpyeeResult->Phone_Number2?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Address</th>
                      <th><?= $emplpyeeResult->Address?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Gender</th>
                      <th><?= $emplpyeeResult->Gender?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Birthdate</th>
                      <th><?= $emplpyeeResult->Birthdate?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Type</th>
                      <th><?= $emplpyeeResult->Type?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Hiring Date</th>
                      <th><?= $emplpyeeResult->Hiring_Date?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Periodic Working Hours</th>
                      <th><?= $emplpyeeResult->Periodic_Working_Hours?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Period</th>
                      <th><?= $emplpyeeResult->Period?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Certificates</th>
                      <th><?= $emplpyeeResult->Certificates?></th>
                    </tr>
                  </table>
                </div>
              </li>
              <!-- /.item -->
            </ul>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
    <div class="col-md-6">
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Attendance</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="card-body p-0">
            <ul class="products-list product-list-in-card pr-2">
              <li class="item">
                <div class="product-info ml-2">
                <table style="width: 65%;">
                    <?php foreach ($attendanceResult as $key => $attend) : ?>
                    <tr>
                      <th class="pl-5 pr-5">Employee ID</th>
                      <th><?= $attend['Employee_ID']?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Name</th>
                      <th><?= $attend['Full_Name']?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Date</th>
                      <th><?= $attend['Date']?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Attending</th>
                      <?php $date=date_create($attend['Attending']);?>
                      <th><?= date_format($date,"h:i:sa") ?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Leaving</th>
                      <?php $date=date_create($attend['Leaving']);?>
                      <th><?= date_format($date,"h:i:sa")?></th>

                    </tr>
                    <tr><th></th></tr>
                    <tr style="border-top: 3px double #8c8b8b;"></tr>
                    <tr>
                      <th></th>
                    </tr>
                    <?php endforeach ?>
                </div>
              </li>
              <!-- /.item -->
            </ul>
          </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>

<?php include_once "layout/footer.php";
