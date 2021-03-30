<?php if(isset($_GET['c']) && !isset($_GET['r']) && !isset($_GET['f'])): ?>
<?php if(count($items_normal)!=0): ?>
	<?php foreach ($items_normal as $key ): 
		$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
		?>

		<a href="detail.php?i=<?php echo $key['item_id'];?>" style="color: black;">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<img src="../files/items/<?php echo $filepath['filePath']; ?>" style="width: 178px;height: 130px;">
						</div>
						<div class="col-md-8">
							<span class="text-bold"style="font-size: 20px;"><?php echo ucwords($key['name']); ?></span><br>
							<span><i class="fas fa-map-marker"></i> <?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></span><br>
							<span><?php echo $obj_const->timeElapsedString($key['regdate'])." ago";?></span><br><br>
							<span class="text-bold text-red">Br. <?php echo number_format($key['price']);?></span>
						</div>
					</div>

				</div>
			</div>
		</a>

	<?php endforeach ?>
	<?php else: ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in this catagory!</h5>
		</div>
	<?php endif ?>

<?php elseif(isset($_GET['c']) && isset($_GET['r']) && !isset($_GET['f'])):
	$newregion = $obj_fetch->fetchItems("REGION", "BYDATEFILTER/DESC/".$_GET['c']."/".$_GET['r']);
	$cnt=0;
	?>
	<?php if(count($newregion)!=0): ?>
		<?php foreach ($newregion as $key ):
			$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
			?>
			<?php if($key['isactive']==1): ?>
				<a href="detail.php?i=<?php echo $key['item_id'];?>" style="color: black;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<img src="../files/items/<?php echo $filepath['filePath']; ?>" style="width: 178px;height: 130px;">
								</div>
								<div class="col-md-8">
									<span class="text-bold"style="font-size: 20px;"><?php echo ucwords($key['name']); ?></span><br>
									<span><i class="fas fa-map-marker"></i> <?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></span><br>
									<span><?php echo $obj_const->timeElapsedString($key['regdate'])." ago";?></span><br><br>
									<span class="text-bold text-red">Br. <?php echo number_format($key['price']);?></span>
								</div>
							</div>

						</div>
					</div>
				</a>
			<?php else:$cnt++ ?>
			<?php endif?>
		<?php endforeach ?>
	<?php else: ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in <?php echo $obj_const->regionConverter($_GET['r']);?>!</h5>
		</div>
	<?php endif ?>
	<?php if(count($newregion)==$cnt): ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in <?php echo $obj_const->regionConverter($_GET['r']);?>!</h5>
		</div>
	<?php endif ?>

<?php elseif(isset($_GET['c']) && !isset($_GET['r']) && isset($_GET['f'])):
	$arrfilter = $obj_const->filterId($_GET['f']);
	$newfilter = $obj_fetch->fetchItems($arrfilter[0], $arrfilter[1]."/".$_GET['c']);
	$cnt=0;
	?>

	<?php if(count($newfilter)!=0): ?>
		<?php foreach ($newfilter as $key ):
			$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
			?>
			<?php if($key['isactive']==1): ?>
				<a href="detail.php?i=<?php echo $key['item_id'];?>" style="color: black;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<img src="../files/items/<?php echo $filepath['filePath']; ?>" style="width: 178px;height: 130px;">
								</div>
								<div class="col-md-8">
									<span class="text-bold"style="font-size: 20px;"><?php echo ucwords($key['name']); ?></span><br>
									<span><i class="fas fa-map-marker"></i> <?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></span><br>
									<span><?php echo $obj_const->timeElapsedString($key['regdate'])." ago";?></span><br><br>
									<span class="text-bold text-red">Br. <?php echo number_format($key['price']);?></span>
								</div>
							</div>

						</div>
					</div>
				</a>
			<?php else:$cnt++ ?>
			<?php endif?>
		<?php endforeach ?>
	<?php else: ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in this Catagory!</h5>
		</div>
	<?php endif ?>
	<?php if(count($newfilter)==$cnt): ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in this Catagory!</h5>
		</div>
	<?php endif ?>
	
<?php elseif(isset($_GET['c']) && isset($_GET['r']) && isset($_GET['f'])):
	$arrfilter = $obj_const->filterId($_GET['f']);
	$newfilter = $obj_fetch->fetchItems("REGION",$arrfilter[0]."/".$arrfilter[1]."/".$_GET['c']."/".$_GET['r']);
	$cnt=0;
	?>
	<?php if(count($newfilter)!=0): ?>
		<?php foreach ($newfilter as $key ):
			$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
			?>
			<?php if($key['isactive']==1): ?>
				<a href="detail.php?i=<?php echo $key['item_id'];?>" style="color: black;">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<img src="../files/items/<?php echo $filepath['filePath']; ?>" style="width: 178px;height: 130px;">
								</div>
								<div class="col-md-8">
									<span class="text-bold"style="font-size: 20px;"><?php echo ucwords($key['name']); ?></span><br>
									<span><i class="fas fa-map-marker"></i> <?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></span><br>
									<span><?php echo $obj_const->timeElapsedString($key['regdate'])." ago";?></span><br><br>
									<span class="text-bold text-red">Br. <?php echo number_format($key['price']);?></span>
								</div>
							</div>

						</div>
					</div>
				</a>
			<?php else:$cnt++ ?>
			<?php endif?>
		<?php endforeach ?>
	<?php else: ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in <?php echo $obj_const->regionConverter($_GET['r']);?>!</h5>
		</div>
	<?php endif ?>
	<?php if(count($newfilter)==$cnt): ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything in this Catagory!</h5>
		</div>
	<?php endif ?>
<?php endif ?>
