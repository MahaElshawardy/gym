<?php
include_once "../../Employees/layout/header.php";
include_once "../middleware/auth.php";
include_once "../models/Membership_Subscription.php";
$subscriptionObject = new Membership_Subscription;

if ($_GET) {
  if (isset($_GET['Membership_Subscription_ID'])) {
    if (is_numeric($_GET['Membership_Subscription_ID'])) {
      // check if id exists in your db
      $subscriptionObject->setMembership_Subscription_ID($_GET['Membership_Subscription_ID']);
      $subData = $subscriptionObject->delete();
      header('location:../../Employees/data_memberships_subscription.php');
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
