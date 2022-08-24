<?php
// allow authenticated users and prevent guests
if(empty($_SESSION['member'])){
    header('location:form.php');die;
}