<?php
$title = "Schedule | GYM ";?>
<?php
include_once "layout/header.php";
include_once "app/middleware/authUser.php";
include_once "layout/nav.php";
$breadcrumb = "Schedule Time";
include_once "layout/breadcrumb.php";
include_once "app/requests/Validation.php";
spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
$memberObject = new Member;
$memberObject->setEmail($_SESSION['member']->Email);
$memberResult = $memberObject->getUserByEmail();
$members = $memberResult->fetch_object();
$dayObject = new Class_Date;
if ($_GET) {
    if (isset($_GET['Class_ID'])) {
        if (is_numeric($_GET['Class_ID'])) {
            // check if id exists in your db
            $dayObject->setClass_ID($_GET['Class_ID']);
            $classData = $dayObject->getDays();
            $roundData = $dayObject->getRounds();
            $ClassName = $dayObject->classesName();
        if ($classData) {
          $classResult = $classData->fetch_all(MYSQLI_ASSOC);
        //   print_r($classResult);die;
            } else {
                header('location:layout/errors/404.php');
                die;
            }
        } else {
            header('location:layout/errors/404.php');
            die;
        }
    } else {
        header('location:layout/errors/404.php');
        die;
    }
  } else {
    header('location:layout/errors/404.php');
    die;
  }

if ($_POST) {
    $memberClass = new Member_Class;
    $memberClass->setRound($_POST['round']);
    $memberClass->setMember_ID($_POST['Member_ID']);
    $memberClass->setClass_ID($_POST['Class_ID']);
    $result = $memberClass->create();
    if($result){
        header('location:profile.php');
        die;
      }else{
        echo "error";
      }

}



?>

<div class="container">
    <div class="row">
        <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
            <?php if($ClassName): ?>
            <?php $classes = $ClassName->fetch_object(); //print_r($classes);die; ?>
            <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300" style="font-weight: bold;font-size: 40px;">
                <?=$classes->Name?><span style="font-size: 15px;color: #84868a;"> COST :<?=$classes->Cost?></span></h2>
            <p data-aos="fade-up" data-aos-delay="400" style="font-weight: bold;"><?=$classes->Info?></p>
            <?php endif ?>
        </div>
        <?php if($roundData):?>
        <?php $rounds = $roundData->fetch_all(MYSQLI_ASSOC)[0]['numOfRounds'];  //print_r($rounds);die; ?>
        <?php for ($i=1; $i <= $rounds; $i++) : ?>
        <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
            <div style="position: relative;margin-top: 33px;">
                <div class=" d-flex flex-column"
                    style="border-radius: 0 0 2px 2px;box-shadow: 6px 0 38px rgba(20,20,20,0.10);padding: 20px;position: relative;">
                    <form action="" method="post">

                        <h2 style="text-align: center;">ROUND <?= $i?> </h2>
                        <input type="hidden" name="round" value="<?=$i?>">
                        <input type="hidden" name="Member_ID" value="<?=$members->Member_ID?>">
                        <input type="hidden" name="Class_ID" value="<?=$classes->Class_ID?>">
                        <?php foreach ($classResult as $key => $day) : //print_r($day);die;?>
                        <?php if ($day['Round'] == $i) :?>
                        <h3 style="position: relative;" class="d-flex flex-row bd-highlight mb-3"><?= $day['Day']?></h3>
                        <?php $start_date=date_create($day['Start_Time']);?>
                        <?php $end_date=date_create($day['End_Time']);?>
                        <span
                        class="badge badge-light d-flex justify-content-center"><?= date_format($start_date,"h:i:a")?>
                        -
                        <?= date_format($end_date,"h:i:a")?></span>
                        <span style="font-weight: 800;" value="<?= $day['Trainer_ID']?>" class="d-flex flex-row bd-highlight mb-3">Trainer Name : <?= $day['Full_Name']?></span>
                        <?php endif ?>
                        <?php endforeach ?>
                        <button type="submit" class="btn btn-dark offset-4 mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <?php endfor ?>
        <?php endif ?>
    </div>
</div>


<?php 
include_once "layout/footer.php"; 