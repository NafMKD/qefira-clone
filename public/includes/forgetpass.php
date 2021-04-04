<?php 

if(isset($_POST['btn_request_pass'])){
	$email = $_POST['email_reset'];
	$email_check_return = $obj_fetch->fetchUsers("INDIVIDUAL", "email/".$email);
	if(count($email_check_return)==0){
		$final_pass_forget = array("alert-danger", "times-circle", "There is no account with this email, please sign up!");
	}else{
		$user_id = $email_check_return[0]['usr_id'];
		$send_email_return = $obj_register->sendPassReset($user_id, $email);
		if($send_email_return=="errSend"){
			$final_pass_forget = array("alert-warning", "exclamation-circle", "We are having problem on sending email, please try again!");
		}elseif($send_email_return=="errUnk"){
			$final_pass_forget = array("alert-danger", "times-circle", "Something went wrong, please try again!");
		}elseif($send_email_return=="success"){
			$final_pass_reset = array("alert-success", "check-circle", "Authentication code is sended to your email, please check it!");
			$final_pass_reset_modal_dis = $email;
		}
	}
}

if(isset($_POST['btn_reset_pass'])){
	$email = $_POST['user_email_reset']; 
	$code = $_POST['pass_reset_code'];
	$email_check_return = $obj_fetch->fetchUsers("INDIVIDUAL", "email/".$email);
	if(count($email_check_return)==0){
		$final_pass_reset = array("alert-danger", "times-circle", "There is no account with this email, please sign up!");
	}else{
		$user_id = $email_check_return[0]['usr_id'];
		$check_code_return = $obj_fetch->checkAuthenticationCode($user_id,"passreset",$code);
		if($check_code_return=="invalid"){
			$final_pass_reset = array("alert-danger", "times-circle", "Invalid code, please try again!");
			$final_pass_reset_modal_dis = $email;
		}elseif($check_code_return=="errUnk"){
			$final_pass_reset = array("alert-danger", "times-circle", "Something went wrong, please try again!");
			$final_pass_reset_modal_dis = $email;
		}elseif($check_code_return=="success"){
			$final_pass_change_modal_dis = $email;
		}
	}
}

if(isset($_POST['btn_change_pass'])){
	$email = $_POST['user_email_change'];
	$newpass = $_POST['pass_change_pass'];
	$email_check_return = $obj_fetch->fetchUsers("INDIVIDUAL", "email/".$email);
	$obj_register->passwordReset($email_check_return[0]['usr_id'], $newpass);
	$obj_login->signin($email_check_return[0]['phone'], $newpass);
}
