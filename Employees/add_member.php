<?php
$title = "Add Members";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});
include_once "../app/services/mail.php";

$memberObject = new Member;
$memberResult = $memberObject->getMembers();
//----------------mempership-------------
$mempershipObject = new Mempership;
$mempershipResult = $mempershipObject->read();
//----------------Not_Member_Parent------------
$parentObject = new Not_Member_Parent;
$parentResult = $parentObject->read();

if($_POST){
  $memberObject->setFull_Name($_POST['name']);
  $memberObject->setEmail($_POST['email']);
  $memberObject->setPassword($_POST['password']);
  $memberObject->setPhone_Number($_POST['phone1']);
  $memberObject->setPhone_Number2($_POST['phone2']);
  $memberObject->setGender($_POST['gender']);
  $memberObject->setBirthdate($_POST['date']);
  $memberObject->setWeight($_POST['weight']);
  $memberObject->setHeight($_POST['height']);
  $memberObject->setHealth_Statue($_POST['Health_Statue']);
  $memberObject->setMempership_ID($_POST['Mempership_ID']);
  $memberObject->setParent_ID($_POST['Parent_ID']);
  $memberObject->setParent_Member_ID($_POST['Parent_Member']);
  $code = rand(10000,99999);
  $memberObject->setCode($code);
  $result = $memberObject->create();
  // print_r($result);die;
  // print_r($result);die;
  if($result){
      // send mail with code
      // mail to => $_POST['email']
      // mail subject => verification code
      // mail body => hello name , your verification code is:12345 thank u.
      $subject = "verifcation Code";
      $body = "Hello {$_POST['name']} <br> your verification code is:<br>$code</br> thank you.";
      $mail = new mail($_POST['email'],$subject,$body);
      $mailResult = $mail->send();
      if($mailResult){
          // header to check code page
          // store email in session
          header('location:data_members.php');die;
      }else{
          $error = "<div class='alert alert-danger'> Try Again Later </div>";
      }
      // $error = "<div class='alert alert-danger'> insert </div>";

  }else{
      $error = "<div class='alert alert-danger'> Try Again Later.. </div>";
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
                <label for="name">Full Name</label>
                <input type="text" name ="name"value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text"value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" name ="email" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password"value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" name ="password" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="number">Phone Number </label>
                <input type="number" value="<?php if(isset($_POST['phone1'])){echo $_POST['phone1'];}?>" name ="phone1" placeholder="First Number" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="number" value="<?php if(isset($_POST['phon2'])){echo $_POST['phone2'];}?>" name ="phone2" placeholder="Second Number" class="form-control">
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control custom-select"required>
                  <option  selected>Select one</option>
                  <option <?= (isset($_POST['gender']) && $_POST['gender'] =='Male' ) ? 'selected' : '' ?>  value="Male">Male</option>
                  <option <?= (isset($_POST['gender']) && $_POST['gender'] =='Female' ) ? 'selected' : '' ?> value="Female">Female</option>
                </select>
              </div>
              <div class="form-group">
                <label>Birthdate:</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input name="date" value=""type="date" class="form-control datetimepicker-input" data-target="#reservationdate"required />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="Weight">Weight </label>
                <input type="text" name ="weight" placeholder="" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="Height">Height </label>
                <input type="text" name ="height" placeholder="" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="Health_Statue">Health Statue </label>
                <input type="text" name ="Health_Statue" placeholder="" class="form-control"required>
              </div>
              <div class="form-group">
                <label for="Mempership_ID">Mempership ID </label>
                <select name="Mempership_ID" class="form-control custom-select"required>
                  <option selected value="">Select one</option>
                  <?php if($mempershipResult):?>
                  <?php $memperships = $mempershipResult->fetch_all(MYSQLI_ASSOC);?>
                  <?php foreach ($memperships as $key => $mempership) :?>
                  <option value="<?= $mempership['Mempership_ID']?>"><?= $mempership['Category']?></option>
                  <?php endforeach ?>
                  <?php endif ?>
                </select>
              </div>
              <div class="form-group">
                <label for="Parent_ID ">Parent ID  </label>
                <select name="Parent_ID" class="form-control custom-select"required>
                  <option selected value="" >Select one</option>
                  <?php if($parentResult):?>
                  <?php $parents = $parentResult->fetch_all(MYSQLI_ASSOC);?>
                  <?php foreach ($parents as $key => $parent) :?>
                  <option value="<?= $parent['Parent_ID']?>"><?= $parent['Full_Name']?></option>
                  <?php endforeach ?>
                  <?php endif ?>
                </select>
              </div>
              <div class="form-group">
                <label for="Parent_Member_ID ">Parent Member_ID  </label>
                <select name="Parent_Member" class="form-control custom-select"required>
                  <option value="" selected>Select one</option>
                  <?php if($memberResult):?>
                  <?php $members = $memberResult->fetch_all(MYSQLI_ASSOC);?>
                  <?php foreach ($members as $key => $member) :?>
                  <option value="<?= $member['Member_ID']?>"><?= $member['Full_Name']?></option>
                  <?php endforeach ?>
                  <?php endif ?>
                </select>
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
