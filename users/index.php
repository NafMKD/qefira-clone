<?php 
session_start();
include 'autoloader.php';
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
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
				<div class="container">
					<div class="row mb-2">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<h1 class="m-0 text-secondary"> Buy & sell on Ethiopia's safest classifieds </h1>
						</div>
					</div>
				</div>
			</div>

			<div class="content" >
				<center><h3>Premium Ads</h3></center>
				<hr>
				<div class="row ml-3 mr-3">
					<div class="col-md-2">
						<div class="position-relative p-1 bg-white" style="height: auto;">
							<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
							<div class="ribbon-wrapper ribbon-lg">
								<div class="ribbon text-lg" style="background: #DDA549;">
									Gold
								</div>
							</div>
							Protien Powder <br/> Br. 3,800 
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative p-1 bg-white" style="height: auto;">
							<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
							<div class="ribbon-wrapper ribbon-lg">
								<div class="ribbon text-lg" style="background: #DDA549;">
									Gold
								</div>
							</div>
							Protien Powder <br/> Br. 3,800 
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative p-1 bg-white" style="height: auto;">
							<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
							<div class="ribbon-wrapper ribbon-lg">
								<div class="ribbon text-lg" style="background: #DDA549;">
									Gold
								</div>
							</div>
							Protien Powder <br/> Br. 3,800 
						</div>
					</div>
					<div class="col-md-2">
						<div class="position-relative p-1 bg-white" style="height: auto;">
							<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
							<div class="ribbon-wrapper ribbon-lg">
								<div class="ribbon text-lg" style="background: #DDA549;">
									Gold
								</div>
							</div>
							Protien Powder <br/> Br. 3,800 
						</div>
					</div>

					<div class="col-md-2">
						<div class="position-relative p-1 bg-white" style="height: auto;">
							<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
							<div class="ribbon-wrapper ribbon-lg">
								<div class="ribbon text-lg" style="background: #DDA549;">
									Gold
								</div>
							</div>
							Protien Powder <br/> Br. 3,800 
						</div>
					</div>

					<div class="col-md-2">
						<div class="position-relative p-1 bg-white" style="height: auto;">
							<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
							<div class="ribbon-wrapper ribbon-lg">
								<div class="ribbon text-lg" style="background: #DDA549;">
									Gold
								</div>
							</div>
							Protien Powder <br/> Br. 3,800 
						</div>
					</div>
				</div>
				<hr>
				<center><h3>Free Ads</h3></center>
				<hr>
				<div class="container">
					<div class="row ml-3 mr-3">
						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-warning">
										New
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>
						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-danger" >
										Few Left
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>

						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-success" >
										Best Offer
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>

						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-warning">
										New
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="container">
					<div class="row ml-3 mr-3">
						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-warning">
										New
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>
						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-danger" >
										Few Left
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>

						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-success" >
										Best Offer
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
						</div>

						<div class="col-md-3">
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<img src="../assets/dist/img/hacking.jpg"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg bg-warning">
										New
									</div>
								</div>
								Protien Powder <br/> Br. 3,800 
							</div>
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
