<?php
$title = "Add | Attending";
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Member.php";
include_once "../models/Employee_Attendance.php";
include_once "../models/Members_Attendance.php";
if ($_GET) {
  if (isset($_GET['Member_ID'])) {
    if (is_numeric($_GET['Member_ID'])) {
      // check if id exists in your db
      $memberObject = new Member;
      $memberObject->setMember_ID($_GET['Member_ID']);
      $memberData = $memberObject->getId();
      if ($memberData) {
        // print_r($memberData);die;
        $emplpyeeResult = $memberData->fetch_object();
        // print_r($emplpyeeResult);die;
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
$attendObject = new Members_Attendance;
if($_POST){
  $attendObject->setMember_ID($emplpyeeResult->Member_ID);
  date_default_timezone_set("Africa/Cairo");
  $time = date("H:i:s");
  $attendObject->setAttending($time);
  $result = $attendObject->create();
  if($result){
    header('location:../../Employees/data_members.php');
    die;
  }else{
    echo "error";
  }
}

?>

