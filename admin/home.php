<?php 
session_start();
include 'autoloader.php';
$dashctive = "active";
$obj_fetch = new fetch;
$obj_register = new register;
$obj_const = new constant;
$admin_info = $obj_fetch->fetchAdmin("INDIVIDUAL", "admin_id/".$_SESSION['adminid'])[0];
$itemlist=$obj_fetch->fetchItems("ALL");
$categorylist=$obj_fetch->fetchCatagories("ALL");
$userlist=$obj_fetch->fetchUsers("ALL");
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo count($itemlist);?></h3>

                <p>Item</p>
              </div>
              <div class="icon">
                <i class="fas fa-server"></i>
              </div>
              <a href="items.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo count($categorylist);?></h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="catagory.php?listCat" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo count($userlist);?></h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="users.php" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
