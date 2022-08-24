<?php
$title = "Add Parent";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Not_Member_Parent.php";

$notMemberObject = new Not_Member_Parent;

//-----------------food-----------------------
if($_POST){
  // print_r($_POST);die;

    $notMemberObject->setFull_Name($_POST['Name']);
    $notMemberObject->setEmail($_POST['Email']);
    $notMemberObject->setPhone_Number($_POST['Phone_Number']);
    $notMemberObject->setPhone_Nmber2($_POST['Phone_Number2']);
    $result = $notMemberObject->create();
    // print_r($result);die;
    if($result){
      header('location:edit.php');die;
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
                  <label for="Info">Name Of Parent </label>
                  <input type="text" name="Name" value="<?php if(isset($_POST['Name'])){echo $_POST['Name'];} ?>" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Email ">Email</label>
                  <input type="text" name="Email" value="<?php if(isset($_POST['Email'])){echo $_POST['Email'];} ?>" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Phone_Number ">Phone Number</label>
                  <input type="number" name="Phone_Number" value="<?php if(isset($_POST['Phone_Number'])){echo $_POST['Phone_Number'];} ?>" class="form-control"required>
                </div>
                <div class="form-group">
                  <label for="Info">Phone Number 2 </label>
                  <input type="number" name="Phone_Number2" value="<?php if(isset($_POST['Phone_Number2'])){echo $_POST['Phone_Number2'];} ?>" class="form-control">
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
