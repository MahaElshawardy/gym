<?php
$title = "Login";
include_once "layout/header.php";
include_once "../app/middleware/guest.php";
?>
<section class="content">
    <div class="container-fluid ">
        <div class="row mt-5">
            <!-- left column -->
            <div class="col-md-12 mt-5">
                <!-- jquery validation -->
                <div class="card col-md-6 offset-3 mt-5 ">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="../app/post/login_admin.php" method="post" id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Email">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                        </div>
                        <?php
                            if (!empty($_SESSION['errors']['email'])) {
                                foreach ($_SESSION['errors']['email'] as $key => $value) {
                                    echo "<div class='alert alert-danger'>$value</div>";
                                }
                            }
                            if (!empty($_SESSION['errors']['password'])) {
                                foreach ($_SESSION['errors']['password'] as $key => $value) {
                                    echo "<div class='alert alert-danger'>$value</div>";
                                }
                            }
                            ?>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="loginAdmin">Login</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?php include_once "layout/footer.php";
