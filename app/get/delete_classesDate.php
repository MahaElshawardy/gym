<?php
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Class_Date.php";
$classObject = new Class_Date;

if ($_GET) {
  if (isset($_GET['Class_ID'])) {
    if (is_numeric($_GET['Class_ID'])) {
      // check if id exists in your db
      $classObject->setClass_ID($_GET['Class_ID']);
      $classData = $classObject->delete();
      header('location:../../Employees/data_classes_date.php');
      die;

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

?>
