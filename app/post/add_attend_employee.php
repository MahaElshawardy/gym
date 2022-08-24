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
      $employeeObject = new Employee;
      $employeeObject->setEmployee_ID($_GET['Employee_ID']);
      $employeeData = $employeeObject->searcheOnId();
      if ($employeeData) {
        $emplpyeeResult = $employeeData->fetch_object();
        //  print_r($emplpyeeResult);die;
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
//---------------- instance Em_Attend----------
$attendObject = new Employee_Attendance;

if($_POST){
    $attendObject->setEmployee_ID($emplpyeeResult->id_emp);
    date_default_timezone_set("Africa/Cairo");
    $time = date("H:i:s");
    $attendObject->setAttending($time);
    $result = $attendObject->create();
    // print_r($result);die;
    if($result){
      header('location:../../Employees/data_employees.php');
      die;
    }else{
      echo "error";
    }
  }

?>
