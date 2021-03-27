<?php

/**
 * Login 
 */
class login extends db
{
	private $phone;
	private $password;

	public function signin($phone, $password)
	{
		$this->phone = mysqli_real_escape_string($this->conn(), $phone);
		$this->password = mysqli_real_escape_string($this->conn(), md5($password));

		$sql = "SELECT * FROM users WHERE phone = '$this->phone' AND password = '$this->password'";
		$query = mysqli_query($this->conn(), $sql);

		if (mysqli_num_rows($query) == 1) {
			$sqli = mysqli_fetch_assoc($query);
			$id = $sqli['usr_id'];
			$isactive = $sqli['isactive'];
			if($isactive==0){
				$msg = "Your account is deactivated, Please reset your account!";
				return $msg;
			}elseif($isactive==1){
				$_SESSION['userid'] = $id;
				header('location: ../users/');
			}
			
		} else {
			$msg = "Username or Password Incorect";
			return $msg;
		}
	}


	public function adminSignin($username, $password)
	{
		$this->phone = mysqli_real_escape_string($this->conn(), $username);
		$this->password = mysqli_real_escape_string($this->conn(), md5($password));

		$sql = "SELECT * FROM admin WHERE username = '$this->phone' AND password = '$this->password'";
		$query = mysqli_query($this->conn(), $sql);

		if (mysqli_num_rows($query) == 1) {
			$sqli = mysqli_fetch_assoc($query);
			$id = $sqli['admin_id'];
			$_SESSION['adminid'] = $id;
			header('location: ../admin/home.php');
			
		} else {
			$msg = "Username or Password Incorect";
			return $msg;
		}
	}
}
