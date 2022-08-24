<?php
$title = "Reset Password | GYM ";
include_once "layout/header.php";
include_once "../app/middleware/guestUser.php";
include_once "../app/requests/Validation.php";
include_once "../app/models/Member.php";
include_once "../app/services/mail.php";

if ($_POST) {
    $errors = [];
    $passwordValidation = new Validation('password',$_POST['password']);
    $passwordRequiredResult = $passwordValidation->required();
    if(empty($passwordRequiredResult)){
            $passwordConfrimResult   =  $passwordValidation->confirmed($_POST['password_confirmation']);
            if(!empty($passwordConfrimResult)){
                $errors['password']['confirm'] = $passwordConfrimResult;
            }
    }else{
        $errors['password']['required'] = $passwordRequiredResult;
    }

    // (password_confirmation=>requried )
    $confrimPasswordValidation = new Validation('confrim password',$_POST['password_confirmation']);
    $confrimPasswordRequiredResult = $confrimPasswordValidation->required();
    if(!empty($confrimPasswordRequiredResult)){
        $errors['confirm']['required'] = $confrimPasswordRequiredResult;
    }
    if(empty($errors)){
        // update user password
        // header to login
        $userObject = new Member;
        $userObject->setPassword($_POST['password']);
        $userObject->setEmail($_SESSION['user-email']);
        $result = $userObject->updatePasswordByEmail();
        if($result){
            unset($_SESSION['user-email']);
            $success = "Your Password Has Been Successfully Updated";
            header('location:form.php');die;
        }else{
            $errors['password']['wrong'] = "Something Went Wrong";
        }
    }
}
?>
<div id="fh5co-team-section">
    <div class="container">
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> Reset Password </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post">
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="Enter Your password">
                                                <?php 
                                                    if(!empty($errors['password'])){
                                                        foreach ($errors['password'] as $key => $value) {
                                                            echo "<div class='alert alert-danger'> $value </div>";
                                                        }
                                                    }
                                                ?>
                                                <input class="form-control" type="password" name="password_confirmation"
                                                    placeholder="Confrim Password">
                                                <?php 
                                                    if(!empty($errors['confirm'])){
                                                        foreach ($errors['confirm'] as $key => $value) {
                                                            echo "<div class='alert alert-danger'> $value </div>";
                                                        }
                                                    }
                                                ?>
                                                <div class="button-box">
                                                    <button type="submit"><span>Reset Password</span></button>
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