<?php
// include "../../User/layout/errors/404.php"
session_start();
if(!isset($_POST['login'])){
    header('location:../../User/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Member.php";
// // validation
// // email => required , regex ,
// if(isset($_POST['login'])){
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
    $userObject = new Member;
    $userObject->setEmail($_POST['email']);
    $userObject->setPassword($_POST['password']); // 123
    $result = $userObject->login(); // one user || no user
    if($result){
        // correct credentionals
        // print_r($result);die;
        $user = $result->fetch_object();
       
        if($user->Statue == 1){ // verified
            // status => 1 => home
            // status => 0 => check code page
            // status => 2 => alert with block message
            // home
            if(isset($_POST['remember_me'])){
                setcookie('remember_me',$_POST['email'],time() + (24*60*60) * 30 * 12 , '/');
            }
            $_SESSION['member'] = $user;
            header('location:../../index.php');die;
        } elseif($user->Statue == 0){ // not verified
            // check code
            $_SESSION['user-email'] = $_POST['email'];
            // print_r($_SESSION['user-email']);die;
            header('location:../../check-code.php');die;
        }else{
            // 2 block
            // error
            $_SESSION['errors']['email']['block'] = "Sorry , Your Account Has Been Blocked";
        }
    }else{
        $_SESSION['errors']['email']['wrong'] = "Failed Attempt";// return flase
    }
}
// print_r($_SESSION);


header('location:../../form.php');//print error to login user
// }