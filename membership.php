<?php
$title = "MamberShips | GYM ";
include_once "layout/header.php";
include_once "layout/nav.php";
$breadcrumb = "Mamber Ships";
include_once "layout/breadcrumb.php";

spl_autoload_register(function($models){
    require 'app/models/' . $models .'.php';
  });
//---------------get memberships------------
$memberShipObject = new Mempership;
$memberShips = $memberShipObject->read();
$memberShipResult = $memberShips->fetch_all(MYSQLI_ASSOC);
// print_r($memberShipResult);
if(!empty($_SESSION['member'])){
$memberObject = new Member;
$memberObject->setEmail($_SESSION['member']->Email);
$memberResult = $memberObject->getUserByEmail();
$user = $memberResult->fetch_object(); 

}
if($_POST){
if(empty($user)){
    header('location:form.php');die;
}
$subscriptionObject = new Membership_Subscription;
$subscriptionObject->setMembership_ID($_POST['membership']);
$subscriptionObject->setMember_ID($user->Member_ID);
$result = $subscriptionObject->create();
if($result){
    header('location:profile.php');die;
}else{
    echo "Error";
}
}


?>


<!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($memberShipResult as $key => $membership) : ?>
                    <div class="col-lg-4 col-md-8">
                        <form action="" method="post">
                            <div class="ps-item">
                                <h3><?= $membership['Category']?></h3>
                                <!-- <input type="hidden" name="membership" value="<?=$membership['Mempership_ID']?>"> -->
                                <div class="pi-price">
                                    <h2><?= $membership['Price']?> EGP</h2>
                                    <span><?= $membership['Period']?></span>
                                </div>
                                <ul>
                                    <li>Discount For Classes : <?= $membership['Discount_Percentage']?><b> % </b></li>
                                </ul>
                                <button type="submit" name="membership" class="primary-btn pricing-btn offset-3"value="<?=$membership['Mempership_ID']?>" style="border:none;">Enroll now</button>
                            </div>
                        </form>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<!-- Pricing Section End -->

<?php 
include_once "layout/footer.php";   