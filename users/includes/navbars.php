<?php 

if(!isset($_SESSION['userid'])){
    header("location: ../public/?errSession");
}

?>

<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
    </div>
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
     <li class="nav-item">
      <a href="profile.php" >
        <?php
        echo ucwords($user_info['name']); 
        ?>
      </a>
    </li>
    <li class="nav-item ml-2 mr-2">
      |
    </li>
    <li class="nav-item">
      <a href="../logout.php?t=user" class="text-red">Log out <i class="fas fa-sign-out-alt"></i></a>
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
       <li class="nav-item">
         <a href="categories.php?c=electonics" class="nav-link text-white">Electronics</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="categories.php?c=home-garden-kids" class="nav-link text-white">Home, Garden & Kids</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="categories.php?c=vehicles" class="nav-link text-white">Vehicles</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="categories.php?c=car-parts" class="nav-link text-white">Car Parts & Accessories</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="categories.php?c=property-rental" class="nav-link text-white">Property Rentals & Sales</a>
       </li>
       <li class="nav-item d-none d-sm-inline-block">
         <a href="#" class="nav-link text-white"><i class="fas fa-th-large mr-2"></i>Other Catagories</a>
       </li>
     </ul>    
   </div>
 </nav>
