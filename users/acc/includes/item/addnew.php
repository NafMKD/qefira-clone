<?php 
$catagories = $obj_fetch->fetchCatagories("ALL");
$cheker = 0;
if(intval($user_info['isPhone'])==1){
    $cheker++;
} 
if(intval($user_info['isEmail'])==1){
    $cheker++;
} 
if(intval($user_info['isWhatsapp'])==1){
    $cheker++;
} 
if(intval($user_info['isTelegram'])==1){
    $cheker++;
} 
?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Add New Items:</h3>
        <?php if(isset($_GET['nextStep'])):?>
        <div class="card-tool">
            <a href="#" id="detailBack" class="float-md-right mr-5">
                <i class="fas fa-angle-left mr-1"></i>
                Back
            </a>
        </div>
    <?php endif?>
    </div>
    <div class="card-body">
        <?php if(isset($reg_return_msg)): ?>
            <div class="alert <?php echo $reg_return_msg[0]; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?php echo $reg_return_msg[1]; ?>
            </div>
        <?php endif?>
        <?php if($cheker==0): ?>
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-times"></i> Alert!</h5>
                You can't post Ads, Because you didn't authenticate any of listed authentication options!
            </div>
        <?php else:?>
            <?php if(isset($_GET['addNewItem']) && !isset($_GET['nextStep'])):?>
                <form method="post">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Item Name:</label>
                                <input type="text" class="form-control" name="itemName" placeholder="Enter Item Name.." required>
                            </div>
                            <div class="form-group">
                                <label>Item Price:</label>
                                <input type="text" class="form-control" name="itemPrice" placeholder="Enter Item Price.." required>
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" class="form-control" name="itemAddress" placeholder="eg. Merkato.." required>
                            </div>
                            <div class="form-group">
                                <label>City:</label>
                                <input type="text" class="form-control" name="itemCity" placeholder="eg. Adama.." required>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select Catagory:</label>
                                <select class="form-control select2" name="itemCatagory" required>
                                    <?php foreach($catagories as $key): ?>
                                        <option value="<?php echo $key['cat_id']; ?>"><?php echo ucwords($key['name']);?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Region:</label>
                                <select class="form-control select2" name="itemRegion" required>
                                    <?php for($i=0;$i<11;$i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $obj_const->regionConverter($i);?></option>
                                    <?php endfor?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Negotiation Type:</label>
                                <select class="form-control select2" name="itemNegtype" required>
                                    <option value="0">Negotiable</option>
                                    <option value="1">Not Negotiable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <hr>
                    <button class="btn btn-success float-right mr-5" name="nextstepitemreg">
                        Next Step
                        <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </form>
            <?php elseif(isset($_GET['addNewItem']) && isset($_GET['nextStep'])):
                $catagoryKeys = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$_GET['itemCatagory']);
                ?>
                <form method="post" enctype="multipart/form-data" onsubmit="return fileSizeLimiter(5)">
                    <input type="hidden" name="itemName2" value="<?php echo $_GET['itemName'];?>">
                    <input type="hidden" name="itemPrice2" value="<?php echo $_GET['itemPrice'];?>">
                    <input type="hidden" name="itemAddress2" value="<?php echo $_GET['itemAddress'];?>">
                    <input type="hidden" name="itemCity2" value="<?php echo $_GET['itemCity'];?>">
                    <input type="hidden" name="itemCatagory2" value="<?php echo $_GET['itemCatagory'];?>">
                    <input type="hidden" name="itemRegion2" value="<?php echo $_GET['itemRegion'];?>">
                    <input type="hidden" name="itemNegtype2" value="<?php echo $_GET['itemNegtype'];?>">
                    <?php if(count($catagoryKeys)!=0):?>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Deatil Specification:</label>
                                <?php foreach($catagoryKeys as $key):?>
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label><?php echo ucwords($key['catkey']).":"; ?></label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="<?php echo $key['cat_key_id']; ?>" required class="form-control">
                                        </div>
                                    </div>
                                <?php endforeach?>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>
                    <?php endif?>
                    <div class="row"> 
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea id="compose-textarea" name="itemDescr" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Upload Photo:</label>
                                <input type="file" name="itemImage[]" id="photofile" required multiple class="form-control">
                                <span id="errFileSize" class="text-red"></span> 
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>
                    <button class="btn btn-success float-right mr-5" name="btnuploadalldataitem">
                        <i class="fas fa-upload"></i>
                        Post Ad
                    </button>
                </form>
            <?php endif?>
        <?php endif?>
    </div>
</div>