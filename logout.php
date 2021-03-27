<?php 
session_start();
if($_GET['t'] == "admin"){
	unset($_SESSION['adminid']);
	header("location: /qefira-clone/admin/");
}elseif($_GET['t'] == "user"){
	unset($_SESSION['userid']);
	header("location: /qefira-clone/?type=logout");
}


exit;