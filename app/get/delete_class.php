<?php
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Classe.php";
$classObject = new Classe;

if ($_GET) {
  if (isset($_GET['Class_ID'])) {
    if (is_numeric($_GET['Class_ID'])) {
      // check if id exists in your db
      $classObject->setClass_ID($_GET['Class_ID']);
      $classData = $classObject->delete();
      header('location:../../Employees/data_classes.php');
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
