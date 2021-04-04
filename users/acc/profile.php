<?php 
session_start();
include 'autoloader.php';
$profctive = "active";
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
$user_file = $obj_fetch->fetchUsersFile("INDIVIDUAL", "usr_id/".$_SESSION['userid']);

if(isset($_POST['uploadUserData'])){
  $userid = $_POST['user_ID'];
  $folder ='../../files/users/';
  if (!empty($_FILES['fileNewUser']['name'])) {
    $file_upload_return = $obj_register->uploadUsersFile($userid, 'fileNewUser',$folder);
    if($file_upload_return=="success"){
      $file_upload_final = array("alert-success","check-circle","Photo successfuly uploaded!");
    }elseif($file_upload_return=="errUnk"){
      $file_upload_final = array("alert-danger","times-circle","Something went wrong, please try again!");
    }
    print_r($file_upload_final);
  }
}

if(isset($_POST['updatuploadUserData'])){
  $userid = $_POST['user_ID'];
  $folder ='../../files/users/';
  $oldfile = $user_file[0]['filePath'];
  if (!empty($_FILES['fileNewUser']['name'])) {
    $file_upload_return = $obj_register->updateUserFile($userid, 'fileNewUser',$folder,$oldfile);
    if($file_upload_return=="success"){
      $file_upload_final = array("alert-success","check-circle","Photo successfuly updated!");
    }elseif($file_upload_return=="errUnk"){
      $file_upload_final = array("alert-danger","times-circle","Something went wrong, please try again!");
    }
    print_r($file_upload_return);
  }
}

if(isset($_POST['init'])){
  $int = $_POST['init'];
  if($int==1){
    if($user_info['isEmail']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $return_suth=$obj_register->registerUserAuthentication($user_info['usr_id'],"isEmail",$user_info['email']);
      if($return_suth == "errSend"){
        $final_return=array("alert-warning","We are having problem on sending email, please try again!");
      }else{ 
        $final_return=array("alert-success","Authenticatin initiated please check your email!");
      }
    }
  }elseif($int==2){
    if($user_info['isPhone']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isPhone");
      $final_return=array("alert-success","Authenticatin initiated please check your phone!");
    }
  }elseif($int==3){
    if($user_info['isTelegram']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isTelegram");
      $final_return=array("alert-success","Authenticatin initiated please check your telegram!");
    }
  }elseif($int==4){
    if($user_info['isWhatsapp']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isWhatsapp");
      $final_return=array("alert-success","Authenticatin initiated please check your whatsapp!");
    }
  }
  $user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
}

if(isset($_POST['btn_auth'])){
  $for=$_POST['forAuthenticate'];
  $val = $_POST['authcode'];
  if($for=="Email"){
    $return_fun = $obj_fetch->checkAuthenticationCode($_SESSION['userid'],'isEmail',$val);
  }elseif($for=="Phone"){
    $return_fun = $obj_fetch->checkAuthenticationCode($_SESSION['userid'],'isPhone',$val);
  }elseif($for=="Telegram"){
    $return_fun = $obj_fetch->checkAuthenticationCode($_SESSION['userid'],'isTelegram',$val);
  }elseif($for=="Whatsapp"){
    $return_fun = $obj_fetch->checkAuthenticationCode($_SESSION['userid'],'isWhatsapp',$val);
  }
  if ($return_fun=="success") {
    $authcodereturnval = array("alert-success","check-circle","Successfuly auhtenticated!");
  }elseif ($return_fun=="invalid") {
    $authcodereturnval = array("alert-danger","times-circle","Invalid code, please try again!");
  }else{
    $authcodereturnval = array("alert-danger","times-circle","Something went wrong, please try again!");
  }
  $user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
}

if(isset($_POST['btn_change_pass'])){
  $oldpass = $_POST['old_pass_change'];
  $newpass = $_POST['new_pass_change'];
  if($user_info['password']==md5($oldpass)){
    $return_pass = $obj_register->passwordReset($user_info['usr_id'], $newpass);
    if($return_pass=="success"){
      $final_pass_change_return = array("alert-success","check-circle","Password successfuly chenged!");
    }elseif($return_pass=="errUnk"){
      $final_pass_change_return = array("alert-danger", "times-circle", "Something went wrong, please try again!");
    } 
  }else{
    $final_pass_change_return = array("alert-danger", "times-circle", "Incorrect old password, please try again!");
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
            <h1 class="m-0 text-dark">Profile</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <?php include 'includes/profile/main.php'; ?>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
<script>
  $(function(){
    $('#autBtn').on('click', function(){
        $('#modal-authenticate').modal('show');
        $tr =  $(this).closest('tr');
        var data = $tr.children("td").map(function(){return $(this).text();}).get();
        $('#forAuthInput').val(data[1]);
    });
  });
  <?php if(isset($_GET['modal']) && !isset($authcodereturnval)):?>
    $('#modal-authenticate').modal('show');
    $('#forAuthInput').val('<?php echo $_GET['modal']; ?>');
  <?php endif?>
</script>
</body>
</html>
