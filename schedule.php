<?php
$title = "Schedule | GYM ";?>
<?php
include_once "layout/header.php";
include_once "layout/nav.php";
$breadcrumb = "Schedule Time";
include_once "layout/breadcrumb.php";

spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
$classObject =new Classe;
$classData = $classObject->read();
?>

<!-- Class Time Section Begin -->
<section class="classtime-section class-time-table spad">
    <div class="container">
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
<!-- Class Time Section End -->

<?php 
include_once "layout/footer.php";   