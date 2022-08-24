<?php
$title = "Contact | GYM ";
include_once "layout/header.php";
include_once "layout/nav.php";
$breadcrumb = " Contact Us ";
include_once "layout/breadcrumb.php";
?>

		<div id="fh5co-contact">
			<div class="container">
				<form action="#">
					<div class="row">
						<div class="col-md-6 animate-box">
							<h3 class="section-title">Our Address</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet cum corporis temporibus ipsum aliquid iure, odio repudiandae, in soluta aspernatur deleniti
								 cumque dicta provident minima? Accusamus optio quam velit alias!</p>
							<ul class="contact-info">
								<li><i class="icon-location-pin"></i>198 West 21th Street</li>
								<li><i class="icon-phone2"></i>+ 1111 2222 98</li>
								<li><i class="icon-mail"></i><a href="#">info@THEGYM.com</a></li>
								<li><i class="icon-globe2"></i><a href="#">www.THEGYM.com</a></li>
							</ul>
						</div>
						<div class="col-md-6 animate-box">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Send Message" class="btnsend">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
<?php
include_once "layout/footer.php";
?>

