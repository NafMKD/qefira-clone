<?php 
session_start();
include 'autoloader.php';
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
$catagories = $obj_fetch->fetchCatagories("ALL");
$premium_ads = $obj_fetch->fetchItems("ADTYPE", "DESC/1/1");
$free_ads = $obj_fetch->fetchItems("ADTYPE", "DESC/0/1");

if(isset($_GET['errSession'])){
	$errSession = "yes";
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
				<?php if(count($premium_ads)!=0):?>
				<center><h3>Premium Ads</h3></center>
				<hr>
				<div class="row ml-3 mr-3">
					<div class="col-md-2">
						<?php $cntp=0;foreach ($premium_ads as $key ): 
							$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
							?>
							<?php if($cntp<6): ?>
							<div class="position-relative p-1 bg-lightblue" style="border-radius: 25px;">
								<a href="detail.php?i=<?php echo $key['item_id'];?>">
								<img src="../files/items/<?php echo $filepath['filePath']; ?>"class="img-fluid" style="height: 260px;border-top-left-radius: 25px;border-top-right-radius: 25px;">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg" style="background: #DDA549;">
										Gold
									</div>
								</div>
								<p class="ml-3"><?php echo ucwords($key['name']); ?></p> <p class="ml-3" style="color: black;"> Br. <?php echo number_format($key['price']); ?></p>
								</a>
							</div>
							<?php endif ?>
						<?php $cntp++;endforeach ?>
					</div>
				</div>
				<hr>
				<?php endif ?>
				<center><h3>Free Ads</h3></center>
				<hr>
				<div class="container">
					<div class="row ml-3 mr-3">
						<?php $cntf=0;foreach ($free_ads as $key ): 
							$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
							?>
							<?php if($cntf<8): ?>
							<div class="col-md-3 mt-3">
								<a href="detail.php?i=<?php echo $key['item_id'];?>">
								<div class="position-relative p-1 bg-lightblue" style="border-radius: 25px;">
									<img src="../files/items/<?php echo $filepath['filePath']; ?>"class="img-fluid" style="height: 260px;border-top-left-radius: 25px;border-top-right-radius: 25px;">
									<div class="ribbon-wrapper ribbon-lg">
										<div class="ribbon text-lg bg-warning">
											New
										</div>
									</div>
									<p class="ml-3"><?php echo ucwords($key['name']); ?></p> <p class="ml-3" style="color: black;"> Br. <?php echo number_format($key['price']); ?></p>
								</div>
								</a>
							</div>
							<?php endif ?>
						<?php $cntf++;endforeach ?>
					</div>
			</div>

		</div>

		<br><br><br>
		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/script.php'; ?>
</body>
</html>
