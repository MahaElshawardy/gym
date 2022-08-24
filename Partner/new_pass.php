<?php
$title = "Reset Password ";
include_once "layout/header.php";
include_once "../app/middleware/authPartner.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
if (empty($_SESSION['partner'])) {
  unset($_SESSION['member']);
  unset($_SESSION['user']);
  header('location:login.php');
  die;
}
include_once "../app/requests/Validation.php";
include_once "../app/models/Partner.php";
// $employeeObject->setEmployee_ID($_SESSION['user']->Employee_ID);
// $result = $employeeObject->getEmployeesByEmail();
// $employee = $result->fetch_object();
if ($_POST) {
  $errors = [];
  $passwordValidation = new Validation('password',$_POST['password']);
  $passwordRequiredResult = $passwordValidation->required();
  if(empty($passwordRequiredResult)){
          $passwordConfrimResult   =  $passwordValidation->confirmed($_POST['password_confirmation']);
          if(!empty($passwordConfrimResult)){
              $errors['password']['confirm'] = $passwordConfrimResult;
          }
  }else{
      $errors['password']['required'] = $passwordRequiredResult;
  }

  // (password_confirmation=>requried )
  $confrimPasswordValidation = new Validation('confrim password',$_POST['password_confirmation']);
  $confrimPasswordRequiredResult = $confrimPasswordValidation->required();
  if(!empty($confrimPasswordRequiredResult)){
      $errors['confirm']['required'] = $confrimPasswordRequiredResult;
  }
  if(empty($errors)){
      // update user password
      // header to login
      $employeeObject = new Partner;
      $employeeObject->setPassword($_POST['password']);
      $employeeObject->setPartner_ID($_SESSION['partner']->Partner_ID);
      $result = $employeeObject->updatePasswordByEmail();
      if($result){
          $success = "Your Password Has Been Successfully Updated";
          header('location:index.php');die;
      }else{
          $errors['password']['wrong'] = "Something Went Wrong";
      }
  }
}
?>
<section class="content">
    <div class="container-fluid ">
        <div class="row mt-5">
            <!-- left column -->
            <div class="col-md-12 mt-5">
                <!-- jquery validation -->
                <div class="card col-md-6 offset-3 mt-5 ">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post" >
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" id=""
                                    placeholder="Password"required>
                            </div>
                            <div class="form-group">
                                <label for="Password">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id=""
                                    placeholder="Password"required>
                            </div>
                        </div>
                        <?php
                            if(!empty($errors['password'])){
                              foreach ($errors['password'] as $key => $value) {
                                  echo "<div class='alert alert-danger'> $value </div>";
                              }
                            }
                            if(!empty($errors['confirm'])){
                              foreach ($errors['confirm'] as $key => $value) {
                                  echo "<div class='alert alert-danger'> $value </div>";
                              }
                          }
                            ?>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="loginAdmin">Reset Password</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<?php
include_once "layout/footer.php";
