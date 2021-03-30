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
    $obj_register->uploadUsersFile($userid, 'fileNewUser',$folder);
  }
}

if(isset($_POST['updatuploadUserData'])){
  $userid = $_POST['user_ID'];
  $folder ='../../files/users/';
  $oldfile = $user_file[0]['filePath'];
  if (!empty($_FILES['fileNewUser']['name'])) {
    $obj_register->updateUserFile($userid, 'fileNewUser',$folder,$oldfile);
  }
}

if(isset($_GET['init'])){
  $int = $_GET['init'];
  if($int==1){
    if($user_info['isEmail']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isEmail");
      $final_return=array("alert-success","Authenticatin initiated please check your email!");
    }
  }elseif($int==2){
    if($user_info['isPhone']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isPhone");
      $final_return=array("alert-success","Authenticatin initiated please check your phone!");
    }
  }elseif($int==2){
    if($user_info['isTelegram']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isTelegram");
      $final_return=array("alert-success","Authenticatin initiated please check your telegram!");
    }
  }elseif($int==2){
    if($user_info['isWhatsapp']==1){
      $final_return=array("alert-danger","Invalid request!");
    }else{
      $obj_register->registerUserAuthentication($user_info['usr_id'],"isWhatsapp");
      $final_return=array("alert-success","Authenticatin initiated please check your whatsapp!");
    }
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
</body>
</html>
