<?php
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Food_System.php";
$foodObject = new Food_System;

if ($_GET) {
  if (isset($_GET['Food_System_ID'])) {
    if (is_numeric($_GET['Food_System_ID'])) {
      // check if id exists in your db
      $foodObject->setFood_System_ID($_GET['Food_System_ID']);
      $foodData = $foodObject->delete();
      header('location:../../Employees/dataFoodSystem.php');
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
