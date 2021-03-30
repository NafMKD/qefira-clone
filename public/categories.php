<?php 
session_start();
include 'includes/ls.php';
if(!isset($_GET['c']) || $_GET['c']==""){
	header("location: /qefira-clone/public/");
}
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;

$catagories = $obj_fetch->fetchCatagories("ALL");
$catagories_detail = $obj_fetch->fetchCatagories("INDIVIDUAL", "cat_id/". $_GET['c'])[0];
$items_normal = $obj_fetch->fetchItems("CATAGORIES", "DESC/".$_GET['c']."/1");
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
									<li class="breadcrumb-item">Catagories</li>
									<li class="breadcrumb-item active"><?php echo $catagories_detail['name'];  ?></li>
									<?php if(isset($_GET['r'])): ?>
										<li class="breadcrumb-item active"><?php echo $obj_const->regionConverter($_GET['r']); ?></li>
									<?php endif?>
									<?php if(isset($_GET['f'])): ?>
										<li class="breadcrumb-item active"><?php echo $obj_const->filterIdName($_GET['f']); ?></li>
									<?php endif?>
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
