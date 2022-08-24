<?php
session_start();
if(!isset($_POST['add'])){
    header('location:../../Empoyees/layout/errors/404.php');die;
}
include_once "../requests/Validation.php";
include_once "../models/Member.php";

// // validation
//name
$userNameValidation = new Validation('name',$_POST['name']);
$userNameRequiredResulte = $userNameValidation->required();
if(empty($userNameRequiredResulte)){
    $regx = "/^([a-zA-Z' ]+)$/";
    $userNameRegx = $userNameValidation->regex($regx);
    if(!empty($userNameRegx)){
        $_SESSION['errors']['name']['regex']= $userNameRegx;
    }
}else{
    $_SESSION['errors']['name']['required'] = $userNameRequiredResulte;
}

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
if(empty($passwordRequiredResult)){
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
    $passwordRegExResult   = $passwordValidation->regex($passwordPattern);
    if(!empty($passwordRegExResult)){
        $_SESSION['errors']['password']['regex'] = $passwordRegExResult;
    }
}else{
    $_SESSION['errors']['password']['required'] = $passwordRequiredResult;
}

// phone => required , regex ,unique
$phoneValidation = new Validation('phone1',$_POST['phone1']);
$phoneRequiredResult = $phoneValidation->required();
if(empty($phoneRequiredResult)){
    $phonePattern = "/^01[0-2,5]{1}[0-9]{8}$/";
    $phoneRegExResult   = $phoneValidation->regex($phonePattern);
    if(!empty($phoneRegExResult)){
        $_SESSION['errors']['phone1']['regex'] = $phoneRegExResult;
    }
}else{
    $_SESSION['errors']['phone1']['required'] = $phoneRequiredResult;
}

// phone2 => required , regex ,unique
$phoneValidation = new Validation('phone2',$_POST['phone2']);
$phoneRequiredResult = $phoneValidation->required();
if(empty($phoneRequiredResult)){
    $phonePattern = "/^01[0-2,5]{1}[0-9]{8}$/";
    $phoneRegExResult   = $phoneValidation->regex($phonePattern);
    if(!empty($phoneRegExResult)){
        $_SESSION['errors']['phone2']['regex'] = $phoneRegExResult;
    }
}else{
    $_SESSION['errors']['phone2']['required'] = $phoneRequiredResult;
}



// date => required
$dateValidation = new Validation('date',$_POST['date']);
$dateRequiredResult = $dateValidation->required();
if(!empty($dateRequiredResult)){
    $_SESSION['errors']['date']['regex'] = $dateRequiredResult;
}

// weight => required
$weightValidation = new Validation('weight',$_POST['weight']);
$weightRequiredResult = $weightValidation->required();
if(!empty($weightRequiredResult)){
    $_SESSION['errors']['date']['regex'] = $weightRequiredResult;
}

// height => required
$heightValidation = new Validation('weight',$_POST['weight']);
$heightRequiredResult = $heightValidation->required();
if(!empty($heightRequiredResult)){
    $_SESSION['errors']['date']['regex'] = $heightRequiredResult;
}

// height => required
$healthValidation = new Validation('Health',$_POST['Health_Statue']);
$healthRequiredResult = $healthValidation->required();
if(!empty($healthRequiredResult)){
    $_SESSION['errors']['Health']['regex'] = $healthRequiredResult;
}
// print_r($_SESSION);die;
// if no errors 
if(empty($_SESSION['errors'])){
//     // search in db
// print_r($_SESSION['errors']);die;
    $userObject = new Member;
    $userObject->setFull_Name($_POST['name']);
    $userObject->setEmail($_POST['email']);
    $userObject->setPassword($_POST['password']);
    $userObject->setPhone_Number($_POST['phone1']);
    $userObject->setPhone_Number2($_POST['phone2']);
    $userObject->setGender($_POST['gender']);
    $userObject->setBirthdate($_POST['date']);
    $userObject->setWeight($_POST['weight']);
    $userObject->setHeight($_POST['Height']);
    $userObject->setHealth_Statue($_POST['Health_Statue']);
    $userObject->setMempership_ID($_POST['Mempership_ID']);
    $userObject->setParent_ID($_POST['Parent_ID']);
    $userObject->setParent_Member_ID($_POST['Parent_Member_ID']);
    $code = rand(10000,99999);
    $userObject->setCode($code);
    $result = $userObject->create();
    // print_r($result);die;
    if($result){
        // send mail with code
        // mail to => $_POST['email']
        // mail subject => verification code
        // mail body => hello name , your verification code is:12345 thank u.
        $subject = "verifcation Code";
        $body = "Hello {$_POST['name']} <br> your verification code is:<br>$code</br> thank you.";
        $mail = new mail($_POST['email'],$subject,$body);
        $mailResult = $mail->send();
        if($mailResult){
            // header to check code page
            // store email in session
            header('location:data_members.php');die;
        }else{
            $error = "<div class='alert alert-danger'> Try Again Later </div>";
        }
        // $error = "<div class='alert alert-danger'> insert </div>";
        
    }else{
        $error = "<div class='alert alert-danger'> Try Again Later.. </div>";
    }
}
// print_r($_SESSION);


header('location:../../Employees/add_member.php');//print error to login user
