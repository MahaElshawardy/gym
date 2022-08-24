<header class="header-section">
    <div class="container-fluid">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo1.png" alt="">
            </a>
        </div>
        <div class="container">
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li><a href="about.php">About us</a></li>
                        <li><a href="schedule.php">Classes</a></li>
                        <li><a href="membership.php">Member Ships</a></li>
                        <li><a href="trainer.php">TRAINER</a></li>
                        <li><a href="foodcal.php">Food Calculator</a></li>
                        <?php if (isset($_SESSION['member'])) : ?>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="app/post/logout.php">Logout</a></li>
                        <?php else : ?>
                        <li><a href="form.php">Login/Signup</a></li>
						<?php endif ?>
                        <li><a href="contact.php">Contacts</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
</div>