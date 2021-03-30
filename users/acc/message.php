<?php 
session_start();
include 'autoloader.php';
$messctive = "active";
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
$user_file = $obj_fetch->fetchUsersFile("INDIVIDUAL", "usr_id/".$_SESSION['userid']);
$unread_messages = $obj_fetch->fetchMessage("STATUS", $_SESSION['userid']."/0");
$readed_messages = $obj_fetch->fetchMessage("STATUS", $_SESSION['userid']."/1");
$sended_messages = $obj_fetch->fetchMessage("INDIVIDUAL", "msg_from/".$_SESSION['userid']);

if(isset($_POST['btnSendRply'])){
  $msg_from = $_POST['msg_from'];
  $msg_to = $_POST['msg_to'];
  $item_id = $_POST['item_id'];
  $prev_msg = $_POST['prev_msg'];
  $message = $_POST['message'];

  $retrn_message = $obj_register->registerMessages($msg_to, $msg_from, $item_id, $message, $prev_msg);
  if($retrn_message=="errUnk"){
    $retrn_message_msg= array("alert-danger","Something went wrong, please try again!");
  }else{
    if(!empty($_FILES['messageImage']['name'])){
      foreach ($_FILES['messageImage']['tmp_name'] as $key => $image) {
            $folderpath ='../../files/message/';
            $item_file_reg_ret=$obj_register->uploadMessagesFile($retrn_message,'messageImage',$key,$folderpath);
        }
        $retrn_message_msg=array("alert-success","Message successfuly sended!");
    }
  }
}

if(isset($_GET['delete'])){
  $del_return = $obj_fetch->deleteMessages($_GET['delete'],"../../files/message/");
  if($del_return=="success"){
    header("location: ?unread&delsuc");
  }else{
    header("location: ?unread&delerr");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/header.php'?>
</head>
<body class="sidebar-mini layout-fixed layout-footer-fixed">
<div class="wrapper">
	<?php include 'includes/navbar.php'?>
	<?php include 'includes/aside.php'?>

  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Messages</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php include 'includes/message/nav.php';?>
        <?php include 'includes/message/main.php';?>
        </div>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
