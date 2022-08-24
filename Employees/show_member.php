<?php
$title = "Show member";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Member.php";
if ($_GET) {
  if (isset($_GET['Member_ID'])) {
    if (is_numeric($_GET['Member_ID'])) {
      // check if id exists in your db
      $memberObject = new Member;
      $memberObject->setMember_ID($_GET['Member_ID']);
      $memberData = $memberObject->searchOnId();
      if ($memberData) {
        $memberResult = $memberData->fetch_object();
        $attendanceResult = $memberData->fetch_all(MYSQLI_ASSOC);
        // print_r($memberResult);die;
      } else {
       echo "<div class='alert  text-center w-100' > No members Yet </div>";die;
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
                      <th class="pl-5 pr-5">Member ID </th>
                      <th><?= $memberResult->Member_ID ?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Full Name</th>
                      <th><?= $memberResult->Full_Name?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Email</th>
                      <th><?= $memberResult->Email ?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Phone Number </th>
                      <th><?= $memberResult->Phone_Number ?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Phone Number2</th>
                      <th><?= $memberResult->Phone_Number2 ?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Gender</th>
                      <th><?= $memberResult->Gender?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Birthdate</th>
                      <th><?= $memberResult->Birthdate?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Weight</th>
                      <th><?= $memberResult->Weight?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Height</th>
                      <th><?= $memberResult->Height?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Health Statue</th>
                      <th><?= $memberResult->Health_Statue?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Statue</th>
                      <th><?= $memberResult->Statue?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Mempership ID</th>
                      <th><?= $memberResult->Mempership_ID ?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Parent ID </th>
                      <th><?= $memberResult->Parent_ID?></th>
                    </tr>
                    <tr>
                      <th class="pl-5 pr-5">Parent Member ID </th>
                      <th><?= $memberResult->Parent_Member_ID ?></th>
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
                      <th class="pl-5 pr-5">member ID</th>
                      <th><?= $attend['Member_ID']?></th>
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
