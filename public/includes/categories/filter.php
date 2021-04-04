<?php 
$urlpathFilter="";
if(isset($_GET['c'])){
	$urlpathFilter .= "&c=".$_GET['c']; 
}
if(isset($_GET['r'])){
	$urlpathFilter .= "&r=".$_GET['r']; 
}
$urlpathRegion="";
if(isset($_GET['c'])){
	$urlpathRegion .= "&c=".$_GET['c']; 
}
if(isset($_GET['f'])){
	$urlpathRegion .= "&f=".$_GET['f']; 
}
$allregion="";
if(isset($_GET['c'])){
	$allregion .= "c=".$_GET['c'];
}
if(isset($_GET['f'])){
	$allregion .= "&f=".$_GET['f']; 
}
?>
<label>Sort By:</label>
<ul class="list-unstyled" style="font-size: 15px;">
	<li>
		<a href="?f=0<?php echo $urlpathFilter; ?>" class="nav-link text-dark"><i class="fas fa-arrow-down text-blue mr-2"></i> Newest</a>
	</li>
	<li>
		<a href="?f=1<?php echo $urlpathFilter; ?>" class="nav-link text-dark"><i class="fas fa-arrow-up text-blue mr-2"></i> Oldest</a>
	</li>
	<li>
		<a href="?f=2<?php echo $urlpathFilter; ?>" class="nav-link text-dark"><i class="fas fa-arrow-up text-blue mr-2"></i> Price (Low-High)</a>
	</li>
	<li>
		<a href="?f=3<?php echo $urlpathFilter; ?>" class="nav-link text-dark"><i class="fas fa-arrow-down text-blue mr-2"></i> Price (High-Low)</a>
	</li>
</ul>

<label>Region:</label>
<ul class="list-unstyled" style="font-size: 15px;">
	<li>
		<a href="?<?php echo $allregion; ?>" class="nav-link text-dark"> ALL</a>
	</li>
	<?php for($i=0;$i<11;$i++):
		$regionfetch = $obj_fetch->fetchItems("REGION", "BYDATEFILTER/DESC/".$_GET['c']."/".$i);
		?>
		<?php if(count($regionfetch)!=0):?>
			<li>
				<a href="?r=<?php echo $i.$urlpathRegion; ?>" class="nav-link text-dark"> <?php echo $obj_const->regionConverter($i)." (".count($regionfetch).")"; ?></a>
			</li>
		<?php endif ?>
	<?php endfor?>
</ul>

<hr>
<label>Categories</label>
<ul class="list-unstyled" style="font-size: 15px;">
	<?php foreach ($catagories as $key): ?>
		<?php if($key['isactive']==1): ?>
	        <li>
	            <a href="categories.php?c=<?php echo $key['cat_id']; ?>" class="nav-link text-dark"><?php echo $key['name']; ?></a>
	        </li>
    	<?php endif?>
    <?php endforeach ?>
</ul>