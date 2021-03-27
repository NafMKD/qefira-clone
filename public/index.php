<?php 
session_start();
include 'includes/ls.php';
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;

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
						<?php foreach ($premium_ads as $key ): 
							$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
							?>
							
							<div class="position-relative p-1 bg-white" style="height: auto;">
								<a href="detail.php?i=<?php echo $key['item_id'];?>">
								<img src="../files/items/<?php echo $filepath['filePath']; ?>"class="img-fluid">
								<div class="ribbon-wrapper ribbon-lg">
									<div class="ribbon text-lg" style="background: #DDA549;">
										Gold
									</div>
								</div>
								<?php echo ucwords($key['name']); ?> <br/> Br. <?php echo $key['price']; ?>
								</a>
							</div>
							
						<?php endforeach ?>
					</div>
				</div>
				<hr>
				<?php endif ?>
				<center><h3>Free Ads</h3></center>
				<hr>
				<div class="container">
					<div class="row ml-3 mr-3">
						<?php foreach ($free_ads as $key ): 
							$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
							?>
							
							<div class="col-md-3 mt-3">
								<a href="detail.php?i=<?php echo $key['item_id'];?>">
								<div class="position-relative p-1 bg-white" style="height: auto;">
									<img src="../files/items/<?php echo $filepath['filePath']; ?>"class="img-fluid">
									<div class="ribbon-wrapper ribbon-lg">
										<div class="ribbon text-lg bg-warning">
											New
										</div>
									</div>
									<?php echo ucwords($key['name']); ?> <br/> Br. <?php echo $key['price']; ?>
								</div>
								</a>
							</div>
							
						<?php endforeach ?>
					</div>
			</div>

		</div>

		<br><br><br>
		<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/script.php'; ?>
</body>
</html>
