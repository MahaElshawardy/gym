<?php
// allow authenticated users and prevent guests
if(empty($_SESSION['partner'])){
    header('location:login.php');die;
}
