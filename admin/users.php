<?php 
session_start();
include 'autoloader.php';
$usersctive = "active";
$obj_fetch = new fetch;
$obj_register = new register;
$obj_const = new constant;
$admin_info = $obj_fetch->fetchAdmin("INDIVIDUAL", "admin_id/".$_SESSION['adminid'])[0];
$all_users = $obj_fetch->fetchUsers("ALL");
if(isset($_POST['activate_user'])){
  $usrid = $_POST['user_id_stat'];
  $return_msg = $obj_register->updateUserStatus($usrid, 1);
  if ($return_msg=="success") {
    $return_msg_dis = array("alert-success", "User successfuly activated!");
  }else{
    $return_msg_dis = array("alert-danger", "Something went wrong!");
  }
}
if(isset($_POST['deactivate_user'])){
  $usrid = $_POST['user_id_stat'];
  $return_msg = $obj_register->updateUserStatus($usrid, 0);
  if ($return_msg=="success") {
    $return_msg_dis = array("alert-success", "User successfuly deactivated!");
  }else{
    $return_msg_dis = array("alert-danger", "Something went wrong!");
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
            <h1 class="m-0 text-dark">Users</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <?php include 'includes/user/listview.php'; ?>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
