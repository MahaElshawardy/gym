<?php

// allow guests and prevent authenticated users
if(!empty($_SESSION['partner'])){
    header('location:index.php');die;
}