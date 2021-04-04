<?php if(isset($_GET['q']) && !isset($_GET['f'])): 
	$search_items = $obj_fetch->fetchItems("SEARCHRESULT", "BYDATEFILTER/DESC/".$_GET['q']);
	$cnt1=0;
	?>
	<?php if(count($search_items)!=0): ?>
		<?php foreach ($search_items as $key ): 
			$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
			?>
			<?php if($key['isactive']==1):?>
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
			<?php else: $cnt1++;?>
			<?php endif?>
		<?php endforeach ?>
	<?php else: ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything related to "<?php echo $_GET['q']; ?>" in our database!</h5>
		</div>
	<?php endif ?>
	<?php if(count($search_items)!=0): ?>
		<?php if(count($search_items)==$cnt1): ?>
			<div class="callout callout-danger">
				<h5>oops, we can't find anything related to "<?php echo $_GET['q']; ?>" in our database!</h5>
			</div>
		<?php endif ?>
	<?php endif ?>
<?php elseif(isset($_GET['q']) && isset($_GET['f'])):
	$newfil = $obj_const->filterId($_GET['f']);
	$search_items = $obj_fetch->fetchItems("SEARCHRESULT", $newfil[0]."/".$newfil[1]."/".$_GET['q']);
	$cnt2=0;
	?>
	<?php if(count($search_items)!=0): ?>
		<?php foreach ($search_items as $key ): 
			$filepath = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$key['item_id'])[0];
			?>
			<?php if($key['isactive']==1):?>
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
			<?php else: $cnt2++;?>
			<?php endif?>
		<?php endforeach ?>
	<?php else: ?>
		<div class="callout callout-danger">
			<h5>oops, we can't find anything related to "<?php echo $_GET['q']; ?>" in our database!</h5>
		</div>
	<?php endif ?>
	<?php if(count($search_items)!=0): ?>
		<?php if(count($search_items)==$cnt2): ?>
			<div class="callout callout-danger">
				<h5>oops, we can't find anything related to "<?php echo $_GET['q']; ?>" in our database!</h5>
			</div>
		<?php endif ?>
	<?php endif ?>
<?php endif ?>
