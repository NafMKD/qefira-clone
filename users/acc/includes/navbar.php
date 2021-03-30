<?php 

$unread_messages_for_aside = $obj_fetch->fetchMessage("STATUS", $_SESSION['userid']."/0");
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <?php if (count($unread_messages_for_aside) != 0): ?>
                    <span class="badge badge-warning navbar-badge"><?php echo count($unread_messages_for_aside); ?></span>
                <?php endif ?>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php if (count($unread_messages_for_aside) != 0): ?>
                    <span class="dropdown-item dropdown-header"><?php echo count($unread_messages_for_aside); ?> Messages</span>

                    <div class="dropdown-divider"></div>
                    <?php foreach ($unread_messages_for_aside as $key): 
                        $user_ifo_navbar = $obj_fetch->fetchUsers("INDIVIDUAL", "usr_id/".$key['msg_from'])[0];
                        ?>

                        <a href="message.php?read=<?php echo $key['msg_id'] ; ?>" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>Message from <?php echo ucwords($user_ifo_navbar['name']); ?>
                        </a>
                    <?php endforeach ?>
                    <div class="dropdown-divider"></div>
                        <a href="message.php?unread" class="dropdown-item dropdown-footer">See All Messages</a>
                <?php else: ?>
                    <span class="dropdown-item dropdown-header">No Messages</span>
                <?php endif ?>
               
            </div>
        </li>
        <li class="nav-item mr-1">
            <a class="nav-link text-green" href="../" role="button">
                Home
            </a>
        </li>
        <li class="nav-item mr-3">
            <a class="nav-link text-red" href="../../logout.php?t=user" role="button">
                Log out <i class="fas fa-sign-out-alt ml-1"></i>
            </a>
        </li>
    </ul>
</nav>