<?php  if(isset($_GET['unread'])):?>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive mailbox-messages">
                   <table class="table table-hover table-striped">
                        <tbody>
                        <?php if(count($unread_messages)!=0):?>
                            <?php foreach ($unread_messages as $key):
                                $message_file = $obj_fetch->fetchMessageFile("INDIVIDUAL", "msg_id/".$key['msg_id']);
                                $sender_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$key['msg_from'])[0];
                                ?>
                                <tr>
                                    <td><span class="right badge badge-success">New</span></td>
                                    <td class="mailbox-name">
                                        <a href="?read=<?php echo $key['msg_id'];?>"><?php echo ucwords($sender_info['name']); ?></a>
                                    </td>
                                    <td class="mailbox-subject">Message - <i class="msgTextTimp"><?php echo $key['message']; ?></i></td>
                                    <td class="mailbox-attachment">
                                        <?php if(count($message_file) != 0):?>
                                            <i class="fas fa-paperclip"></i>
                                        <?php endif ?>
                                    </td>
                                    <td class="mailbox-date"><?php echo $obj_const->timeElapsedString($key['datereg'])." ago";?></td>
                                </tr>
                            <?php endforeach?>
                        <?php else:?>
                          <center>
                            <b class="text-red"> There is no new message</b>
                        </center>
                        <?php endif?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php elseif(isset($_GET['readed'])):?>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive mailbox-messages">
                   <table class="table table-hover table-striped">
                        <tbody>
                        <?php if(count($readed_messages)!=0):?>
                            <?php foreach ($readed_messages as $key):
                                $message_file = $obj_fetch->fetchMessageFile("INDIVIDUAL", "msg_id/".$key['msg_id']);
                                $sender_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$key['msg_from'])[0];
                                ?>
                                <tr>
                                    <td></td>
                                    <td class="mailbox-name">
                                        <a href="?read=<?php echo $key['msg_id'];?>"><?php echo ucwords($sender_info['name']); ?></a>
                                    </td>
                                    <td class="mailbox-subject">Message - <i class="msgTextTimp"><?php echo $key['message']; ?></i></td>
                                    <td class="mailbox-attachment">
                                        <?php if(count($message_file) != 0):?>
                                            <i class="fas fa-paperclip"></i>
                                        <?php endif ?>
                                    </td>
                                    <td class="mailbox-date"><?php echo $obj_const->timeElapsedString($key['datereg'])." ago";?></td>
                                </tr>
                            <?php endforeach?>
                        <?php else:?>
                          <center>
                            <b class="text-red"> There is no message</b>
                        </center>
                        <?php endif?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php elseif(isset($_GET['read'])):
    $message_detail=$obj_fetch->fetchMessage("INDIVIDUAL", "msg_id/".$_GET['read'])[0];
    $item_info = $obj_fetch->fetchItems("INDIVIDUAL", $message_detail['item_id'])[0];
    if($message_detail['msg_from'] != $_SESSION['userid']){
        $obj_fetch->updateReadedMessage($message_detail['msg_id']);
    }
    $message_file = $obj_fetch->fetchMessageFile("INDIVIDUAL", "msg_id/".($_GET['read']));
    ?>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Read:</h3>
            </div>
            <?php if($message_detail['msg_from']!=$_SESSION['userid']):
                $sender_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$message_detail['msg_from'])[0];
                ?>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">From:</dt>
                        <dd class="col-sm-9"><?php echo ucwords($sender_info['name']);?></dd> 
                        <dt class="col-sm-3">Issue Item:</dt>
                        <dd class="col-sm-9"><a href="item.php?listItem&view=<?php echo $item_info['item_id'];?>"><?php echo ucwords($item_info['name']);?></a></dd> 
                        <?php if($message_detail['reply']!=""): ?>
                            <dt class="col-sm-3">Replied to:</dt>
                            <dd class="col-sm-9"><a href="?read=<?php echo $message_detail['reply'];?>">Click to see previous message</a></dd>
                        <?php endif?>
                    </dl>
                    <hr>
                    <dl class="row">
                       <dt class="col-sm-3">Message:</dt>
                       <dd class="col-sm-9"><?php echo $message_detail['message']; ?></dd> 
                    </dl>
                    <hr>
                    <?php if(count($message_file)!=0):?>
                    <div class="card-footer bg-white">
                        <label>Attached Files:</label>
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                            <?php foreach($message_file as $key):?>
                                <li>
                                    <span class="mailbox-attachment-icon has-img"><img src="../../files/message/<?php echo $key['filePath']; ?>" alt="Attachment"></span>

                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> <?php echo explode("_",$key['filePath'])[3];?></a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                            <a href="../../files/message/<?php echo $key['filePath']; ?>" target="_blank" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach?>
                        </ul>
                    </div>
                    <?php endif?>
                    <a href="?compose=<?php echo $_GET['read'];?>">
                        <button class="btn btn-default">
                            <i class="fas fa-reply"></i>
                            Reply
                        </button>
                    </a>
                    <a href="?delete=<?php echo $_GET['read'];?>">
                    <button class="btn btn-danger float-right">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>
                    </a>
                </div>
            <?php else:$sender_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$message_detail['msg_to'])[0];?>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">To:</dt>
                        <dd class="col-sm-9"><?php echo ucwords($sender_info['name']);?></dd> 
                        <dt class="col-sm-3">Issue Item:</dt>
                        <dd class="col-sm-9"><a href="item.php?listItem&view=<?php echo $item_info['item_id'];?>"><?php echo ucwords($item_info['name']);?></a></dd> 
                        <?php if($message_detail['reply']!=""): ?>
                            <dt class="col-sm-3">Replied to:</dt>
                            <dd class="col-sm-9"><a href="?read=<?php echo $message_detail['reply'];?>">Click to see previous message</a></dd>
                        <?php endif?>
                    </dl>
                    <hr>
                    <dl class="row">
                       <dt class="col-sm-3">Message:</dt>
                       <dd class="col-sm-9"><?php echo $message_detail['message']; ?></dd> 
                    </dl>
                    <hr>
                    <?php if(count($message_file)!=0):?>
                    <div class="card-footer bg-white">
                        <label>Attached Files:</label>
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                            <?php foreach($message_file as $key):?>
                                <li>
                                    <span class="mailbox-attachment-icon has-img"><img src="../../files/message/<?php echo $key['filePath']; ?>" alt="Attachment"></span>

                                    <div class="mailbox-attachment-info">
                                        <a href="#" class="mailbox-attachment-name"><i class="fas fa-camera"></i> <?php echo explode("_",$key['filePath'])[3];?></a>
                                        <span class="mailbox-attachment-size clearfix mt-1">
                                            <a href="../../files/message/<?php echo $key['filePath']; ?>" target="_blank" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach?>
                        </ul>
                    </div>
                    <?php endif?>
                    <a href="?delete=<?php echo $_GET['read'];?>">
                    <button class="btn btn-danger float-right">
                        <i class="fas fa-trash"></i>
                        Delete
                    </button>
                    </a>
                </div>
            <?php endif?>
        </div>
    </div>
<?php elseif(isset($_GET['compose'])):
    $message_detail=$obj_fetch->fetchMessage("INDIVIDUAL", "msg_id/".$_GET['compose'])[0];
    $sender_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$message_detail['msg_from'])[0];
    $item_info = $obj_fetch->fetchItems("INDIVIDUAL", $message_detail['item_id'])[0];
    ?>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Compose:</h3>
            </div>
            <div class="card-body">
                <?php if(isset($retrn_message_msg)): ?>
                    <div class="alert <?php echo $retrn_message_msg[0]; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        <?php echo $retrn_message_msg[1]; ?>
                    </div>
                <?php endif?>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="msg_from" value="<?php echo $message_detail['msg_to']; ?>">
                    <input type="hidden" name="msg_to" value="<?php echo $message_detail['msg_from']; ?>">
                    <input type="hidden" name="item_id" value="<?php echo $message_detail['item_id']; ?>">
                    <input type="hidden" name="prev_msg" value="<?php echo $message_detail['msg_id']; ?>">
                    <dl class="row">
                       <dt class="col-sm-3">To:</dt>
                       <dd class="col-sm-9"><?php echo ucwords($sender_info['name']);?></dd> 
                       <dt class="col-sm-3">Issue Item:</dt>
                       <dd class="col-sm-9"><a href="item.php?listItem&view=<?php echo $item_info['item_id'];?>"><?php echo ucwords($item_info['name']);?></a></dd> 
                    </dl>
                    <hr>
                    <dl class="row">
                       <dt class="col-sm-3">Message:</dt>
                       <dd class="col-sm-9">
                           <textarea id="compose-textarea" name="message" class="form-control" required></textarea>
                       </dd> 
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Upload Photo:</label>
                                <input type="file" id="photofile" name="messageImage[]" multiple class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <button type="submit" name="btnSendRply" class="btn btn-primary float-right mr-5">
                        <i class="fas fa-check"></i>
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php elseif(isset($_GET['send'])):?>
    <div class="col-md-9">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Inbox</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive mailbox-messages">
                   <table class="table table-hover table-striped">
                        <tbody>
                        <?php if(count($sended_messages)!=0):?>
                            <?php foreach ($sended_messages as $key):
                                $message_file = $obj_fetch->fetchMessageFile("INDIVIDUAL", "msg_id/".$key['msg_id']);
                                $sender_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$key['msg_to'])[0];
                                ?>
                                <tr>
                                    <td></td>
                                    <td class="mailbox-name">
                                        <a href="?read=<?php echo $key['msg_id'];?>"><?php echo ucwords($sender_info['name']); ?></a>
                                    </td>
                                    <td class="mailbox-subject">Message - <i class="msgTextTimp"><?php echo $key['message']; ?></i></td>
                                    <td class="mailbox-attachment">
                                        <?php if(count($message_file) != 0):?>
                                            <i class="fas fa-paperclip"></i>
                                        <?php endif ?>
                                    </td>
                                    <td class="mailbox-date"><?php echo $obj_const->timeElapsedString($key['datereg'])." ago";?></td>
                                </tr>
                            <?php endforeach?>
                        <?php else:?>
                          <center>
                            <b class="text-red"> There is no message</b>
                        </center>
                        <?php endif?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endif?>