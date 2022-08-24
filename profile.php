<?php
$title = "Profile | GYM ";
include_once "layout/header.php";
include_once "app/middleware/authUser.php";
include_once "app/requests/Validation.php";
spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
$memberObject = new Member;
$memberObject->setEmail($_SESSION['member']->Email);
$memberResult = $memberObject->getUserByEmail();
$user = $memberResult->fetch_object();
// print_r($user);die;

//-------------class Date---------------------------
$classObject = new Member_Class;
$classObject->setMember_ID($user->Member_ID);
$classObject->setStatue(1);
$classResult = $classObject->classesInfo();

// -------------------membership sub----------------------
$membershipObject = new Membership_Subscription;
$membershipObject->setMember_ID($user->Member_ID);
$membershipResult = $membershipObject->getMembershipSub();

// print_r($memberships);die;

// print_r($user);die;
if ($_POST) {
    // $errors = [];
    //validation user password ;
    // required , regx 
    $passwordValidation = new Validation('Password',$_POST['password']);
    $passwordRequiredResult = $passwordValidation->required();
    if(empty($passwordRequiredResult)){
        $passwordConfirmationResult = $passwordValidation->confirmed($_POST['password_confirmation']);
        if(empty($passwordConfirmationResult)){  
            $errors['password'] = 'password';
        }
        
    }
    // $memberObject->setPassword($_POST['new_password']);
    // $result = $memberObject->updatePasswordByEmail();
    // if (empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['weight']) || empty($_POST['height']) || empty($_POST['Health_Statue'])) {
    //     $errors['all'] = "<div class='alert alert-danger'> All Feilds Are Required </div>";
    // }
    $memberObject->setMember_ID($user->Member_ID);
    $memberObject->setPhone_Number($_POST['phone']);
    $memberObject->setPhone_Number2($_POST['phone2']);
    $memberObject->setPassword($_POST['password_confirmation']);
    $result = $memberObject->update();
    if($result){
        header('location:profile.php');die;
    }else{
        echo 'Error';
    }
}
// $result = $memberObject->getUserByEmail();
// $user = $result->fetch_object();
// print_r($user);die;
include_once "layout/nav.php";
$breadcrumb = "Profile";
include_once "layout/breadcrumb.php";
// print_r($_SESSION['member']);die;

//-------------------Food System----------------------
$foodObject = new Food_System;
$foodObject->setMember_ID($user->Member_ID);
$foodResult = $foodObject->read();

?>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="flex">
            <div class="profile-nav col-md-3" style="margin-left: 0;">
                <div class="panel">
                    <div class="user-heading round">
                        <h1><?= $user->Full_Name ?></h1>
                        <p>User</p>
                    </div>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="profilebtn active"><a href="#profile"> <i class="fa fa-user"></i> Profile</a></li>
                        <li class="classbtn"><a href="#class"> <i class="fa fa-calendar"></i> Class Time</a></li>
                        <li class="editbtn "><a href="#edit"> <i class="fa fa-edit"></i> Edit profile</a></li>
                    </ul>
                </div>
            </div>

            <div class="profilejs panel-body bio-graph-info" id="profile">
                <h1>Information</h1>
                <div class="row">
                    <div class="bio-row">
                        <p class="txt"><span>Full Name </span>: <?= $user->Full_Name ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Birthday</span>: <?= $user->Birthdate; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Email </span>: <?= $user->Email; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Mobile </span>: <?= $user->Phone_Number; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Mobile 2 </span>: <?= $user->Phone_Number2; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Gender </span>: <?= $user->Gender; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Weight </span>: <?= $user->Weight; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Height </span>: <?= $user->Height; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Health Statue </span>: <?= $user->Health_Statue; ?></p>
                    </div>
                    <div class="bio-row">
                        <p class="txt"><span>Membership </span> : </p>
                        <?php if($membershipResult):?>
                        <?php $memberships = $membershipResult->fetch_object(); ?>
                        <?= $memberships->Category ?>
                    </div>
                    <?php else: ?>
                        <?php echo '<div class="alert alert-warning" role="alert">Not yet mambership </div>'?>
                    <?php endif ?>
                </div>
                <div>
                    <h1>Food System</h1>
                    <div class="row">
                        <?php if($foodResult): ?>
                        <?php $foods = $foodResult->fetch_object();//print_r($foods);die; ?>
                        <div class="bio-row col-12 ">
                            <p class="txt"><b>Trainer Name :</b> <?= $foods->Full_Name ?></p>
                        </div>
                        <div class="bio-row col-12">
                            <p class="txt"><b>Data :</b> <?= $foods->Data; ?></p>
                        </div>
                        <?php else : ?>
                        <?php echo '<div class="alert alert-warning" role="alert">Not yet food system </div>'?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="hide panel-body bio-graph-info" id="edit">
                <h1>Edit profile</h1>
                <form action="" method="post">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $key => $error) {
                            echo $error;
                        }
                    }
                    if (isset($success)) {
                        echo $success;
                    }
                    ?>
                    <div class="row">
                        <div class="bio-row">
                            <p class="txt"><span>Mobile </span>: <input type="text"
                                    value="<?= $user->Phone_Number?>" name="phone" placeholder="Enter your Mobile">
                            </p>
                        </div>
                        <div class="bio-row">
                            <p class="txt"><span>Mobile 2</span>: <input type="text"
                                    value="<?= $user->Phone_Number2 ?>" name="phone2"
                                    placeholder="Enter your Mobile"></p>
                        </div>
                        <div class="bio-row">
                            <p class="txt"><span>Password </span>: <input type="password" name="password"
                                    placeholder=""></p>
                        </div>
                        <div class="bio-row">
                            <p class="txt"><span>Re-Password </span>: <input type="password"
                                    name="password_confirmation" placeholder=""></p>
                            <?= empty($passwordConfirmationResult) ? "" : "<div class='alert alert-danger'>$passwordConfirmationResult</div>" ; ?>

                        </div>
                    </div>
                    <button type="submit" name="update-profile" class="btn btn-dark float-right">Update</button>
                </form>
            </div>
            <div class="hide panel-body bio-graph-info " id="class">
                <div class="class">
                    <h1>Classes Schedule </h1>
                    <div class="row ">
                        <div class="classtime-table">
                            <table > 
                                <tbody>
                                    <?php if($classResult):?>
                                    <?php $classes = $classResult->fetch_all(MYSQLI_ASSOC);//print_r($classes);?>
                                    <form action="" method="post">
                                        <tr>
                                            <th scope="row" style="width:15%">Saturday</th>
                                            <?php foreach ($classes as $key => $class) : //print_r($classes);die;?>
                                            <?php if($class['Day'] == "Saturday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date=date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">

                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width:15%">Sunday</th>
                                            <?php foreach ($classes as $key => $class) : ?>
                                            <?php if($class['Day'] == "Sunday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date=date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">
                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width:15%">Monday</th>
                                            <?php foreach ($classes as $key => $class) : ?>
                                            <?php if($class['Day'] == "Monday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date=date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">

                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width:15%">Tuesday</th>
                                            <?php foreach ($classes as $key => $class) : ?>
                                            <?php if($class['Day'] == "Tuesday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date=date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">

                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width:15%">Wednesday</th>
                                            <?php foreach ($classes as $key => $class) : ?>
                                            <?php if($class['Day'] == "Wednesday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date=date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">

                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width:15%">Thursday</th>
                                            <?php foreach ($classes as $key => $class) : ?>
                                            <?php if($class['Day'] == "Thursday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date=date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">

                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width:15%">Friday</th>
                                            <?php foreach ($classes as $key => $class) : ?>
                                            <?php if($class['Day'] == "Saturday") : ?>
                                            <td class="hover-bg ts-item">
                                                <h6><?= $class['Name']?></h6>
                                                <h6><?= $class['Trainer']?></h6>
                                                <?php $start_date =date_create($class['Start_Time']);?>
                                                <h6><?= date_format($start_date,"h:i a")?></h6>
                                                <?php $end_date=date_create($class['End_Time']);?>
                                                <h6><?= date_format($end_date,"h:i a")?></h6>
                                            </td>
                                            <?php else : ?>
                                            <td class="hover-bg ts-item">

                                            </td>
                                            <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                    </form>
                                    <?php else : echo'<div class="alert alert-warning " role="alert">Not yet Classes Schedule </div>';?>
                                    <?php endif ?>
                                </tbody>
                            </table>
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