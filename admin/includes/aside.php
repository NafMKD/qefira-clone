<?php 

if(!isset($_SESSION['adminid'])){
    header("location: ../admin/?errSession");
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<center>
    <a href="#" class="brand-link text-sm">
        <span class="brand-text font-weight-light">ADMINISTRATOR</span>
    </a>
</center>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-globe fa-2x"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block">Today - <?php echo $obj_const->dateFormater(date("m/d/y"))?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="home.php" class="nav-link <?php if (isset($dashctive)) echo "active"; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview <?php if (isset($catactive)) echo "menu-open";?>">
                    <a href="#" class="nav-link <?php if (isset($catactive)) echo ($catactive);?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Catagories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="catagory.php?addNewCat" class="nav-link <?php if(isset($_GET['addNewCat'])) echo "active"; ?>">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Catagory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="catagory.php?listCat" class="nav-link <?php if(isset($_GET['listCat'])) echo "active"; ?>">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Catagory List</p>
                            </a>
                        </li>
                    </ul>
                </li> 

                <li class="nav-item">
                    <a href="items.php" class="nav-link <?php if (isset($itemctive)) echo "active"; ?>">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Items
                        </p>
                    </a>
                </li>  

                <li class="nav-item">
                    <a href="users.php" class="nav-link <?php if (isset($usersctive)) echo "active"; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>    

            </ul>
        </nav>
    </div>
</aside>