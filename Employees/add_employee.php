<?php
$title = "Add Employee";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Employee.php";

$employeeObject = new Employee;
if ($_POST) {
  $employeeObject->setFull_Name($_POST['Full_Name']);
  $employeeObject->setEmail($_POST['Email']);
  $employeeObject->setPassword($_POST['Password']);
  $employeeObject->setPersonal_Image($_POST['Personal_Image']);
  $employeeObject->setNational_ID_Image($_POST['National_ID_Image']);
  $employeeObject->setAddress($_POST['Address']);
  $employeeObject->setPhone_Number($_POST['Phone_Number']);
  $employeeObject->setPhone_Number2($_POST['Phone_Number2']);
  $employeeObject->setGender($_POST['gender']);
  $employeeObject->setBirthdate($_POST['date']);
  $employeeObject->setType($_POST['Type']);
  $employeeObject->setHiring_Date($_POST['Hiring_Date']);
  $employeeObject->setPeriodic_Salary($_POST['Periodic_Salary']);
  $employeeObject->setPeriodic_Working_Hours($_POST['Periodic_Working_Hours']);
  $employeeObject->setPeriod($_POST['Period']);
  $employeeObject->setCertificates($_POST['Certificates']);
  if (($_FILES['Personal_Image']['error']) == 0) {
    // print_r($_FILES['Personal_Image']['name']);die;
    // photo exists
    // size
    $maxUploadSize = 10 ** 6; // 1 mega byte
    $megaBytes = $maxUploadSize / (10 ** 6);
    if ($_FILES['Personal_Image']['size'] > $maxUploadSize) {
      $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
    }
    // , extension
    $extension = pathinfo($_FILES['Personal_Image']['name'], PATHINFO_EXTENSION);
    $availableExtensions = ['jpg', 'png', 'jpeg'];
    if (!in_array($extension, $availableExtensions)) {
      $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
    }

    if (empty($errors)) {
      $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
      $photoPath = "dist/img/$photoName";
      move_uploaded_file($_FILES['Personal_Image']['tmp_name'], $photoPath);
      // set image
      $employeeObject->setPersonal_Image($photoName);
    }
  }

  if ($_FILES['National_ID_Image']['error'] == 0) {
    // photo exists
    // size
    $maxUploadSize = 10 ** 6; // 1 mega byte
    $megaBytes = $maxUploadSize / (10 ** 6);
    if ($_FILES['National_ID_Image']['size'] > $maxUploadSize) {
      $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
    }
    // , extension
    $extension = pathinfo($_FILES['National_ID_Image']['name'], PATHINFO_EXTENSION);
    $availableExtensions = ['jpg', 'png', 'jpeg'];
    if (!in_array($extension, $availableExtensions)) {
      $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
    }

    if (empty($errors)) {
      $photoName = uniqid() . '.' . $extension; // 156msa.png
      $photoPath = "dist/img/employee/$photoName";
      move_uploaded_file($_FILES['National_ID_Image']['tmp_name'], $photoPath);
      // set image
      $employeeObject->setNational_ID_Image($photoName);
    }
  }
  if (empty($errors)) {
  $result = $employeeObject->create();
  // print_r($result);die;
  if ($result) {
    header('location:data_employees.php');
    die;
  } else {
    echo "error";
  }
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
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <?php
            if (!empty($errors)) {
              foreach ($errors as $key => $error) {
                echo $error;
              }
            }
            ?>
            <div class="form-group">
              <label for="Full_Name">Full_Name </label>
              <input type="text" name="Full_Name" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Email ">Email </label>
              <input type="text" name="Email" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Password">Password </label>
              <input type="password" name="Password" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Personal_Image">Personal_Image</label>
              <input type="file" name="Personal_Image" value="" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="National_ID_Image">National_ID_Image </label>
              <input type="file" name="National_ID_Image" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" value="" name="Address" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Phone_Number">Phone_Number </label>
              <input type="number" value="" name="Phone_Number" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Phone_Number2">Phone Number2</label>
              <input type="number" value="" name="Phone_Number2" placeholder="" class="form-control">
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <select name="gender" class="form-control custom-select" required>
                <option selected>Select one</option>
                <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : '' ?> value="Male">Male</option>
                <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : '' ?> value="Female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label>Birthdate</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="date" value="" type="date" class="form-control datetimepicker-input" data-target="#reservationdate" required />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="Type">Type</label>
              <select name="Type" class="form-control custom-select" required>
                <option selected>Select one</option>
                <option <?= (isset($_POST['Type']) && $_POST['Type'] == 'Trainer') ? 'selected' : '' ?> value="Trainer">Trainer</option>
                <option <?= (isset($_POST['Type']) && $_POST['Type'] == 'Receptionist') ? 'selected' : '' ?> value="Receptionist">Receptionist</option>
              </select>
            </div>
            <div class="form-group">
              <label>Hiring Date</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="Hiring_Date" value="" type="date" class="form-control datetimepicker-input" data-target="#reservationdate" required />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="Periodic_Salary">Periodic_Salary</label>
              <input type="number" value="" name="Periodic_Salary" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Periodic_Working_Hours">Periodic_Working_Hours</label>
              <input type="number" value="" name="Periodic_Working_Hours" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Period">Period</label>
              <input type="text" value="" name="Period" placeholder="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Certificates">Certificates</label>
              <input type="text" value="" name="Certificates" placeholder="" class="form-control" required>
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
