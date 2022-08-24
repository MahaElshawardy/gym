<?php
include_once "../app/models/Partner.php";
$employeeObject = new Partner;
$employeeObject->setEmail($_SESSION['partner']->Email);
$result = $employeeObject->getUserByEmail();
// print_r($result);die;
$employee = $result->fetch_object();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: black;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" style="background: black;">
        <img src="dist/img/logo1.png" alt="GYM" class=" brand-text font-weight-light" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 pt-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/boxed-bg.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=
             $employee->Name;
            // print_r($_SESSION['user']);
             ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar " style="background: black;" type="search"
                    placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-dark">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <a href="index.php" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="members.php" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Members</p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="employee.php" class="nav-link">
                        <i class="fa fa-user nav-icon"></i>
                        <p>Employees</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> <span><?php if(isset($icon)){echo $icon;} ?></span></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
