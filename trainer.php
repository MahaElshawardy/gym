<?php
$title = "Trainers | GYM ";
include_once "layout/header.php";
include_once "layout/nav.php";
$breadcrumb ="Trainers";
include_once "layout/breadcrumb.php";

spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });

$employeeObject = new Employee;
$trainerData =$employeeObject->getFEmployee();
?>

		<!-- end: fh5co-parallax -->
		<!-- end:fh5co-hero -->
		<section class="trainer-section spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>OUR Trainer</h2>
							<p>Our Crossfit experts can help you discover new training techniques.</p>
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
									<h5><a href="profileTrainer.php?Employee_ID=<?= $trainer['Employee_ID']?>"><?= $trainer['Full_Name']?> </a> <span>- <?= $trainer['Type']?></span></h5>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					<?php endif ?>
				</div>
			</div>
		</section>
<?php
include_once "layout/footer.php";
?>