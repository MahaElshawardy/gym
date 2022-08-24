<?php
session_start();
unset($_SESSION['member']);
if(isset($_COOKIE['remember_me'])){
    setcookie('remember_me','',time()-100,'/');
}
header('location:../../index.php');