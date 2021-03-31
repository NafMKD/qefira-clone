<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">User Information:</h3>
    </div>
    <div class="card-body">
        <?php if(isset($final_return)): ?>
            <div class="alert <?php echo $final_return[0]; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?php echo $final_return[1]; ?>
            </div>
        <?php endif?>
        <?php if(isset($authcodereturnval)): ?>
            <div class="alert <?php echo $authcodereturnval[0]; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-<?php echo $authcodereturnval[1]; ?>"></i> Alert!</h5>
                <?php echo $authcodereturnval[2]; ?>
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
    		 				<img src="../../files/users/<?php echo $user_file[0]['filePath'];?>" class="img-fluid mb-2" alt=""/>
    		 			<?php endif?>
    		 		</div>
    		 		<div class="col-md-6">
    		 			<form method="post" enctype="multipart/form-data">
	    		 			<div class="form-group">
	    		 				<input type="hidden" name="user_ID" value="<?php echo $_SESSION['userid']; ?>">
	    		 				<input type="file" class="form-control" name="fileNewUser">
	    		 				<?php if(count($user_file)==0):?>
	    		 					<button type="submit" name="uploadUserData" class="btn btn-primary float-right mt-1">
		    		 					<i class="fas fa-upload"></i>
		    		 					Upload
		    		 				</button>
	    		 				<?php else:?>
	    		 					<button type="submit" name="updatuploadUserData" class="btn btn-primary float-right mt-1">
		    		 					<i class="fas fa-upload"></i>
		    		 					Upload
		    		 				</button>
	    		 				<?php endif?>
	    		 				
	    		 			</div>
    		 			</form>
    		 		</div>
    		 	</div>
    		 </div>
    	</div>
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
                            <th>Action</th>
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
                            <td>
                                <?php if($user_info['isEmail'] ==""):?>
                                    <form method="post">
                                        <input type="hidden" name="init" value="1">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Initiate</button>
                                    </form>
                                <?php elseif($user_info['isEmail'] !=""):?>
                                    <?php if($user_info['isEmail'] ==1):?>
                                        No Action Needed
                                    <?php else:?>
                                        <button id="autBtn" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Authenticate</button>
                                    <?php endif?>
                                <?php endif?>
                            </td>
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
                            <td>
                                <?php if($user_info['isPhone'] ==""):?>
                                    <form method="post">
                                        <input type="hidden" name="init" value="2">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Initiate</button>
                                    </form>
                                <?php elseif($user_info['isPhone'] !=""):?>
                                    <?php if($user_info['isPhone'] ==1):?>
                                        No Action Needed
                                    <?php else:?>
                                        <button id="autBtn" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Authenticate</button>
                                    <?php endif?>
                                <?php endif?>
                            </td>
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
                            <td>
                                <?php if($user_info['isTelegram'] ==""):?>
                                    <form method="post">
                                        <input type="hidden" name="init" value="3">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Initiate</button>
                                    </form>
                                <?php elseif($user_info['isTelegram'] !=""):?>
                                    <?php if($user_info['isTelegram'] ==1):?>
                                        No Action Needed
                                    <?php else:?>
                                        <button id="autBtn" class="btn btn-primary btn-sm"><i class="fas fa-check"></i> Authenticate</button>
                                    <?php endif?>
                                <?php endif?>
                            </td>
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
                            <td>
                                <?php if($user_info['isWhatsapp'] ==""):?>
                                    <form method="post">
                                        <input type="hidden" name="init" value="4">
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Initiate</button>
                                    </form>
                                <?php elseif($user_info['isWhatsapp'] !=""):?>
                                    <?php if($user_info['isWhatsapp'] ==1):?>
                                        No Action Needed
                                    <?php else:?>
                                        <button id="autBtn" class="btn btn-primary btn-sm" ><i class="fas fa-check"></i> Authenticate</button>
                                    <?php endif?>
                                <?php endif?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


 <div class="modal fade" id="modal-authenticate">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Authenticate</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <p class="login-box-msg">Enter the six-digit code</p>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="input-group mb-3">
                <input type="hidden" name="forAuthenticate" id="forAuthInput">
                <input type="text" class="form-control" name="authcode" placeholder="Enter code.." required>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
          <br>
          <div class="row">
            <div class="col-7"></div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block" id="sibtn" name="btn_auth"><i class="fas fa-check mr-1"></i> Authenticate </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>