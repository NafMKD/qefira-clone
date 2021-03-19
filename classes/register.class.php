<?php 

/**
 * Insert to Database
 */
class register extends db
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

	private function idgenerator($target,$table){
		$query = mysqli_query($this->conn(), "SELECT * FROM $target");
		$id_array = array();
        while ($row_id = mysqli_fetch_assoc($query)) {
            $id_array[] = $row_id[$table];
        }
        if (count($id_array) == 0) {
           return 1000;
        } else {
            return end($id_array) + 1;
        }
	}

	/**
	 * Insertion of data to users table
	 * @param $name=user full name, $email= users working email, $phone= users working phone, $password=user password for account , $telegram= user telegram account(optional), $whatsapp=user whatsapp account (optional)
	 * @return Case #1 -> errEmail = when there is existing account with enterd email in the database.
	 * 		   Case #2 -> errPhone = when there is existing account with enterd phone number in the database.
	 *         Case #3 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	           Case #4 -> success = when the data is inserted successfuly with no problem.
	 */			
	public function registerUsers($name, $email, $phone, $password, $telegram="", $whatsapp=""){
		$name = $this->myencode($name);
		$email = $this->myencode($email);
		$phone = $this->myencode($phone);
		$password = $this->myencode(md5($password));
		$telegram = $this->myencode($telegram);
		$whatsapp = $this->myencode($whatsapp);
		$date = $this->dategen();
		$newid = $this->idgenerator("users", "usr_id");

		$sql = "INSERT INTO users(usr_id, name, email, phone, password, telegram, whatsapp, isactive, datereg) VALUES('$newid', '$name', '$email', '$phone', '$password', '$telegram', '$whatsapp', 1, '$date')";
		$sql1 = "SELECT * FROM users WHERE email= '$email'";
		$sql2 = "SELECT * FROM users WHERE phone= '$phone'"; 
		if(mysqli_num_rows(mysqli_query($this->conn(), $sql1)) == 0){
			if(mysqli_num_rows(mysqli_query($this->conn(), $sql2)) == 0){
				if(mysqli_query($this->conn(), $sql)){
					return "success";
				}else{
					return "errUnk";
				}
			}else{
				return "errPhone";
			}
		}else{
			return "errEmail";
		}
	}
}