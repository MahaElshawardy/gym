<?php 
$title = "Profile Trainer | GYM ";
$link = "css/css/ionicons.min.css";
include_once "layout/header.php";
if(empty($_SESSION['member'])){
    header('location:form.php');die;
}
?>
<script src="js/modernizr-2.6.2.min.js"></script>
<?php
include_once "layout/nav.php";
$breadcrumb ="Trainer";
include_once "layout/breadcrumb.php";

spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
  
$memberObject = new Member;
$memberObject->setEmail($_SESSION['member']->Email);
$memberResult = $memberObject->getUserByEmail();
$user = $memberResult->fetch_object();
// print_r($user);die;
//---------------Employee---------------------
$employeeObject = new Employee;
$trainerData =$employeeObject->getFEmployee();
if ($_GET) {
    if (isset($_GET['Employee_ID'])) {
        if (is_numeric($_GET['Employee_ID'])) {
            // check if id exists in your db
			$employeeObject->setEmployee_ID($_GET['Employee_ID']);
			$employeeData = $employeeObject->getTrainer();
            $reviewResult = $employeeObject->getReviewsUser();
			if ($employeeData) {
			  $employeeResult = $employeeData->fetch_object();
			//   print_r($employeeResult);die;
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

if($_POST){
    $reviewObject = new Review;
    $reviewObject->setComment($_POST['Comments']);
    $reviewObject->setMember_ID($_POST['Member_ID']);
    $reviewObject->setTrainer_ID($_POST['Trainer_ID']);
    $result = $reviewObject->create();
    print_r($result);
    if($result){
        $id = $_GET['Employee_ID']; 
        header("location: profileTrainer.php?Employee_ID=$id");die;
    }else{
        echo 'Error';
    }
  }
?>

<div id="fh5co-team-section">
    <div class="container1">
        <div class="description-review-area pb-70">
            <div class="container">
                <div class="description-review-wrapper ">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <img class="img-rev mb-3" src="Employees/dist/img/<?=$employeeResult->Personal_Image?>">
                        <span class="p-2 bd-highlight offset-3" style="font-weight: bold;"><b
                                style="font-size: 20px;color: black;">Name:
                            </b><?=$employeeResult->Full_Name ?></span>
                        <span class="p-2 bd-highlight offset-3" style="font-weight: bold;"><b
                                style="font-size: 20px;color: black;">Email: </b><?=$employeeResult->Email?></span>
                        <span class="p-2 bd-highlight offset-3" style="font-weight: bold;"><b
                                style="font-size: 20px;color: black;">Phone:
                            </b><?=$employeeResult->Phone_Number ?></span>
                    </div>

                    <div class=" description-review-bottom offset-2 w-50 p-3">
                        <div class="description-review-topbar nav text-center">
                            <h1>Review</h1>
                        </div>
                        <div id="des-details3">
                            <div class="rattings-wrapper">
                                <?php if($reviewResult):?>
                                <?php $reviews = $reviewResult->fetch_all(MYSQLI_ASSOC);  ?>
                                <?php foreach ($reviews as $key => $review) :?>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-author f-right">
                                        <?php $date=date_create($review['Date']);?>
                                            <h3><?= $review['Full_Name']?><span
                                                    style="float: right"><?= date_format($date,"F h:i a")?></span></h3>
                                        </div>
                                    </div>
                                    <p><?= $review['Comment']?></p>
                                </div>
                                <?php endforeach ?>
                                <?php else: ?>
                                <?php echo "<div class='alert alert-warning' > No Reviews Yet </div>"; ?>
                                <?php endif ?>
                            </div>
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :</h3>
                                <div class="ratting-form">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="">Comment</label>
                                            <textarea class="form-control" name="Comments" id="" cols="30" rows="10" required></textarea>
                                        </div>
                                        <input type="hidden" name="Member_ID" id="Member_ID" value="<?=$user->Member_ID?>">
                                        <input type="hidden" name="Trainer_ID" id="Trainer_ID" value="<?=$employeeResult->Employee_ID?>">

                                        <div class="button-box float-right">
                                            <button type="submit"><span>Comment</span></button>
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
    <!-- END fh5co-wrapper -->
    <?php
include_once "layout/footer.php";