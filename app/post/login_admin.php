<?php
session_start();
if(!isset($_POST['loginAdmin'])){
    header('location:../../Employees/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Employee.php";
// // validation
// // email => required , regex ,
$emailValidation = new Validation('email',$_POST['email']);
$emailRequriedResult = $emailValidation->required();
if(empty($emailRequriedResult)){
    $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
    $emailRegExResult  = $emailValidation->regex($emailPattern);
    if(!empty($emailRegExResult)){
        $_SESSION['errors']['email']['regex'] = $emailRegExResult;
    }
 }else{
    $_SESSION['errors']['email']['required'] = $emailRequriedResult;
}

// password => required , regex
$passwordValidation = new Validation('password',$_POST['password']);
$passwordRequiredResult = $passwordValidation->required();
if(!empty($passwordRequiredResult)){
    $_SESSION['errors']['password']['required'] = $passwordRequiredResult;
}
// print_r($_SESSION);die;
// if no errors 
if(empty($_SESSION['errors'])){
    // search in db
    $userObject = new Employee;
    $userObject->setEmail($_POST['email']);
    $userObject->setPassword($_POST['password']); // 123
    $result = $userObject->login(); // one user || no user
    if($result){
        // correct credentionals
        $user = $result->fetch_object();
        if ($user) {
            $_SESSION['user'] = $user;
            header('location:../../Employees/index.php');die;
        }
        
    }else{
        $_SESSION['errors']['email']['wrong'] = "Failed Attempt";// return flase
    }
}
// print_r($_SESSION);


header('location:../../Employees/login.php');//print error to login user
