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
                <a href="#" class="d-block">Today - <</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="home.php" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>      

            </ul>
        </nav>
    </div>
</aside>