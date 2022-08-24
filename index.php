<?php
$title = "Home | GYM ";
$link = "css/stylepartner.css";
include_once "layout/header.php";
include_once "layout/nav.php";
spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
$classObject =new Classe;
$employeeObject = new Employee;
$partnerObject = new Partner;
$trainerData =$employeeObject->getFEmployee();
$classData = $classObject->read(); 
$partnerResult = $partnerObject->read();
?>
<!-- end:fh5co-header -->
<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/home-about.jpg);">
        <div class="desc animate-box">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h2>GET &amp; RESULTS <br>NO-NONSENSE. RESULTS DRIVEN.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="trainer-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>OUR CLASSES</span>
                </div>
            </div>
        </div>
        <div class="row">
          <?php if($classData) : ?>
          <?php $classes = $classData->fetch_all(MYSQLI_ASSOC); //print_r($classes);die; ?>
          <?php foreach ($classes as $key => $class) : ?>
            <div class="col-4">
                <div class="card"
                    style="background: #ffffff3d;position: relative;border-radius: 20px;box-shadow: 1px 1px 40px rgba(0,0,0,0.1);
                    max-width: 300px;display: flex;flex-direction: column;align-items: center;padding: 15px;box-sizing: border-box;margin-bottom: 20px;">
                    <a href="informationSchedule.php?Class_ID=<?=$class['Class_ID']?>" style="text-align: center;"><img src="images/weight-loss.png" style="width: 50%;" alt="">
                        <h2 style="font-weight: bold;font-size: 25px;"><?=$class['Name'] ?></h2>
                    </a>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>
<section class="trainer-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>OUR Trainer</span>
                    <h2>Our Crossfit experts can help you discover new training techniques</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($trainerData): ?>
            <?php $trainers = $trainerData->fetch_all(MYSQLI_ASSOC); //print_r($trainers);die; ?>
            <?php foreach ($trainers as $key => $trainer) :?>
            <div class="col-lg-3 col-sm-6">
                <div class="trainer-item">
                    <div class="ti-pic">
                        <img class="image" src="Employees/dist/img/<?= $trainer['Personal_Image']?>" alt="">
                        <div class="trainer-text" style="bottom: 0;">
                            <h5><a href="profileTrainer.php?Employee_ID=<?= $trainer['Employee_ID']?>"><?= $trainer['Full_Name']?>
                                </a> <span>- <?= $trainer['Type']?></span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <?php endif ?>
        </div>
        <button class="seeall"><a href="trainer.php">See All</a></button>
    </div>
</section>

<section class="trainer-section " style="background: #353434;padding-top: 20px;padding-bottom: 7px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title" style="margin-bottom: 0;">
                    <span>OUR PARTNER</span>
                </div>
            </div>
        </div>
        <div class="row small">
            <div class="imagegroup" style="animation-delay: 1s;  position: relative;">
            <?php if($partnerResult):?>
            <?php $partners = $partnerResult->fetch_all(MYSQLI_ASSOC);//print_r($partners);die; ?>
            <?php foreach ($partners as $key => $partner) :?>
            <img src="Employees/dist/img/PartnerCertifcations/<?=$partner['Certifcations']?>" alt="<?= $partner['Name']?>" style="padding: 0px 29px;">
            <?php endforeach ?>
            <?php endif ?>
            </div>
        </div>
    </div>
  
  

</section>

<?php
include_once "layout/footer.php";
?>