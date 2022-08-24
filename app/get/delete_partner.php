<?php
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Partner.php";
$foodObject = new Partner;

if ($_GET) {
  if (isset($_GET['Partner_ID'])) {
    if (is_numeric($_GET['Partner_ID'])) {
      // check if id exists in your db
      $foodObject->setPartner_ID($_GET['Partner_ID']);
      $foodData = $foodObject->delete();
      header('location:../../Employees/data_partner.php');
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
