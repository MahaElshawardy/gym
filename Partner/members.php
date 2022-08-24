<?php
$title = "Members";
include_once "layout/header.php";
include_once "../app/middleware/authPartner.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
spl_autoload_register(function($models){
    require '../app/models/' . $models .'.php';
  });
$memberObject = new Member;
$memberResult =$memberObject->getMembers();
?>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
                <?php if($memberResult) : ?>
                <?php $members = $memberResult->fetch_all(MYSQLI_ASSOC); //print_r($members);die;?>
                <?php foreach ($members as $key => $member) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-body pt-1">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="lead"><b><?= $member['Full_Name'] ?></b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> <b>Gender</b> <?= $member['Gender']?> /
                                        <b>Birthdate</b> <?= $member['Birthdate']?> / <b>Height</b>
                                        <?= $member['Height']?> /
                                        <b>Weight</b> <?= $member['Weight']?> / <b>Health Statue</b>
                                        <?= $member['Health_Statue']?>
                                    </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-at"></i></span> Email:
                                            <?= $member['Email']?></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: <?= $member['Phone_Number'] ?> / Phone2 #:
                                            <?= $member['Phone_Number2'] ?></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
              <ul class="pagination justify-content-center m-0">
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item"><a class="page-link" href="#">6</a></li>
                  <li class="page-item"><a class="page-link" href="#">7</a></li>
                  <li class="page-item"><a class="page-link" href="#">8</a></li>
              </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

<?php
include_once "layout/footer.php";
