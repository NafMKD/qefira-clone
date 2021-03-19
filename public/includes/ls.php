<?php 
include 'autoloader.php';
$obj_login = new login;
$obj_register = new register;
if(isset($_POST['btn_login'])){
	$phone = $_POST['phone'];
	$pass = $_POST['password'];

	$msj_login = $obj_login->signin($phone, $pass);
}

if(isset($_POST['btn_singup'])){
	$phone = $_POST['phone'];
	$name = $_POST['fullname'];
	$pass = $_POST['rpassword'];
	$email = $_POST['email'];
	$telegram = $_POST['telegram'];
	$whatsapp = $_POST['whatsapp'];

	$msj_rec = $obj_register->registerUsers($name, $email, $phone, $pass, $telegram, $whatsapp);

	if($msj_rec == "errUnk"){
		$msj_register = "Something went wrong, please try again";
	}elseif($msj_rec == "errPhone"){
		$msj_register = "There is an existing account with this Phone Number";
	}elseif($msj_rec == "errEmail"){
		$msj_register = "There is an existing account with this Email";
	}elseif($msj_rec == "success"){
		$obj_login->signin($phone, $pass);
	}
	
}