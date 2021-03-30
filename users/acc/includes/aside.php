<?php 

if(!isset($_SESSION['userid'])){
    header("location: ../../public/?errSession");
}

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<center>
    <a href="#" class="brand-link text-sm">
        <span class="brand-text font-weight-light">SELLER</span>
    </a>
</center>
    <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <?php if(count($user_file)==0):?>
                    <img src="../../assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                <?php else: ?>
                    <img src="../../files/users/<?php echo $user_file[0]['filePath']; ?>" class="img-circle elevation-2" alt="User Image">
                <?php endif?>
              
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo ucwords($user_info['name']); ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="home.php" class="nav-link <?php if(isset($dashactive))echo "active"; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li> 

                <li class="nav-item has-treeview <?php if (isset($itemactive))echo "menu-open"; ?>">
                    <a href="#" class="nav-link <?php if (isset($itemactive))echo ($itemactive); ?>">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Items
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="item.php?addNewItem" class="nav-link <?php if(isset($_GET['addNewItem'])) echo "active"; ?>">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Item</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="item.php?listItem" class="nav-link <?php if(isset($_GET['listItem'])) echo "active"; ?>">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Items List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="message.php?unread" class="nav-link <?php if(isset($messctive))echo "active"; ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Messages
                            <?php if (count($unread_messages_for_aside) != 0): ?>
                                <span class="right badge badge-warning"><?php echo count($unread_messages_for_aside); ?></span>
                            <?php endif ?>
                        </p>
                    </a>
                </li>     

                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?php if(isset($profctive))echo "active"; ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>