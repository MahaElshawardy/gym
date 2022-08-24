<?php
$title = "Forget Password | GYM ";
include_once "layout/header.php";
include_once "../app/middleware/guestUser.php";
include_once "../app/requests/Validation.php";
include_once "../app/models/Member.php";
include_once "../app/services/mail.php";

if ($_POST) {
    // validation
    // email => required , regex ,
    $errors = [];
    $emailValidation = new Validation('email',$_POST['email']);
    $emailRequriedResult = $emailValidation->required();
    if(empty($emailRequriedResult)){
        $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
        $emailRegExResult  = $emailValidation->regex($emailPattern);
        if(!empty($emailRegExResult)){
            $errors['email-regex'] = $emailRegExResult;
        }
    }else{
        $errors['email-required'] = $emailRequriedResult;
    }
    // search on email in db
    if (empty($errors)) {
        $userobject = new Member;
        $userobject->setEmail($_POST['email']);
        $result = $userobject->getUserByEmail();
        // print_r($result);die;
        if ($result) {
            // , save code 
            // send code
            // , header check-code.php
            $user= $result->fetch_object();
            $code = rand(10000,99999);
            $userobject->setCode($code);
            $updateResult = $userobject->updateCodeByEmail();
            if ($updateResult) {
                // header
                $subject = "verifcation Code";
                $body = "Hello {$_POST['name']} <br> your verification code is:<br>$code</br> thank you.";
                $mail = new mail($_POST['email'],$subject,$body);
                $mailResult = $mail->send();
                if($mailResult){
                    // header to check code page
                    // store email in session
                    $_SESSION['user-email'] = $_POST['email'];
                    header('location:check-code.php?page=forget');die; 
                } else {
                    $errors['try-again'] = "<div class='alert alert-danger'> Try Again Later </div>";
                }
            } else {
                $errors['some-wrong'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        } else {
            $errors['email-wrong'] = "<div class='alert alert-danger'> This email dosen't match our records </div>";
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
                                    <h4> Forget Password </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post">
                                                <input class="form-control" type="email" name="email"
                                                    placeholder="Enter Your Email Address">
                                                <?php if (!empty($errors)) : ?>
                                                <?php foreach ($errors as $key => $value) : ?>
                                                <?= $value ?>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                                <div class="button-box">
                                                    <button type="submit"><span>Verify Email Address</span></button>
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