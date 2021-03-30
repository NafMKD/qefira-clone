<?php if(!isset($_GET['view'])):?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">List of Items:</h3>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cnt=1;foreach($all_users as $key):
                        $user_items=$obj_fetch->fetchItems("BYUSER", $key['usr_id']);
                        ?>
                        <tr>
                            <td><?php echo $cnt;?></td>
                            <td><?php echo ucwords($key['name']);?></td>
                            <td><?php echo $key['phone'];?></td>
                            <td><?php echo count($user_items);?></td>
                            <?php if($key['isactive']==1):?>
                                <td class="text-green">Active</td>
                            <?php else:?>
                                <td class="text-red">Not Active</td>
                            <?php endif?>
                            <td>
                                <a href="?view=<?php echo $key['usr_id']; ?>">
                                    <button class="btn btn-primary btn-sm btn-flat">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php $cnt++;endforeach?>
                </tbody>
            </table>
        </div>
    </div>
<?php elseif(isset($_GET['view'])):
    $user_info = $obj_fetch->fetchUsers("INDIVIDUAL","usr_id/".$_GET['view'])[0];
    $user_file = $obj_fetch->fetchUsersFile("INDIVIDUAL", "usr_id/".$_GET['view']);
    ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">User Information:</h3>
            <div class="card-tool">
                <a href="#" id="detailBack" class="float-md-right mr-5">
                    <i class="fas fa-angle-left mr-1"></i>
                    Back
                </a>
            </div>
        </div>
        <div class="card-body">
            <?php if(isset($return_msg_dis)): ?>
                <div class="alert <?php echo $return_msg_dis[0]; ?> alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    <?php echo $return_msg_dis[1]; ?>
                </div>
            <?php endif?>
            <div class="row">
                 <div class="col-md-6">
                    <dl class="row">
                        <dt class="col-sm-3">User Id:</dt>
                        <dd class="col-sm-9">U-<?php echo $user_info['usr_id']; ?></dd>
                        <dt class="col-sm-3">Full Name:</dt>
                        <dd class="col-sm-9"><?php echo ucwords($user_info['name']); ?></dd>
                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9"><?php echo $user_info['email']; ?></dd>
                        <dt class="col-sm-3">Phone:</dt>
                        <dd class="col-sm-9"><?php echo $user_info['phone']; ?></dd>
                        <dt class="col-sm-3">Telegram:</dt>
                        <?php if($user_info['telegram']==""):?>
                            <dd class="col-sm-9 text-red">No Telegram</dd>
                        <?php else:?>
                            <dd class="col-sm-9"><a href="https://t.me/<?php echo $user_info['telegram']; ?>" target="_blank"><?php echo $user_info['telegram']; ?></a></dd>
                        <?php endif?>
                        <dt class="col-sm-3">Whatsapp:</dt>
                        <?php if($user_info['whatsapp']==""):?>
                            <dd class="col-sm-9 text-red">No Whatsapp</dd>
                        <?php else:?>
                            <dd class="col-sm-9"><a href="https://whatsapp.com/<?php echo $user_info['whatsapp']; ?>" target="_blank"><?php echo $user_info['whatsapp']; ?></a></dd>
                        <?php endif?>
                        <dt class="col-sm-4">Registration Date:</dt>
                        <dd class="col-sm-8"><?php echo $user_info['datereg']; ?></dd>
                        <dt class="col-sm-4">Update Date:</dt>
                        <?php if($user_info['udate']==""):?>
                            <dd class="col-sm-8 text-red">No Update History!</dd>
                        <?php else:?>
                            <dd class="col-sm-8 text-green"><?php echo $user_info['udate']; ?></dd>
                        <?php endif?>
                    </dl>
                 </div>
                 <div class="col-md-6">
                    <label>Photo:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <?php if(count($user_file)==0):?>
                                <p class="text-red">No Photo!</p>
                            <?php else:?>
                                <img src="../files/users/<?php echo $user_file[0]['filePath'];?>" class="img-fluid mb-2" alt=""/>
                            <?php endif?>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                 </div>
            </div>
            <hr>
            <?php if($user_info['isactive']==1):?>
                <form method="post">
                    <input type="hidden" name="user_id_stat" value="<?php echo $_GET['view'];?>">
                    <button type="submit" name="deactivate_user" class="btn btn-warning">
                        Deactive User
                        <i class="fas fa-user-minus ml-1"></i>
                    </button>
                </form>
            <?php else:?>
                <form method="post">
                    <input type="hidden" name="user_id_stat" value="<?php echo $_GET['view'];?>">
                    <button type="submit" name="activate_user" class="btn btn-success">
                        Active User
                        <i class="fas fa-user-plus ml-1"></i>
                    </button>
                </form>
            <?php endif?>
            <hr>
            <div class="row">
                <label>Authentications:</label>
                <div class="col-md-12">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Process</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Email</td>
                                <?php if($user_info['isEmail'] ==""):?>
                                    <td class="text-red">Not Initiated</td>
                                <?php else:?>
                                    <td class="text-green">Initiated</td>
                                <?php endif?>
                                <?php if($user_info['isEmail'] ==1):?>
                                    <td class="text-green">Authenticated</td>
                                <?php else:?>
                                    <td class="text-red">Not Authenticated</td>
                                <?php endif?>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Phone</td>
                                <?php if($user_info['isPhone'] ==""):?>
                                    <td class="text-red">Not Initiated</td>
                                <?php else:?>
                                    <td class="text-green">Initiated</td>
                                <?php endif?>
                                <?php if($user_info['isPhone'] ==1):?>
                                    <td class="text-green">Authenticated</td>
                                <?php else:?>
                                    <td class="text-red">Not Authenticated</td>
                                <?php endif?>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Telegram</td>
                                <?php if($user_info['isTelegram'] ==""):?>
                                    <td class="text-red">Not Initiated</td>
                                <?php else:?>
                                    <td class="text-green">Initiated</td>
                                <?php endif?>
                                <?php if($user_info['isTelegram'] ==1):?>
                                    <td class="text-green">Authenticated</td>
                                <?php else:?>
                                    <td class="text-red">Not Authenticated</td>
                                <?php endif?>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Whatsapp</td>
                                <?php if($user_info['isWhatsapp'] ==""):?>
                                    <td class="text-red">Not Initiated</td>
                                <?php else:?>
                                    <td class="text-green">Initiated</td>
                                <?php endif?>
                                <?php if($user_info['isWhatsapp'] ==1):?>
                                    <td class="text-green">Authenticated</td>
                                <?php else:?>
                                    <td class="text-red">Not Authenticated</td>
                                <?php endif?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif?>