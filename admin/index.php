<?php 
session_start();
include 'autoloader.php';
if(isset($_SESSION['adminid'])){
    header("location: ../admin/home.php");
}
if (isset($_POST['btnSignIn'])) {
  $userid = $_POST['userid'];
  $userpass = $_POST['userpass'];
  $obj_login = new login;
  $log_met = $obj_login->adminSignin($userid, $userpass);
  
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="../assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <title>Admin | Login</title>
</head>
<body class="hold-transition sidebar-collapse layout-top-nav layout-footer-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../" class="navbar-brand">
        <img src="../assets/dist/img/q.svg" alt="Q Logo" class="brand-image"
      style="opacity: .9;height: 25px;">
      </a>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">ADMIN PAGE</a>
          </li>
        </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

      </ul>
    </div>
  </nav>
  <div class="login-box container mt-5">
    <div class="login-logo">
      <a href="../" >
        <img src="../assets/dist/img/q.svg" alt="Q Logo" class="brand-image"
        style="opacity: .9;height: 40px;">  
      </a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="post">
          <?php if(isset($log_met)){ ?>
          <div class='alert alert-danger'>
            <center>
              <i class='icon fa fa-times-circle'></i>
              <?php echo $log_met; ?>
              <br>
            </center>
          </div>
          <?php }?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="userid" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="userpass" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
              <button type="submit" id="sibtn" name="btnSignIn" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include 'includes/footer.php' ?>
</div>
<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/dist/js/adminlte.js"></script>
<script src="../assets/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../assets/sweetalert2/sweetalert2.min.js"></script>
<?php if(isset($_GET['errSession'])): ?>
<script>
  $(function(){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
      Toast.fire({
        icon: 'error',
        title: 'You are not authorized!, please login to continue'
      })
  });
</script>
<?php endif ?>
<script>
    $(function () {
      
        $('#sibtn').on('click', function(){
            $('#sibtn').html("Loading ...");
        });
    });
</script>
</body>
</html>
