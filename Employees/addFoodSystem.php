<?php
$title = "Add Food System";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
  require '../app/models/' . $models .'.php';
});

// //--------------employee-----------------
$memberObject = new Class_Date;
$employeeObject = new Employee;
$employeeObject->setType('Trainer');
$employeeObject->setEmployee_ID($_SESSION['user']->Employee_ID);
$result = $employeeObject->getEmployeesByEmail();
$employee = $result->fetch_object();
$employeeData =$employeeObject->getNameMemberFoodSystem();
if($employeeData):
  $members = $employeeData->fetch_all(MYSQLI_ASSOC);
  // print_r($members);die;
else:
  echo "error";
endif;

//-----------------food-----------------------
$foodObject = new Food_System;

if($_POST){
  // print_r($_POST);die;

    $foodObject->setData($_POST['data']);
    $foodObject->setTrainer_ID($_POST['trainer']);
    $foodObject->setMember_ID($_POST['member']);
    $result = $foodObject->create();
    // print_r($result);die;
    if($result){
      header('location:dataFoodSystem.php');die;
    }else{
      echo "error";
    }
}
?>

<div class="container-fluid row">
    <div class="card  col-md-6 offset-3">
        <div class="card-header">
            <h3 class="card-title"><b>Add</b></h3>
        </div>

        <!-- form start -->
        <form action="" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="data">Data</label>
                    <textarea name="data" id="" class="form-control" cols="30" rows="10"
                        placeholder="Enter data"required></textarea>
                </div>
                <div class="form-group">
                  <input type="hidden" name="trainer" value="<?= $employee->Employee_ID?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="Member">Member Name</label>
                    <select name="member" class="form-control custom-select"required>
                        <option selected disabled>Select one</option>
                        <?php foreach ($members as $key => $member) : ?>
                        <option value="<?= $member['Member_ID']?>"><?= $member['Full_Name']?> (<?=$member['Member_ID']?>)</option>
                        <?php endforeach ?>
                    </select>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Add</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>

<?php
include_once "layout/footer.php";
