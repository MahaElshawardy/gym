<?php
$title = "Employees";
include_once "layout/header.php";
include_once "../app/middleware/authPartner.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
include_once "../app/models/Employee.php";

$employeeObject = new Employee;
$employeeResult = $employeeObject->getFEmployee();
?>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row d-flex align-items-stretch">
              <?php if($employeeResult): ?>
              <?php $employees = $employeeResult->fetch_all(MYSQLI_ASSOC); //print_r($employees);die;?>
              <?php foreach ($employees as $key => $employee) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                    <div class="card bg-light">
                        <div class="card-header text-muted border-bottom-0">
                            <?= $employee['Type'] ?>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?= $employee['Full_Name'] ?></b></h2>
                                    <p class="text-muted text-sm"><b>About: </b><b>Gender</b> <?= $employee['Gender'] ?> / <b>Birthdate</b> <?= $employee['Birthdate'] ?> </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span> Address: <?= $employee['Address'] ?></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: <?= $employee['Phone_Number'] ?> Phone2 #: <?= $employee['Phone_Number2'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../Employees/dist/img/<?= $employee['Personal_Image'] ?>" style="height: 130px;width: 100%;" alt=""
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="profile.php?Employee_ID=<?= $employee['Employee_ID'] ?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
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
