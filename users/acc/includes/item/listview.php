<?php if(isset($_GET['listItem']) && !isset($_GET['view']) && !isset($_GET['edit'])):
    $itemlist = $obj_fetch->fetchItems("BYUSER", $user_info['usr_id']);
    ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">List of Items:</h3>
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
                        <th>Address</th>
                        <th>City</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt=1;foreach($itemlist as $key):?>
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo ucwords($key['name']);?></td>
                        <td><?php echo ucwords($key['comp']);?></td>
                        <td><?php echo ucwords($key['city']);?></td>
                        <td><?php echo $key['price'];?></td>
                        <td>
                            <a href="?listItem&status=<?php echo $key['item_id'];?>">
                                <?php if($key['isactive']==1):?>
                                    <button class="btn btn-danger btn-xs btn-flat"><i class="fas fa-times"></i> Deactivate</button>
                                <?php elseif($key['isactive']==0):?>
                                    <button class="btn btn-success btn-xs btn-flat"><i class="fas fa-check"></i> Activate</button>
                                <?php endif?>
                                
                            </a>
                        </td>
                        <td>
                            <a href="?listItem&view=<?php echo $key['item_id'];?>">
                                <button class="btn btn-info btn-xs btn-flat"><i class="fas fa-eye"></i> View</button>
                            </a>
                            <a href="?listItem&edit=<?php echo $key['item_id'];?>">
                                <button class="btn btn-primary btn-xs btn-flat"><i class="fas fa-edit"></i> Edit</button>
                            </a>
                        </td>
                    </tr>
                    <?php $cnt++;endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php elseif(isset($_GET['listItem']) && isset($_GET['view']) && !isset($_GET['edit'])):
    $detailitem = $obj_fetch->fetchItems("INDIVIDUAL", $_GET['view'])[0];
    $item_file = $obj_fetch->fetchItemsFile("INDIVIDUAL", "item_id/".$_GET['view']);
    $catagorykey = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$detailitem['cat_id']);
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
            <div class="row">
                <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-2">AD Id:</dt>
                        <dd class="col-sm-10"><?php echo $detailitem['item_id']; ?></dd>
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
                            <img src="../../files/items/<?php echo $item_file[0]['filePath']; ?>" class="product-image" alt="Item Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php for($i=0;$i<count($item_file);$i++): ?>
                              <?php if($i==0):?>
                                <div class="product-image-thumb active"><img src="../../files/items/<?php echo $item_file[$i]['filePath']; ?>" alt="Item Image"></div>
                                <?php else:?>
                                    <div class="product-image-thumb" ><img src="../../files/items/<?php echo $item_file[$i]['filePath']; ?>" alt="Item Image"></div>
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
            <a href="?listItem&edit=<?php echo $_GET['view'];?>">
                <button class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </a>
        </div>
    </div>
<?php elseif(isset($_GET['listItem']) && !isset($_GET['view']) && isset($_GET['edit'])):
    $detailitem = $obj_fetch->fetchItems("INDIVIDUAL", $_GET['edit'])[0];
    $catagorykey = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$detailitem['cat_id']);
    $catagories = $obj_fetch->fetchCatagories("ALL");
    ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Item:</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if(isset($upd_return_msg)): ?>
                <div class="alert <?php echo $upd_return_msg[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $upd_return_msg[1]; ?>
                </div>
            <?php endif?>
            <form method="post">
                <div class="row">
                    <input type="hidden" name="item_id" value="<?php echo $_GET['edit'];?>">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Item Name:</label>
                            <input type="text" class="form-control" name="itemName" value="<?php echo $detailitem['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Item Price:</label>
                            <input type="text" class="form-control" name="itemPrice" value="<?php echo $detailitem['price']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <input type="text" class="form-control" name="itemAddress" value="<?php echo $detailitem['comp']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label>City:</label>
                            <input type="text" class="form-control" name="itemCity" value="<?php echo $detailitem['city']; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Select Catagory:</label>
                            <select class="form-control select2" name="itemCatagory" required>
                                <?php foreach($catagories as $key): ?>
                                    <?php if($key['cat_id'] == $detailitem['cat_id']):?>
                                    <option selected value="<?php echo $key['cat_id']; ?>"><?php echo ucwords($key['name']);?></option>
                                    <?php else:?>
                                    <option value="<?php echo $key['cat_id']; ?>"><?php echo ucwords($key['name']);?></option>
                                    <?php endif?>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Region:</label>
                            <select class="form-control select2" name="itemRegion" required>
                                <?php for($i=0;$i<11;$i++): ?>
                                    <?php if($i == $detailitem['region']):?>
                                    <option selected value="<?php echo $i; ?>"><?php echo $obj_const->regionConverter($i);?></option>
                                    <?php else:?>
                                    <option value="<?php echo $i; ?>"><?php echo $obj_const->regionConverter($i);?></option>
                                    <?php endif?>
                                <?php endfor?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Negotiation Type:</label>
                            <select class="form-control select2" name="itemNegtype" required>
                                <option <?php if($detailitem['negtype'])echo "selected"; ?> value="0">Negotiable</option>
                                <option <?php if($detailitem['negtype'])echo "selected"; ?> value="1">Not Negotiable</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <?php if(count($catagorykey)!=0):?>
                    <hr>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Deatil Specification:</label>
                                <?php foreach($catagorykey as $key):
                                    $value = $obj_fetch->fetchItemsKeyDetail("INDIVIDUALDETAIL", $detailitem['item_id']."/".$key['cat_key_id'])[0];
                                    ?>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label><?php echo ucwords($key['catkey']).":"; ?></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="<?php echo $key['cat_key_id']; ?>" class="form-control" value="<?php echo $value['cat_value']; ?>" required>
                                        </div>
                                    </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                <?php endif?>
                <hr>
                <div class="row"> 
                    <div class="col-md-1"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Description:</label>
                            <textarea id="compose-textarea" name="itemDescr" class="form-control" required>
                                <?php echo $detailitem['descr'];?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <hr>
                <button class="btn btn-success float-right mr-5" name="btnupdatedataitem">
                    <i class="fas fa-edit"></i>
                    Update
                </button>
            </form>
        </div>
    </div>
<?php endif?>