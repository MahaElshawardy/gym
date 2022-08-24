<?php
$title = "Dashboard";
include_once "layout/header.php";
include_once "../app/middleware/auth.php";
include_once "layout/nav.php";
include_once "layout/navLeft.php";
if (empty($_SESSION['user'])) {
    unset($_SESSION['member']);
    header('location:login.php');
    die;
}
spl_autoload_register(function($models){
    require '../app/models/' . $models .'.php';
  });
//-------------------get employee ------------
$employeeObject = new Employee;
$employeeObject->setType('Trainer');
$employeeObject->setEmployee_ID($_SESSION['user']->Employee_ID);
$result = $employeeObject->getEmployeesByEmail();
$employee = $result->fetch_object();
$employeeCount = $employeeObject->getEmployeeCount();
$employeesCount = $employeeCount->fetch_object();
// print_r($employee);die;
$employeeResult = $employeeObject->read();
$employeesResult = $employeeObject->getNameMembers();
// ------------------ reviews--------------------
// $reviewObject =new Review;
$reviewResult = $employeeObject->getReviews();
// ----------------------------------------------

// -----------------instance members-------------
$memberObject = new Member;
$memberResult = $memberObject->read();
$memberCount = $memberObject->getMemberCount();
$membersAttending = $memberObject->getMemberAttending();
$membersCount = $memberCount->fetch_object();
$memberAttending = $membersAttending->fetch_object();

// print_r($membersCount);die;
//-------------------Equipments -----------------
$equipmentObject = new Equipment;
$equipmentResult = $equipmentObject->read();
$maintenanceResult = $equipmentObject->getmaintenance();
$equipmentCount = $equipmentObject->getEquipmentCount();
$equipmentsCount = $equipmentCount->fetch_object();

//------------------Classes-------------------------
$classObject = new Classe;
$classResult = $classObject->read();
//-------------------Memberships----------------------
$monyObject = new Mempership;
$monyResult = $monyObject->totalIncome();
$mony = $monyResult->fetch_object();
// print_r($mony);die;
?>
<div class="row">
    <?php
    $Employee_Type = $employee->Type;
    // print_r($Employee_Type);die;
    if ($Employee_Type == "Receptionist"):?>

    <div class="col-md-12">
        <!-- TABLE: MEMBERS -->
        <div class="card">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Members</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0" data-page-length='3'>
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                    <th>Phone Number 2</th>
                                    <th>Birthdate</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>Health_Statue</th>
                                    <th>Status</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th> Name of Parent </th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($memberResult): ?>
                                <?php $members = $memberResult->fetch_all(MYSQLI_ASSOC)?>
                                <?php foreach($members as $key =>$member): ?>
                                <tr>
                                    <td><a href="#"><?= $member['Member_ID']?></a></td>
                                    <td><?= $member['Full_Name']?></td>
                                    <td><?= $member['Email']?></td>
                                    <td><?= $member['Phone_Number']?></td>
                                    <td><?= $member['Gender']?></td>
                                    <td><?= $member['Phone_Number2']?></td>
                                    <td><?= $member['Birthdate']?></td>
                                    <td><?= $member['Weight']?></td>
                                    <td><?= $member['Height']?></td>
                                    <td><?= $member['Health_Statue']?></td>
                                    <td><?= $member['Statue']?></td>
                                    <td><?= $member['Category']?></td>
                                    <td><?= $member['Price']?></td>
                                    <td><?= $member['Discount_Percentage']?></td>
                                    <td><?= $member['name_parent']?></td>
                                    <td><?= $member['created_at']?></td>
                                </tr>
                                <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                      </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="add_member.php" class="btn btn-sm btn-info float-left">New Members</a>
                    <a href="data_members.php" class="btn btn-sm btn-secondary float-right">View All Members</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- TABLE: MEMBERS -->
    </div>
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <!-- TABLE: Equipment -->
            <div class="card">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Equipments</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Equipment ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Arrival Date</th>
                                        <th>Name Of Subblier</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Phone Number 2</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($equipmentResult): ?>
                                    <?php $equipments = $equipmentResult->fetch_all(MYSQLI_ASSOC);?>
                                    <?php foreach($equipments as $key =>$equipment): ?>
                                    <tr>
                                        <td><a href="#"><?= $equipment['Equipment_ID'] ?></a></td>
                                        <td><?= $equipment['name_equipment'] ?></td>
                                        <td><?= $equipment['Price'] ?></td>
                                        <td><?= $equipment['ArrivalDate'] ?></td>
                                        <td><?= $equipment['Name'] ?></td>
                                        <td><?= $equipment['Address'] ?></td>
                                        <td><?= $equipment['Phone_Number'] ?></td>
                                        <td><?= $equipment['phone_Number2'] ?></td>
                                        <td><?= $equipment['Email'] ?></td>

                                    </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="add_equipment.php" class="btn btn-sm btn-info float-left">New Equipment</a>
                        <a href="data_equipments.php" class="btn btn-sm btn-secondary float-right">View All
                            Equipment</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            <!-- TABLE: Equipment -->

            <!-- TABLE: Maintenance  -->
            <div class="card">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Equipment Maintenance</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Maintenance ID</th>
                                        <th>Equipment Name</th>
                                        <th>Date</th>
                                        <th>info</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($maintenanceResult): ?>
                                    <?php $maintenances = $maintenanceResult->fetch_all(MYSQLI_ASSOC);?>
                                    <?php foreach($maintenances as $key =>$maintenance): ?>
                                    <tr>
                                        <td><a href="#"><?= $maintenance['Maintenance_ID'] ?></a></td>
                                        <td><?= $maintenance['Name'] ?></td>
                                        <td><?= $maintenance['Date'] ?></td>
                                        <td><?= $maintenance['info'] ?></td>

                                    </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="add_maintenance.php" class="btn btn-sm btn-info float-left">New Maintenance</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            <!-- TABLE: Maintenance  -->
            <!-- TABLE: Maintenance  -->
            <div class="card">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Classes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Classes ID</th>
                                        <th>Name</th>
                                        <th>Cost</th>
                                        <th>Info</th>
                                        <th>Duration Per Time In Minuts</th>
                                        <th>Period In Weeks</th>
                                        <th>Number Of Sessions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($classResult): ?>
                                    <?php $classes = $classResult->fetch_all(MYSQLI_ASSOC);?>
                                    <?php foreach($classes as $key =>$class): ?>
                                    <tr>
                                        <td><a href="#"><?= $class['Class_ID'] ?></a></td>
                                        <td><?= $class['Name'] ?></td>
                                        <td><?= $class['Cost'] ?></td>
                                        <td><?= $class['Info'] ?></td>
                                        <td><?= $class['Duration_Per_Time_In_Minuts'] ?></td>
                                        <td><?= $class['Period_In_Weeks'] ?></td>
                                        <td><?= $class['Number_Of_Sessions'] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="add_classes.php" class="btn btn-sm btn-info float-left">New Classes</a>
                        <a href="data_classes.php" class="btn btn-sm btn-secondary float-right">View All Classes</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>
            <!-- TABLE: Maintenance  -->
        </div>
        <!-- Left col -->
        <!-- Right col -->
        <div class="col-md-4">
            <!-- Info Right col -->
            <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Members ( Attending )</span>
                    <span class="info-box-number"><?= $membersCount->member_count ?> ( <?= $memberAttending->member_count?> )</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fa fa-user"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Employees</span>
                    <span class="info-box-number"><?= $employeesCount->employees_count ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fa fa-cogs"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Equipments</span>
                    <span class="info-box-number"><?= $equipmentsCount->equipments_count?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Income</span>
                    <span class="info-box-number"><?= $mony->price?><b> EGP</b></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- Info Right col -->

            <!-- TABLE: Employee -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employees</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        <?php if($employeeResult): ?>
                        <?php $employees = $employeeResult->fetch_all(MYSQLI_ASSOC);?>
                        <?php foreach ($employees as $key => $employee) :?>
                        <li>
                            <img src="dist/img/<?= $employee['Personal_Image']?>" style="height:85px;" alt="User Image">
                            <a class="users-list-name"
                                href="show_employee.php?Employee_ID=<?= $employee['Employee_ID']?>"><?= $employee['Full_Name']?></a>
                        </li>
                        <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                    <!-- /.users-list -->
                </div>

                <div class="card-footer text-center">
                    <a href="data_employees.php">View All Employees</a>
                </div>

            </div>
            <!-- TABLE: Employee -->
        </div>
        <!-- Right col -->
    </div>
    <?php else: ?>
    <?php //print_r($employee);die;?>
    <div class="col-md-8">
        <!-- TABLE: Food  -->
        <div class="card">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Food System</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>Food System ID</th>
                                    <th>Data</th>
                                    <th>Date</th>
                                    <th>Name Of Members</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $employeeResult =$employeeObject->dataFoodSystem();
                                if($employeeResult):?>
                                <?php $employees = $employeeResult->fetch_all(MYSQLI_ASSOC);?>
                                <?php foreach ($employees as $key => $employee) :?>
                                <tr>
                                    <td><a href="#"><?= $employee['Food_System_ID']?></a></td>
                                    <td><?= $employee['Data']?></td>
                                    <td><?= $employee['Date']?></td>
                                    <td><?= $employee['name_member']?></td>

                                </tr>
                                <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="addFoodSystem.php?Employee_ID=<?= $employee['Employee_ID']?>"
                        class="btn btn-sm btn-info float-left">New Food System</a>
                    <a href="dataFoodSystem.php?Employee_ID=<?= $employee['Employee_ID']?>"
                        class="btn btn-sm btn-secondary float-right">View All Food System</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- TABLE: Food  -->
        <!-- /.card -->
        <div class="col-md-12">
        <!-- TABLE: MEMBERS -->
        <div class="card">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Members</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0" data-page-length='3'>
                            <thead>
                                <tr>
                                    <th>Member ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                    <th>Phone Number 2</th>
                                    <th>Birthdate</th>
                                    <th>Weight</th>
                                    <th>Height</th>
                                    <th>Health_Statue</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($employeesResult): ?>
                                <?php $membersName = $employeesResult->fetch_all(MYSQLI_ASSOC)?>
                                <?php foreach($membersName as $key =>$member): ?>
                                <tr>
                                    <td><a href="#"><?= $member['Member_ID']?></a></td>
                                    <td><?= $member['Full_Name']?></td>
                                    <td><?= $member['Email']?></td>
                                    <td><?= $member['Phone_Number']?></td>
                                    <td><?= $member['Gender']?></td>
                                    <td><?= $member['Phone_Number2']?></td>
                                    <td><?= $member['Birthdate']?></td>
                                    <td><?= $member['Weight']?></td>
                                    <td><?= $member['Height']?></td>
                                    <td><?= $member['Health_Statue']?></td>
                                    <td><?= $member['created_at']?></td>
                                </tr>
                                <?php endforeach ?>
                                <?php endif ?>
                            </tbody>
                        </table>
                      </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="data_membersTrainer.php" class="btn btn-sm btn-secondary float-right">View All Members</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
        <!-- TABLE: MEMBERS -->
    </div>
    </div>
    <div class="col-md-4">
        <!-- Review LIST -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reviews</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pr-2">
                    <?php if($reviewResult): ?>
                    <?php $reviews = $reviewResult->fetch_all(MYSQLI_ASSOC);?>
                    <?php foreach ($reviews as $key => $review): ?>
                    <li class="item">
                        <div class="product-info ml-2">
                            <a href="#" class="product-title"><?= $review['Full_Name']?>
                                <span class="product-description">
                                    <?= $review['Comment']?>
                                </span>
                                <span class="product-description">
                                    <?= $review['Date']?>
                                </span>
                            </a>
                        </div>
                    </li>
                    <?php endforeach ?>
                    <?php else: ?>
                    <?php echo "<div class='alert  text-center w-100' > No Reviews Yet </div>"; ?>
                    <?php endif ?>
                    <!-- /.item -->
                </ul>
            </div>
        </div>
        <!-- Review LIST -->
    </div>
    <?php endif ?>
</div>

<?php
include_once "layout/footer.php";
