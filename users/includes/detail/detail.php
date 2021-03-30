<?php 
$item_detail = $obj_fetch->fetchItems("INDIVIDUAL", $_GET['i'])[0];
$item_file = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$_GET['i']);
$catagorykey = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$item_detail['cat_id']);
?>
<div class="card card-solid">
  <div class="card-body">
    <div class="col-12 col-sm-10">
      <div class="col-12">
        <img src="../files/items/<?php echo $item_file[0]['filePath']; ?>" class="product-image" alt="Item Image">
      </div>
      <div class="col-12 product-image-thumbs">
        <?php for($i=0;$i<count($item_file);$i++): ?>
          <?php if($i==0):?>
            <div class="product-image-thumb active"><img src="../files/items/<?php echo $item_file[$i]['filePath']; ?>" alt="Item Image"></div>
          <?php else:?>
            <div class="product-image-thumb" ><img src="../files/items/<?php echo $item_file[$i]['filePath']; ?>" alt="Item Image"></div>
          <?php endif?>
        <?php endfor ?>
      </div>
    </div>
    <br>
    <span><?php echo $obj_const->dateFormaterDetail($item_detail['regdate']);?></span>
    <span class="float-right">Ad ID: <?php echo $_GET['i']; ?></span>       
    <p style="font-size: 20px;" class="text-red text-bold">Br. <?php echo number_format($item_detail['price']);?></p>
    <p><?php echo ucwords($item_detail['name']);?></p>
    <span><i class="fas fa-map-marker"></i> <?php echo ucwords($item_detail['comp']);?>, <?php echo ucwords($item_detail['city']);?></span>
    <hr>
    <p class="text-bold">Specifications:</p>
    <dl class="row">
      <?php foreach($catagorykey as $key):
        $value = $obj_fetch->fetchItemsKeyDetail("INDIVIDUALDETAIL", $item_detail['item_id']."/".$key['cat_key_id'])[0];
        ?>
        <dt class="col-sm-4"><?php echo ucwords($key['catkey']); ?></dt>
        <dd class="col-sm-8"><?php echo ucwords($value['cat_value']); ?></dd>
      <?php endforeach?>
      
    </dl>    
    <hr>
    <p class="text-bold">Description:</p>
    <?php echo $item_detail['descr']; ?>
  </div>
</div>