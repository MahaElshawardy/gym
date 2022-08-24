<?php
$title = "Add Partner";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Partner.php";

$partnerObject = new Partner;
if ($_POST) {
  $partnerObject->setName($_POST['Name']);
  $partnerObject->setEmail($_POST['Email']);
  $partnerObject->setPassword($_POST['Password']);
  $partnerObject->setAddress($_POST['Address']);
  $partnerObject->setPhone_Number($_POST['Phone_Number']);
  $partnerObject->setPhone_Number2($_POST['Phone_Number2']);
  $partnerObject->setFounded_Date($_POST['Founded_Date']);
  $partnerObject->setOther_Contacts($_POST['Other_Contacts']);
  $partnerObject->setWebsite($_POST['Website']);
  if (($_FILES['Certifcations']['error']) == 0) {
    // print_r($_FILES['Personal_Image']['name']);die;
    // photo exists
    // size
    $maxUploadSize = 10 ** 6; // 1 mega byte
    $megaBytes = $maxUploadSize / (10 ** 6);
    if ($_FILES['Certifcations']['size'] > $maxUploadSize) {
      $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
    }
    // , extension
    $extension = pathinfo($_FILES['Certifcations']['name'], PATHINFO_EXTENSION);
    $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
    if (!in_array($extension, $availableExtensions)) {
      $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
    }

    if (empty($errors)) {
      $photoName = uniqid() . '.' . $extension; // sakdfljlks.png
      $photoPath = "dist/img/PartnerCertifcations/$photoName";
      move_uploaded_file($_FILES['Certifcations']['tmp_name'], $photoPath);
      // set image
      $partnerObject->setCertifcations($photoName);
    }
  }

  if ($_FILES['Government_Record']['error'] == 0) {
    // photo exists
    // size
    $maxUploadSize = 10 ** 6; // 1 mega byte
    $megaBytes = $maxUploadSize / (10 ** 6);
    if ($_FILES['Government_Record']['size'] > $maxUploadSize) {
      $errors['image-size'] = "<div class='alert alert-danger'> Max upload Size Of Image Is $megaBytes Bytes </div>";
    }
    // , extension
    $extension = pathinfo($_FILES['Government_Record']['name'], PATHINFO_EXTENSION);
    $availableExtensions = ['jpg', 'png', 'jpeg','pdf'];
    if (!in_array($extension, $availableExtensions)) {
      $errors['image-extension'] = "<div class='alert alert-danger'> Allowed Exentsions are " . implode(",", $availableExtensions) . " </div>";
    }

    if (empty($errors)) {
      $photoName = uniqid() . '.' . $extension; // 156msa.png
      $photoPath = "dist/img/PartnerGovernment/$photoName";
      move_uploaded_file($_FILES['Government_Record']['tmp_name'], $photoPath);
      // set image
      $partnerObject->setGovernment_Record($photoName);
    }
  }
  if (empty($errors)) {
  $result = $partnerObject->create();
  // print_r($result);die;
  if ($result) {
    header('location:data_partner.php');
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
              <label for="Name">Name </label>
              <input type="text" name="Name" value="" class="form-control" required>
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
              <label for="Certifcations">Certifcations</label>
              <input type="file" name="Certifcations" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Government_Record">Government Record </label>
              <input type="file" name="Government_Record" value="" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" value="" name="Address" placeholder="" class="form-control" >
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
              <label>Founded Date</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input name="Founded_Date" value="" type="date" class="form-control datetimepicker-input" data-target="#reservationdate" required />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="Other_Contacts">Other Contacts</label>
              <input type="text" value="" name="Other_Contacts" placeholder="" class="form-control" >
            </div>
            <div class="form-group">
              <label for="Website">Website</label>
              <input type="text" value="" name="Website" placeholder="" class="form-control" >
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
