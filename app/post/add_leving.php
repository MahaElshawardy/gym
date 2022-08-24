<?php
$title = "Add | Leaving";
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Member.php";
include_once "../models/Employee_Attendance.php";
include_once "../models/Members_Attendance.php";
if ($_GET) {
  if (isset($_GET['Member_ID'])) {
    if (is_numeric($_GET['Member_ID'])) {
      // check if id exists in your db
      $memberObject = new Members_Attendance;
      $memberObject->setMember_ID($_GET['Member_ID']);
      $memberData = $memberObject->leaving();
      // print_r($_GET);die;
      if ($memberData) {
        $emplpyeeResult = $memberData->fetch_object();
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
// $attendObject = new Members_Attendance;
if($_POST){
  // print_r($_POST);die;
  // print_r($_GET['Member_ID']);die;
  // $memberObject->setMember_ID($_GET['Member_ID']);
  date_default_timezone_set("Africa/Cairo");
  $time = date("H:i:s");
  $memberObject->setLeaving($time);
  $result = $memberObject->saveLeaving();
  if($result){
    header('location:../../Employees/data_members.php');
    die;
  }else{
    echo "error";
  }
}

?>

