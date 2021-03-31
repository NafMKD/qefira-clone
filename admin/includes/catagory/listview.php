<?php if(isset($_GET['listCat']) && !isset($_GET['view']) && !isset($_GET['edit'])):
    $catagorylist = $obj_fetch->fetchCatagories("ALL");
    ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">List of Items:</h3>
        </div>
        <div class="card-body">
            <?php if(isset($final_delete_return)): ?>
                <div class="alert <?php echo $final_delete_return[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $final_delete_return[1]; ?>
                </div>
            <?php endif?> 
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Catagory Name</th>
                        <th>Status</th>
                        <th>Number of Keys</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt=1;foreach($catagorylist as $key):
                        $catkey = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$key['cat_id']);
                        ?>
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php echo ucwords($key['name']);?></td>
                            <?php if($key['isactive']==0):?>
                                <td class="text-red"><?php echo "Not Active";?></td>
                            <?php elseif($key['isactive']==1):?>
                                <td class="text-green"><?php echo "Active";?></td>
                            <?php endif?>
                            
                            <td><?php echo count($catkey);?></td>
                            <td>
                                <a href="?listCat&view=<?php echo $key['cat_id'];?>">
                                    <button class="btn btn-info btn-xs btn-flat"><i class="fas fa-eye"></i> View</button>
                                </a>
                                <a href="?listCat&edit=<?php echo $key['cat_id'];?>">
                                    <button class="btn btn-primary btn-xs btn-flat"><i class="fas fa-edit"></i> Edit</button>
                                </a>
                                <a href="?listCat&delete=<?php echo $key['cat_id']?>">
                                    <button class="btn btn-danger btn-xs btn-flat"><i class="fas fa-trash"></i> Delete </button>
                                </a>
                            </td>
                        </tr>
                    <?php $cnt++;endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php elseif(isset($_GET['listCat']) && isset($_GET['view']) && !isset($_GET['edit'])):
    $detaicatagory = $obj_fetch->fetchCatagories("INDIVIDUAL", "cat_id/".$_GET['view'])[0];
    $cat_key_list =$obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$_GET['view']);
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
                        <dt class="col-sm-3">Catagory Id:</dt>
                        <dd class="col-sm-9"><?php echo $detaicatagory['cat_id']; ?></dd>
                        <dt class="col-sm-4">Catagory Name:</dt>
                        <dd class="col-sm-8"><?php echo ucwords($detaicatagory['name']); ?></dd>
                        <dt class="col-sm-2">Stutas:</dt>
                        <?php if($detaicatagory['isactive']==1):?>
                            <dd class="col-sm-10 text-green">Active</dd>
                        <?php else:?>
                            <dd class="col-sm-10 text-red">Not Active</dd>
                        <?php endif?>
                        <dt class="col-sm-4">Registration Date:</dt>
                        <dd class="col-sm-8"><?php echo $obj_const->dateFormater($detaicatagory['datereg']); ?></dd>
                        <dt class="col-sm-3">Update Date:</dt>
                         <?php if($detaicatagory['udate']!=""):?>
                            <dd class="col-sm-9 text-green"><?php echo $obj_const->dateFormater($detaicatagory['udate']); ?></dd>
                        <?php else:?>
                            <dd class="col-sm-9 text-red">No update History</dd>
                        <?php endif?>
                    </dl>
                </div>

                <div class="col-md-6">
                    <label>Catagory keys:</label>
                    <ul>
                        <?php foreach($cat_key_list as $key):?>
                            <li class="col-sm-3"><?php echo ucwords($key['catkey']) ;?></li>
                        <?php endforeach?>                        
                    </ul>
                    
                </div>
            </div>
            <hr>
            <a href="?listCat&delete=<?php echo $_GET['view']?>">
                <button class="btn btn-danger float-right">
                    <i class="fas fa-trash"></i>
                    Delete
                </button>
            </a>
            <a href="?listCat&edit=<?php echo $_GET['view']?>">
                <button class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    Edit
                </button>
            </a>
        </div>
    </div>
<?php elseif(isset($_GET['listCat']) && !isset($_GET['view']) && isset($_GET['edit'])):
    $catagorydetail = $obj_fetch->fetchCatagories("INDIVIDUAL", "cat_id/".$_GET['edit'])[0];
    $catagorykey = $obj_fetch->fetchCatKey("INDIVIDUAL", "cat_id/".$_GET['edit']);
    ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Category:</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if(isset($final_update_return)): ?>
                <div class="alert <?php echo $final_update_return[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $final_update_return[1]; ?>
                </div>
            <?php endif?>           
            <form method="post">
                <input type="hidden" name="catkeyid" value="<?php foreach($catagorykey as $key){echo $key['cat_key_id']."/";}?>">
                <input type="hidden" name="catkeyval" value="<?php foreach($catagorykey as $key){echo $key['catkey']."/";}?>">
                <input type="hidden" name="catagoryid" value="<?php echo $_GET['edit'];?>">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" name="catagoryNameEnter" value="<?php echo $catagorydetail['name'] ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Keys:</label>
                            <button type="button" class="btn btn-tool float-right" id="btnCancleInput">
                                <?php if(count($catagorykey)!=0){echo '<i class="fas fa-minus"></i>';}?>
                            </button>
                            <button type="button" class="btn btn-tool float-right mr-2" id="btnAddInput"><i class="fas fa-plus"></i></button>
                            <input id="counter" name="input_counter" <?php if(count($catagorykey)!=0){ echo 'value="'.count($catagorykey).'"';}?> hidden>
                            <input type="text" name="catagoryName0" class="form-control" <?php if(isset($catagorykey[0])){echo 'value="'.$catagorykey[0]['catkey'].'"';}else{echo 'placeholder="Enter Category Key #1.."';} ?> required>
                            <input type="text" name="catagoryName1" id="one" class="form-control mt-2" <?php if(isset($catagorykey[1])){echo 'value="'.$catagorykey[1]['catkey'].'" placeholder="Enter Category Key #2.." ';}else{echo 'placeholder="Enter Category Key #2.." hidden';} ?> >
                            <input type="text" name="catagoryName2" id="two" class="form-control mt-2" <?php if(isset($catagorykey[2])){echo 'value="'.$catagorykey[2]['catkey'].'" placeholder="Enter Category Key #3.."';}else{echo 'placeholder="Enter Category Key #3.." hidden';} ?>>
                            <input type="text" name="catagoryName3" id="three" class="form-control mt-2" <?php if(isset($catagorykey[3])){echo 'value="'.$catagorykey[3]['catkey'].'" placeholder="Enter Category Key #4.."';}else{echo 'placeholder="Enter Category Key #4.." hidden';} ?>>
                            <input type="text" name="catagoryName4" id="four" class="form-control mt-2" <?php if(isset($catagorykey[4])){echo 'value="'.$catagorykey[4]['catkey'].'" placeholder="Enter Category Key #5.."';}else{echo 'placeholder="Enter Category Key #5.." hidden';} ?>>
                            <input type="text" name="catagoryName5" id="five" class="form-control mt-2" <?php if(isset($catagorykey[5])){echo 'value="'.$catagorykey[5]['catkey'].'" placeholder="Enter Category Key #6.."';}else{echo 'placeholder="Enter Category Key #6.." hidden';} ?>>
                            <input type="text" name="catagoryName6" id="six" class="form-control mt-2" <?php if(isset($catagorykey[6])){echo 'value="'.$catagorykey[6]['catkey'].'" placeholder="Enter Category Key #7.."';}else{echo 'placeholder="Enter Category Key #7.." hidden';} ?>>
                            <input type="text" name="catagoryName7" id="seven" class="form-control mt-2" <?php if(isset($catagorykey[7])){echo 'value="'.$catagorykey[7]['catkey'].'" placeholder="Enter Category Key #8.."';}else{echo 'placeholder="Enter Category Key #8.." hidden';} ?>>
                            <input type="text" name="catagoryName8" id="eight" class="form-control mt-2" <?php if(isset($catagorykey[8])){echo 'value="'.$catagorykey[8]['catkey'].'" placeholder="Enter Category Key #9.."';}else{echo 'placeholder="Enter Category Key #9.." hidden';} ?>>
                            <input type="text" name="catagoryName9" id="nine" class="form-control mt-2" <?php if(isset($catagorykey[9])){echo 'value="'.$catagorykey[9]['catkey'].'" placeholder="Enter Category Key #10.."';}else{echo 'placeholder="Enter Category Key #10.." hidden';} ?>>
                        </div>
                    </div>
                </div>
                <hr>
                <button class="btn btn-success float-right mr-5" name="btnUpdateCatagory">
                    Update
                </button>
            </form>
       </div>
    </div>
<?php endif?>