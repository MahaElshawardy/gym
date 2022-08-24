<?php
$title = "Login & Register | GYM ";
include_once "layout/header.php";
include_once "app/middleware/guestUser.php";
include_once "layout/nav.php";
$breadcrumb ="Login & Register";
include_once "layout/breadcrumb.php";
include_once "app/requests/Validation.php";
include_once "app/services/mail.php";
spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
if($_POST){
    $success=[];
    // validation user name ;
    // Rquired , regx ;
    $userNameValidation = new Validation('Full_Name',$_POST['name']);
    $userNameRequiredResulte = $userNameValidation->required();
    $regx = "/^([a-zA-Z' ]+)$/";
    if(empty($userNameRequiredResulte)){
        $userNameRegx = $userNameValidation->regex($regx);
    }

    // //validation user email ;
    // // required , regx , unique
    $emailValidation = new Validation('Email',$_POST['email']);
    $emailRequiredResult = $emailValidation->required();
    $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
    if(empty($emailRequiredResult)){
        $emailRegexResult = $emailValidation->regex($emailPattern);
        if(empty($emailRegexResult)){  
            $emailUniqueResult = $emailValidation->unique('members');
            if(empty($emailUniqueResult)){  
                $success['email'] = 'email';
            }
        }
    }
    
    //validation user phone ;
    // required , regx , unique
    $phoneValidation = new Validation('Phone_Number',$_POST['phone']);
    $phoneRequiredResult = $phoneValidation->required();
    $phonePattern = "/^01[0-2,5]{1}[0-9]{8}$/";
    if(empty($phoneRequiredResult)){
        $phoneRegexResult = $phoneValidation->regex($phonePattern);
        if(empty($phoneRegexResult)){  
            $phoneUniqueResult = $phoneValidation->unique('members');
            if(empty($phoneUniqueResult)){  
                $success['phone'] = 'phone';
            }
        }
    }
    //validation user password ;
    // required , regx 
    $passwordValidation = new Validation('Password',$_POST['password']);
    $passwordRequiredResult = $passwordValidation->required();
    if(!empty($passwordRequiredResult)){
        $success['password'] = 'password';
    }

    // //validation gender ;
    // // required
    // // $genderValidation = new Validation('Gender',$_POST['gender']);
    // // $genderRequiredResult = $genderValidation->required();

    
    // //     // no password validation errors , no email validation errors , no phone validation errors
    // //     // insert user into in db
    if(isset($success['phone'])) {

        // hash for password
        // generate code
        // insert user
        $userObject = new Member;
        $userObject->setFull_Name($_POST['name']);
        $userObject->setEmail($_POST['email']);
        $userObject->setPassword($_POST['password']);
        $userObject->setPhone_Number($_POST['phone']);
        $userObject->setGender($_POST['gender']);
        $userObject->setPhone_Number2($_POST['phone2']);
        $userObject->setBirthdate($_POST['date']);
        $code = rand(10000,99999);
        $userObject->setCode($code);
        $result = $userObject->reg();
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
                $_SESSION['user-email'] = $_POST['email'];
                header('location:check-code.php?page=register');die;
            }else{
                $error = "<div class='alert alert-danger'> Try Again Later </div>";
            }
            // $error = "<div class='alert alert-danger'> insert </div>";
            
        }else{
            $error = "<div class='alert alert-danger'> Try Again Later.. </div>";
        }
    }
}

?>

<!-- end:fh5co-hero -->
<div id="fh5co-team-section">
    <div class="container">
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="app/post/login.php" method="post">
                                                <input type="text" name="email" placeholder="Email">
                                                <input type="password" name="password" placeholder="Password">
                                                <?php
                                                if (!empty($_SESSION['errors']['email'])) {
                                                    foreach ($_SESSION['errors']['email'] as $key => $value) {
                                                        echo "<div class='alert alert-danger'>$value</div>";
                                                    }
                                                }
                                                if (!empty($_SESSION['errors']['password'])) {
                                                    foreach ($_SESSION['errors']['password'] as $key => $value) {
                                                        echo "<div class='alert alert-danger'>$value</div>";
                                                    }
                                                }
                                                ?>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox" name="remember_me">
                                                        <label>Remember me</label>
                                                        <a href="forget-password.php?page=forget">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit" name="login"><span>Login</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form action="#" method="post">
                                                    <?php if(isset($error)){echo $error;} ?>
                                                        <input type="text" name="name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>" placeholder="Full Name">
                                                        <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>" placeholder="Email">
                                                        <!-- print massege error in validation page  -->
                                                        <?= empty($userNameRequiredResulte) ? "" : "<div class='alert alert-danger'>$userNameRequiredResulte</div>" ; ?>
                                                        <?= empty($userNameRegx) ? "" : "<div class='alert alert-danger'>$userNameRegx</div>" ; ?>

                                                        <?= empty($emailRequiredResult) ? "" : "<div class='alert alert-danger'>$emailRequiredResult</div>" ; ?>
                                                        <?= empty($emailRegexResult) ? "" : "<div class='alert alert-danger'>$emailRegexResult</div>" ; ?>
                                                        <?= empty($emailUniqueResult) ? "" : "<div class='alert alert-danger'>$emailUniqueResult</div>" ; ?>
                                                        
                                                        <input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" placeholder="Password">
                                                        <input type="number" name="phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>" placeholder="Phone">
                                                        <?= empty($passwordRequiredResult) ? "" : "<div class='alert alert-danger'>$passwordRequiredResult</div>" ; ?>
                                                       
                                                        <?= empty($phoneRequiredResult) ? "" : "<div class='alert alert-danger'>$phoneRequiredResult</div>" ; ?>
                                                        <?= empty($phoneRegexResult) ? "" : "<div class='alert alert-danger'>$phoneRegexResult</div>" ; ?>
                                                        <?= empty($phoneUniqueResult) ? "" : "<div class='alert alert-danger'>$phoneUniqueResult</div>" ; ?>
                                                        <input type="number" name="phone2" value="<?php if(isset($_POST['phone2'])){echo $_POST['phone2'];}?>" placeholder="Phone2">
                                                        <select name="gender" id="">
                                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] =='Male' ) ? 'selected' : '' ?> value="Male"> Male </option>
                                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] =='Female' ) ? 'selected' : '' ?> value="Female"> Female </option>
                                                        </select><br>
                                                        <!-- <?= empty($genderRequiredResult) ? "" : "<div class='alert alert-danger'>$genderRequiredResult</div>" ; ?> -->
                                                        <input type="date" name="date" value="<?php if(isset($_POST['date'])){echo $_POST['date'];}?>" placeholder="date">
                                                        <div class="button-box">
                                                            <button type="submit"><span>Register</span></button>
                                                        </div>
                                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
include_once "layout/footer.php";
?>