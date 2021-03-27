<?php foreach ($items_normal as $key ): 
	$item_detail = $obj_fetch->fetchItemsDetail("INDIVIDUAL","item_id/".$key['item_id'])[0];
	?>
	
<a href="detail.php?i=<?php echo $item_detail['item_id'];?>" style="color: black;">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-4">
					<img src="../assets/dist/img/earphones.jpg" style="width: 178px;height: 160px;">
				</div>
				<div class="col-md-8">
					<p class="text-bold"style="font-size: 20px;"><?php echo ucwords($key['name']); ?></p>
					<p><?php echo $item_detail['comp'];?>, <?php echo $obj_const->regionConverter($item_detail['region']);?></p>
					<p><?php echo $obj_const->dateFormater($key['regdate']);?></p>
					<p class="text-bold">Br. <?php echo $key['price'];?></p>
				</div>
			</div>
			
		</div>
	</div>

</a>

<?php endforeach ?>