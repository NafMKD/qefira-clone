<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
    </div>
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
     <li class="nav-item">
      <a data-toggle="modal" href="#modal-signin" >Login</a>
    </li>
    <li class="nav-item ml-2 mr-2">
      |
    </li>
    <li class="nav-item">
      <a data-toggle="modal" href="#modal-signup" >Sign up</a>
    </li>
  </ul>
</div>
</nav>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white mt-2 mb-2">
  <div class="container">
    <a href="/qefira-clone/public/" class="navbar-brand">
      <img src="../assets/dist/img/q.svg" alt="Q Logo" class="brand-image"
      style="opacity: .9;height: 40px;">
    </a>
    
    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">

      <form class="form-inline ml-5" style="width: 100%;" action="search.php">
        <div class="input-group input-group-md" style="width: 95%;">
          <input class="form-control form-control-navbar " name="q" style="border: red 1px solid;" type="search" 
          <?php if(isset($_GET['q'])): ?>
            value = "<?php echo $_GET['q']; ?>"
            <?php else: ?>
             placeholder="i'm loking for..."
             <?php endif ?> aria-label="Search">
             <div class="input-group-append">
              <button class="btn btn-navbar" type="submit" style="border: red 1px solid;" >
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>

      </div>


      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <a >
          	<button class="btn btn-danger btn-flat btn-md" data-toggle="modal" data-target="#modal-signup" >Post Free Ad</button>
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <nav class="main-header navbar navbar-expand-md  navbar-danger">
    <div class="container">  

      <ul class="navbar-nav ml-4" >
        <?php $cnt=0;foreach ($catagories as $key): ?>
          <?php if($cnt <5):?>
            <?php if($key['isactive']==1):?>
              <li class="nav-item">
               <a href="categories.php?c=<?php echo $key['cat_id']; ?>" class="nav-link text-white"><?php echo $key['name']; ?></a>
              </li>
            <?php $cnt++;endif?>
          <?php endif ?>
        <?php endforeach ?>
        <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link text-white"><i class="fas fa-th-large mr-2"></i>Other Catagories</a>
        </li>
      </ul>    
   </div>
 </nav>

 <div class="modal fade" id="modal-signin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <p class="login-box-msg">Login to start your session</p>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <?php if(isset($msj_login)){ ?>
                <div class='alert alert-danger'>
                  <center>
                    <i class='icon fa fa-times-circle'></i>
                    <?php echo $msj_login; ?>
                    <br>
                  </center>
                </div>
              <?php }?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
          <br>
          <div class="row">
            <div class="col-7"></div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block" name="btn_login" id="btnLogin">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-signup">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sing Up</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <p class="login-box-msg">Register a new membership</p>
          <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
              <?php if(isset($msj_register)){ ?>
                <div class='alert alert-danger'>
                  <center>
                    <i class='icon fa fa-times-circle'></i>
                    <?php echo $msj_register; ?>
                    <br>
                  </center>
                </div>
              <?php }?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="telegram" placeholder="Telegram" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-paper-plane"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp" >
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-whatsapp"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="rpassword" placeholder="Password" required>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
          <br>
          <div class="row">
            <div class="col-7"></div>
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block" name="btn_singup" id="btnSingUp">Sign up <i class="fas fa-user-plus ml-1"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>