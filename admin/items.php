<?php 
session_start();
include 'autoloader.php';
$itemctive = "active";
$obj_fetch = new fetch;
$obj_register = new register;
$obj_const = new constant;
$admin_info = $obj_fetch->fetchAdmin("INDIVIDUAL", "admin_id/".$_SESSION['adminid'])[0];
$catagories = $obj_fetch->fetchCatagories("ALL");
if(isset($_GET['status'])){
$status_update_return=$obj_fetch->updateItemStatus($_GET['status'], "admin");
if($status_update_return=="success"){
  $status_update_return_msg = array("alert-success","Item successfuly Updated!"); 
}elseif($status_update_return=="errUnk"){
  $status_update_return_msg = array("alert-danger","Something went wrong, please try again!");
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
            <h1 class="m-0 text-dark">Items</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <?php if(!isset($_GET['q']) && !isset($_GET['i']) && !isset($_GET['c']) && !isset($_GET['view'])):?>
         <?php include 'includes/item/filter.php'; ?>
        <?php elseif(isset($_GET['q']) || isset($_GET['i']) || isset($_GET['c']) || isset($_GET['view'])):?>
          <?php include 'includes/item/result.php'; ?>
        <?php endif?>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
