<?php 
session_start();
include 'autoloader.php';
$dashactive = "active";
$obj_register = new register;
$obj_fetch = new fetch;
$obj_const = new constant;
$user_info = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$_SESSION['userid'])[0];
$user_file = $obj_fetch->fetchUsersFile("INDIVIDUAL", "usr_id/".$_SESSION['userid']);
$user_items = $obj_fetch->fetchItems("BYUSER", $user_info['usr_id']);
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
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo count($user_items);?></h3>

                <p>Item</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="item.php?listItem" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <?php if($user_info['isEmail'] ==""):?>
            <div class="callout callout-danger">
              <h5>Initiate Email!</h5>

              <p>You have to initiate to recive six-digit authentication code!<a href="profile.php">Click here.</a></p>
            </div>
          <?php elseif($user_info['isEmail'] !=""):?>
            <?php if($user_info['isEmail'] !=1):?>
                <div class="callout callout-warning">
                  <h5>Authenticate Email!</h5>

                  <p>You intiated Email authentication, now you have to authenticate your email!<a href="profile.php">Click here.</a></p>
                </div>
            <?php endif?>
          <?php endif?>

          <?php if($user_info['isPhone'] ==""):?>
            <div class="callout callout-danger">
              <h5>Initiate Phone!</h5>

              <p>You have to initiate to recive six-digit authentication code!<a href="profile.php">Click here.</a></p>
            </div>
          <?php elseif($user_info['isPhone'] !=""):?>
            <?php if($user_info['isPhone'] !=1):?>
                <div class="callout callout-warning">
                  <h5>Authenticate Phone!</h5>

                  <p>You intiated Phone authentication, now you have to authenticate your phone!<a href="profile.php">Click here.</a></p>
                </div>
            <?php endif?>
          <?php endif?>

          <?php if($user_info['isTelegram'] ==""):?>
            <div class="callout callout-danger">
              <h5>Initiate Telegram!</h5>

              <p>You have to initiate to recive six-digit authentication code!<a href="profile.php">Click here.</a></p>
            </div>
          <?php elseif($user_info['isTelegram'] !=""):?>
            <?php if($user_info['isTelegram'] !=1):?>
                <div class="callout callout-warning">
                  <h5>Authenticate Telegram!</h5>

                  <p>You intiated Telegram authentication, now you have to authenticate your telegram!<a href="profile.php">Click here.</a></p>
                </div>
            <?php endif?>
          <?php endif?>

          <?php if($user_info['isWhatsapp'] ==""):?>
            <div class="callout callout-danger">
              <h5>Initiate Whatsapp!</h5>

              <p>You have to initiate to recive six-digit authentication code!<a href="profile.php">Click here.</a></p>
            </div>
          <?php elseif($user_info['isWhatsapp'] !=""):?>
            <?php if($user_info['isWhatsapp'] !=1):?>
                <div class="callout callout-warning">
                  <h5>Authenticate Whatsapp!</h5>

                  <p>You intiated Whatsapp authentication, now you have to authenticate your whatsapp!<a href="profile.php">Click here.</a></p>
                </div>
            <?php endif?>
          <?php endif?>
      </div>
    </section>
  </div>

  
  <?php include 'includes/footer.php'?>
</div>

<?php include 'includes/script.php'?>
</body>
</html>
