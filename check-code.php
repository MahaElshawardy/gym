<?php
$title = "Check code | GYM ";
include_once "layout/header.php";
include_once "../app/middleware/guestUser.php";
if (empty($_SESSION['user-email'])) {
    header('location:login.php');
    die;
}
include_once "../app/models/Member.php";

$availablePages = ['register', 'forget'];
// if url has query string
// check if key exists

if (isset($_GET['page'])) {
    // check if correct value
    if (!in_array($_GET['page'], $availablePages)) {
        header('location:layout/errors/404.php');
        die;
    }
}

if ($_POST) {
    // code => post
    // email => session
    // validation
    // code => required , integer , digits : 5 , min : 10000 , max : 99999
    $errors = [];
    if (empty($_POST['code'])) {
        $errors['required'] = "<div class='alert alert-danger'> Code Is Required </div>";
    } else {
        if (strlen($_POST['code']) != 5) {
            $errors['digits'] = "<div class='alert alert-danger'> Code Must Be 5 Digits </div>";
        }
    }

    if (empty($errors)) {
        $userobject = new Member;
        $userobject->setCode($_POST['code']);
        $userobject->setEmail($_SESSION['user-email']);
        $result = $userobject->checkCode();
        if ($result) {
            // correct code
            $userobject->setStatue(1);
            date_default_timezone_set('Africa/Cairo');
            $userobject->setEmail_verified_at(date('Y-m-d H:i:s'));
            // update email verified at and status
            $updateResult = $userobject->makeUserVerified();
            // print_r($updateResult);
            // die;
            if ($updateResult) {
                // header
                if ($_GET['page'] == 'register') {
                    unset($_SESSION['user-email']);
                    $page = "form.php";
                } elseif ($_GET['page'] == 'forget') {
                    // print_r($updateResult);die;
                    $page = "reset-password.php";
                }
                header("location:$page");
                die;
            } else {
                $errors['something'] = "<div class='alert alert-danger'> Something Went Wrong </div>";
            }
        } else {
            $errors['wrong'] = "<div class='alert alert-danger'> Wrong Code </div>";
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
                                    <h4> Check Code </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="#" method="post">
                                                <input class="form-control" type="number" name="code" min="10000" max="99999" placeholder="Enter Your Verification Code">
                                                <?php if (!empty($errors)) : ?>
                                                    <?php foreach ($errors as $key => $value) : ?>
                                                        <?= $value ?>
                                                    <?php endforeach ?>
                                                <?php endif ?>
                                                <div class="button-box">
                                                    <button type="submit"><span>Check Code</span></button>
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