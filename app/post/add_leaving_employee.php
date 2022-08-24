<?php
$title = "Add | Attendance";
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Employee.php";
include_once "../models/Employee_Attendance.php";
if ($_GET) {
  if (isset($_GET['Employee_ID'])) {
    if (is_numeric($_GET['Employee_ID'])) {
      // check if id exists in your db
      $employeeObject = new Employee_Attendance;
      $employeeObject->setEmployee_ID($_GET['Employee_ID']);
      $employeeData = $employeeObject->leaving();
      if ($employeeData) {
        $emplpyeeResult = $employeeData->fetch_object();
        // print_r($emplpyeeResult);die;
      } else {
        header('location:../../Employees/layout/errors/404.php');
        die;
      }
    } else {
      header('location:../../Employees/layout/errors/404.php');
      die;
    }
  } else {
    header('location:../../Employees/layout/errors/404.php');
    die;
  }
} else {
  header('location:../../Employees/layout/errors/404.php');
  die;
}
//---------------- instance Em_Attend----------

if($_POST){
    date_default_timezone_set("Africa/Cairo");
    $time = date("H:i:s");
    $employeeObject->setLeaving($time);
    $result = $employeeObject->saveLeaving();
    // print_r($result);die;
    if($result){
      header('location:../../Employees/data_employees.php');
      die;
    }else{
      echo "error";
    }
  }

?>
