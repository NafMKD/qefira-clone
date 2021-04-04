<?php 

include 'db.class.php';
/**
 * Admin register 
 */
class AdminReg extends db
{
	private function dategen(){
		date_default_timezone_set("Africa/Addis_Ababa");
        $datefroinsert = date("m/d/Y");
        return $datefroinsert;
	}

	private function myencode($typ){
		$ret = mysqli_real_escape_string($this->conn(), $typ);
		return $ret;
	}	

	private function idgenerator($target,$table,$starter){
		$query = mysqli_query($this->conn(), "SELECT * FROM $target");
		$id_array = array();
        while ($row_id = mysqli_fetch_assoc($query)) {
            $id_array[] = $row_id[$table];
        }
        if (count($id_array) == 0) {
           return $starter;
        } else {
            return end($id_array) + 1;
        }
	}
	
	public function adminRegister($name, $username, $password){
		$name = $this->myencode($name);
		$username = $this->myencode($username);
		$password = $this->myencode(md5($password));
		$date = $this->dategen();
		$newid = $this->idgenerator("admin", "admin_id", 7856);

		$sql = "INSERT INTO admin(admin_id, name, username, password, regdate) VALUES('$newid', '$name', '$username', '$password', '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}
}

$name = readline("Enter Name : ");	
$username = readline("Enter User Name : ");	
$password = readline("Enter Password : ");

$obj = new AdminReg;

$rec = $obj->adminRegister($name, $username, $password);

if($rec == "success"){
	echo "Admin Successfuly Registered!";
}elseif($rec == "errUnk"){
	echo "Something Went Wrong, Please try again!";
}

