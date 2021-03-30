<?php if(isset($_GET['c'])):
	$cat_items=$obj_fetch->fetchItems("ADMINCATAGORY", $_GET['c']);
	$cat_info = $obj_fetch->fetchCatagories("INDIVIDUAL", "cat_id/".$_GET['c'])[0];
	?>
	<div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">List of Items: in <a href="catagory.php?listCat&view=<?php echo $_GET['c'];?>"><?php echo ucwords($cat_info['name']); ?></a> category</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
        	<?php if(isset($status_update_return_msg)): ?>
                <div class="alert <?php echo $status_update_return_msg[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $status_update_return_msg[1]; ?>
                </div>
            <?php endif?>
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item AD Id</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt=1;foreach($cat_items as $key):?>
	                    <tr>
	                        <td><?php echo $cnt;?></td>
	                        <td><?php echo ucwords($key['name']);?></td>
	                        <td><?php echo ucwords($key['item_id']);?></td>
	                        <td><?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></td>
	                        <td><?php echo number_format($key['price']);?></td>
	                        <td>
	                            <a href="?c=<?php echo $_GET['c'];?>&status=<?php echo $key['item_id'];?>">
	                                <?php if($key['isactive']==1):?>
	                                    <button class="btn btn-danger btn-xs btn-flat"><i class="fas fa-times"></i> Deactivate</button>
	                                <?php elseif($key['isactive']==0):?>
	                                    <button class="btn btn-success btn-xs btn-flat"><i class="fas fa-check"></i> Activate</button>
	                                <?php endif?>
	                                
	                            </a>
	                        </td>
	                        <td>
	                            <a href="?view=<?php echo $key['item_id'];?>">
	                                <button class="btn btn-info btn-xs btn-flat"><i class="fas fa-eye"></i> View</button>
	                            </a>
	                        </td>
	                    </tr>
                    <?php $cnt++;endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php elseif(isset($_GET['q'])):
	$search_items = $obj_fetch->fetchItems("SEARCHRESULT", "BYDATEFILTER/DESC/".$_GET['q']);
	?>
	<div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Searched Items:</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
        	<?php if(isset($status_update_return_msg)): ?>
                <div class="alert <?php echo $status_update_return_msg[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $status_update_return_msg[1]; ?>
                </div>
            <?php endif?>
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item AD Id</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt=1;foreach($search_items as $key):?>
	                    <tr>
	                        <td><?php echo $cnt;?></td>
	                        <td><?php echo ucwords($key['name']);?></td>
	                        <td><?php echo ucwords($key['item_id']);?></td>
	                        <td><?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></td>
	                        <td><?php echo number_format($key['price']);?></td>
	                        <td>
	                            <a href="?q=<?php echo $_GET['q'];?>&status=<?php echo $key['item_id'];?>">
	                                <?php if($key['isactive']==1):?>
	                                    <button class="btn btn-danger btn-xs btn-flat"><i class="fas fa-times"></i> Deactivate</button>
	                                <?php elseif($key['isactive']==0):?>
	                                    <button class="btn btn-success btn-xs btn-flat"><i class="fas fa-check"></i> Activate</button>
	                                <?php endif?>
	                                
	                            </a>
	                        </td>
	                        <td>
	                            <a href="?view=<?php echo $key['item_id'];?>">
	                                <button class="btn btn-info btn-xs btn-flat"><i class="fas fa-eye"></i> View</button>
	                            </a>
	                        </td>
	                    </tr>
                    <?php $cnt++;endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>	
<?php elseif(isset($_GET['i'])):
	$itemfilter = $obj_fetch->fetchItems("ADMINIDSEARCH", $_GET['i']);
	?>
	<div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Searched Items:</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
        	<?php if(isset($status_update_return_msg)): ?>
                <div class="alert <?php echo $status_update_return_msg[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $status_update_return_msg[1]; ?>
                </div>
            <?php endif?>
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Item AD Id</th>
                        <th>Address</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt=1;foreach($itemfilter as $key):?>
	                    <tr>
	                        <td><?php echo $cnt;?></td>
	                        <td><?php echo ucwords($key['name']);?></td>
	                        <td><?php echo ucwords($key['item_id']);?></td>
	                        <td><?php echo ucwords($key['comp']);?>, <?php echo ucwords($key['city']);?></td>
	                        <td><?php echo number_format($key['price']);?></td>
	                        <td>
	                            <a href="?i=<?php echo $_GET['i'];?>&status=<?php echo $key['item_id'];?>">
	                                <?php if($key['isactive']==1):?>
	                                    <button class="btn btn-danger btn-xs btn-flat"><i class="fas fa-times"></i> Deactivate</button>
	                                <?php elseif($key['isactive']==0):?>
	                                    <button class="btn btn-success btn-xs btn-flat"><i class="fas fa-check"></i> Activate</button>
	                                <?php endif?>
	                            </a>
	                        </td>
	                        <td>
	                            <a href="?view=<?php echo $key['item_id'];?>">
	                                <button class="btn btn-info btn-xs btn-flat"><i class="fas fa-eye"></i> View</button>
	                            </a>
	                        </td>
	                    </tr>
                    <?php $cnt++;endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>	
<?php elseif(isset($_GET['view'])):
    $detailitem = $obj_fetch->fetchItems("INDIVIDUAL", $_GET['view'])[0];
    $item_file = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$_GET['view']);
    $catagorykey = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$detailitem['cat_id']);
    $userinfo=$obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$detailitem['usr_id'])[0];
    ?>
	<div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Detail View:</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
        	<?php if(isset($status_update_return_msg)): ?>
                <div class="alert <?php echo $status_update_return_msg[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $status_update_return_msg[1]; ?>
                </div>
            <?php endif?>
            <div class="row">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-2">AD Id:</dt>
                        <dd class="col-sm-10"><?php echo $detailitem['item_id']; ?></dd>
                        <dt class="col-sm-3">Poster Name:</dt>
                        <dd class="col-sm-9"><a href="users.php?view=<?php echo $userinfo['usr_id']; ?>"><?php echo ucwords($userinfo['name']); ?></a></dd>
                        <dt class="col-sm-4">Catagory Name:</dt>
                        <dd class="col-sm-8"><?php echo ucwords($detailitem['name']); ?></dd>
                        <dt class="col-sm-2">Ad Type:</dt>
                        <dd class="col-sm-10"><?php echo $obj_const->adTypeConverter($detailitem['ad_item_id']); ?></dd>
                        <dt class="col-sm-3">Item Name:</dt>
                        <dd class="col-sm-9"><?php echo ucwords($detailitem['name']); ?></dd>
                        <dt class="col-sm-3">Item Price:</dt>
                        <dd class="col-sm-9"><?php echo number_format($detailitem['price']); ?></dd>
                        <dt class="col-sm-2">Region:</dt>
                        <dd class="col-sm-10"><?php echo $obj_const->regionConverter($detailitem['region']); ?></dd>
                    </dl>
                </div>

                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-2">Address:</dt>
                        <dd class="col-sm-10"><?php echo ucwords($detailitem['comp']); ?></dd>
                        <dt class="col-sm-2">City:</dt>
                        <dd class="col-sm-10"><?php echo ucwords($detailitem['city']); ?></dd>
                        <dt class="col-sm-4">Negotiation Type:</dt>
                        <dd class="col-sm-8"><?php echo $obj_const->negTypeConverter($detailitem['negtype']); ?></dd>
                        <dt class="col-sm-3">Upload Date:</dt>
                        <dd class="col-sm-9"><?php echo $obj_const->dateFormater($detailitem['regdate']); ?></dd>
                        <dt class="col-sm-2">Stutas:</dt>
                        <?php if($detailitem['isactive']==1):?>
                            <dd class="col-sm-10 text-green">Active</dd>
                            <?php else:?>
                                <dd class="col-sm-10 text-red">Not Active</dd>
                            <?php endif?>
                            
                            <dt class="col-sm-3">Update Date:</dt>
                            <?php if($detailitem['udate']!=""):?>
                                <dd class="col-sm-9 text-green"><?php echo $obj_const->dateFormater($detailitem['udate']); ?></dd>
                                <?php else:?>
                                    <dd class="col-sm-9 text-red">No update History</dd>
                                <?php endif?>
                            </dl>
                        </div>
                    </div>
                    <hr>
                    <dl class="row">
                        <dt class="col-sm-2">Description:</dt>
                        <dd class="col-sm-10"><?php echo $detailitem['descr']; ?></dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
                    <p class="text-bold">Specifications:</p>
                    <dl class="row">
                      <?php foreach($catagorykey as $key):
                        $value = $obj_fetch->fetchItemsKeyDetail("INDIVIDUALDETAIL", $detailitem['item_id']."/".$key['cat_key_id'])[0];
                        ?>
                        <dt class="col-sm-4"><?php echo ucwords($key['catkey']); ?></dt>
                        <dd class="col-sm-8"><?php echo ucwords($value['cat_value']); ?></dd>
                    <?php endforeach?>
                    </dl> 
                </div>
            </div>
            <hr>
            <a href="?view=<?php echo $_GET['view'];?>&status=<?php echo $detailitem['item_id'];?>">
	            <?php if($detailitem['isactive']==1):?>
		            <button class="btn btn-danger"><i class="fas fa-times"></i> Deactivate</button>
		        <?php elseif($detailitem['isactive']==0):?>
		            <button class="btn btn-success"><i class="fas fa-check"></i> Activate</button>
		        <?php endif?>
		    </a>
        </div>
    </div>
<?php endif?>