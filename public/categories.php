<?php 
session_start();
include 'includes/ls.php';
if(!isset($_GET['c']) || $_GET['c']==""){
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
							<div class="col-md-3">
								<h5 class="m-0 text-dark"> Filter Results </h5>
							</div>
							<div class="col-md-9">
								<ol class="breadcrumb float-md-left">
									<li class="breadcrumb-item"><a href="/qefira-clone/public/">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Clasifieds</a></li>
									<li class="breadcrumb-item active"><?php if(isset($_GET['c'])){echo $_GET['c']; } ?></li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="content" >
					<div class="container">
						<div class="row">

							<div class="col-md-3">
								<?php include 'includes/categories/filter.php'; ?>
							</div>
							<div class="col-md-8">
								<?php include 'includes/categories/results.php';?>
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
