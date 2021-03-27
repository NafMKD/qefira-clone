<?php 
session_start();
include 'autoloader.php';
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
if(!isset($_GET['i']) || $_GET['i']==""){
	header("location: /qefira-clone/public/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'includes/header.php'; ?>  
</head>
<body class="hold-transition layout-top-nav layout-footer-fixed" style="background: #F0F0F0;">
	<div class="wrapper">

		<?php include 'includes/navbars.php'; ?>

		<div class="content-wrapper">

			<div class="content-header">
				<div class="content-header">
					<div class="container">
						<div class="row mb-2">
							<div class="col-md-9">
								<ol class="breadcrumb float-md-left">
									<li class="breadcrumb-item"><a href="/qefira-clone/public/">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Detail</a></li>
									<li class="breadcrumb-item active"><?php if(isset($_GET['i'])){echo $_GET['i']; } ?></li>
								</ol>
								
								<a href="#" id="detailBack" class="float-md-right mr-5">
									<i class="fas fa-angle-left mr-1"></i>
									Back
								</a>
							</div>
							<div class="col-md-3">
								<h5 class="m-0 text-dark"> Seller Information </h5>
							</div>
						</div>
					</div>
				</div>

				<div class="content" >
					<div class="container">
						<div class="row">

							<div class="col-md-9">
								<?php include 'includes/detail/detail.php'; ?>
							</div>
							<div class="col-md-3">
								<?php include 'includes/detail/contact.php';?>
							</div>
						</div>
					</div>
					
				</div>

			</div>

			<br><br><br>
			<?php include 'includes/footer.php'; ?>
		</div>

		<?php include 'includes/script.php'; ?>
	</body>
	</html>
