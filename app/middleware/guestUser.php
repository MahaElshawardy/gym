<?php

// allow guests and prevent authenticated users
if(!empty($_SESSION['member'])){
    header('location:index.php');die;
}