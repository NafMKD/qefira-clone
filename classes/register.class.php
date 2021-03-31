<?php 

/**
 * Insert to Database
 */
class register extends db
{
	private function dategen(){
		date_default_timezone_set("Africa/Addis_Ababa");
        $datefroinsert = date("m/d/Y H:i:s");
        return $datefroinsert;
	}

	private function dateGenerator($req){
		date_default_timezone_set("Africa/Addis_Ababa");
        $datefroinsert = date($req);
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

    /**
	 *
	 * send email authentication message 
	 * @param $to=to whome to send,$code=authentication code 
	 * @return Case #1 -> success => successfuly deleted
	 *         Case #2 -> errUnk = when the data is not deleted because of either there is interuption in connection or other 
	 *         Case #3 -> invalid = when the enterd key is not correct 
	*/
	private function sendAuthEmail($to,$code){
		$to = $this->myencode($to);
		$code = $this->myencode($code);
		$sub = 'Verify Your Email Address!';
		$headers =  "From: Qefira-clone";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$body = "Verification code is <b>".$code."</b> <br>
					use this link to insert the verification code <a href='http://localhost/qefira-clone/users/acc/profile.php?modal=Email'> click here </a>"
			;
		if (mail($to, $sub, $body, $headers)) {
		    return "success";
		} else {
		    return "errUnk";
		}
	}
#################################################################################################################################

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
		$newid = $this->idgenerator("users", "usr_id", 1000);

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

	/**
	 * Insertion of data to categories table
	 * @param $name = category name 
	 * @return Case #1 -> category id = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerCatagories($name){
		$name = $this->myencode($name);
		$newid = $this->idgenerator("catagories", "cat_id", 10000);
		$date = $this->dategen();

		$sql = "INSERT INTO catagories(cat_id, name, isactive, datereg) VALUES('$newid', '$name', 1, '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return $newid;
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to catkey table
	 * @param $cat_id = category ID, $catkey = catagory key
	 * @return Case #1 -> catkey id = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerCatKey($cat_id,$catkey){
		$cat_id = $this->myencode($cat_id);
		$catkey = $this->myencode($catkey);
		$newid = $this->idgenerator("cat_key", "cat_key_id", 100);
		$date = $this->dategen();

		$sql = "INSERT INTO cat_key(cat_key_id, cat_id, catkey, datreg) VALUES('$newid', '$cat_id', '$catkey', '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return $newid;
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to Items table
	 * @param $cat_id= catagory id, $name = name of the item, $price = price of the item, $negtype = negotation status
	 * @return Case #1 -> item id = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerItems($cat_id, $usr_id, $name, $price, $descr, $region, $comp, $city,$negtype){
		$cat_id = $this->myencode($cat_id);
		$name = $this->myencode($name);
		$usr_id = $this->myencode($usr_id);
		$price = $this->myencode($price);
		$descr = $this->myencode($descr);
		$region = $this->myencode($region);
		$comp = $this->myencode($comp);
		$city = $this->myencode($city);
		$negtype = $this->myencode($negtype);
		$newid = $this->idgenerator("items", "item_id", 12000);
		$date = $this->dategen();

		$sql = "INSERT INTO items(item_id, cat_id, usr_id, ad_item_id, name, price, descr, region, comp, city, negtype, isactive, regdate) VALUES('$newid', '$cat_id', '$usr_id',0, '$name', '$price', '$descr', '$region', '$comp', '$city', '$negtype', 1, '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return $newid;
		}else{
			return "errUnk";
		}
	}


	/**
	 * Insertion of data to Items Key Detail table
	 * @param $item_id = the item id, $cat_key_id = catagory key id, $cat_value = item value
	 * @return Case #1 -> success = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerItemsKeyDetail($item_id, $cat_key_id, $cat_value){
		$item_id = $this->myencode($item_id);
		$cat_key_id = $this->myencode($cat_key_id);
		$cat_value = $this->myencode($cat_value);
		$date = $this->dategen();

		$sql = "INSERT INTO items_key_detail(item_id, cat_key_id, cat_value, datreg) VALUES('$item_id', '$cat_key_id', '$cat_value', '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to Messages table
	 * @param $msg_to = reciver id, $msg_from = sender id, $item_id = item id, $message = message content
	 * @return Case #1 -> $newid = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerMessages($msg_to, $msg_from, $item_id, $message, $reply=""){
		$msg_to = $this->myencode($msg_to);
		$msg_from = $this->myencode($msg_from);
		$item_id = $this->myencode($item_id);
		$message = $this->myencode($message);
		$reply = $this->myencode($reply);
		$newid = $this->idgenerator("messages", "msg_id", 17000);
		$date = $this->dategen();

		$sql = "INSERT INTO messages(msg_id, msg_to, msg_from, item_id, message, reply, isreaded, datereg) VALUES('$newid', '$msg_to', '$msg_from', '$item_id', '$message', '$reply',0, '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return $newid;
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to Users File table
	 * @param $usr_id = user id, $filePath = file name
	 * @return Case #1 -> success = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerUsersFile($usr_id,$filePath){
		$usr_id = $this->myencode($usr_id);
		$filePath = $this->myencode($filePath);
		$date = $this->dategen();
		
		$sql = "INSERT INTO users_file(usr_id, filePath, datereg) VALUES('$usr_id', '$filePath', '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to Message File table
	 * @param $usr_id = message id, $filePath = file name
	 * @return Case #1 -> success = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerMessageFile($msg_id,$filePath){
		$msg_id = $this->myencode($msg_id);
		$filePath = $this->myencode($filePath);
		$date = $this->dategen();
		
		$sql = "INSERT INTO messages_file(msg_id, filePath, datereg) VALUES('$msg_id', '$filePath', '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to Users File table
	 * @param $usr_id = item id, $filePath = file name
	 * @return Case #1 -> success = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 */
	public function registerItemFile($item_id,$filePath){
		$item_id = $this->myencode($item_id);
		$filePath = $this->myencode($filePath);
		$date = $this->dategen();
		
		$sql = "INSERT INTO items_file(item_id, filePath, datereg) VALUES('$item_id', '$filePath', '$date')";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * Insertion of data to Users File table
	 * @param $usr_id = item id, $target = table column, $email= email of the user
	 * @return Case #1 -> success = data succesfuly inserted
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other factors.
	 *         Case #3 -> errSend = when the email is not sended because of either there is interuption in connection or other factors.
	 */
	public function registerUserAuthentication($usr_id,$target,$email=""){
		$usr_id = $this->myencode($usr_id);
		$target = $this->myencode($target);
		$rand = mt_rand(100000,999999);
		if($target=="isEmail"){
			$emailsend = $this->sendAuthEmail($email,$rand);
			if($emailsend=="success"){
				$sql = "UPDATE users SET $target='$rand' WHERE usr_id='$usr_id'";
				if(mysqli_query($this->conn(), $sql)){
					return "success";
				}else{
					return "errUnk";
				}
			}else{
				return "errSend";
			}
		}else{
			$sql = "UPDATE users SET $target='$rand' WHERE usr_id='$usr_id'";
			if(mysqli_query($this->conn(), $sql)){
				return "success";
			}else{
				return "errUnk";
			}
		}
	}

#################################################################################################################################


	/**
	 *
	 * Upload to Items_file
	 * @param $item_id = item id, $file = the file to be uploaded, $folder=where to upload, $position=file position
	 * @return Case #1 -> success => successfuly uploaded
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other 
	*/
	public function uploadItemFile($item_id,$file,$position,$folder){
		$date_path = $this->dateGenerator("mdY");
        $rand = uniqid();

		$main = $_FILES[$file] ['name'][$position];
        $name = "IFile_".$date_path."_".$rand."_".$main."";
        $loc = $_FILES[$file] ['tmp_name'][$position];
        if(move_uploaded_file($loc, $folder.$name)){
        	$this->registerItemFile($item_id,$name);
        	return "success";
        }else{
        	return "errUnk";
        }
	}


	/**
	 *
	 * Upload to messages_file
	 * @param $msg_id = message id, $file = the file to be uploaded, $folder=where to upload, $position=file position
	 * @return Case #1 -> success => successfuly uploaded
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other 
	*/
	public function uploadMessagesFile($msg_id,$file,$position,$folder){
		$date_path = $this->dateGenerator("mdY");
        $rand = uniqid();

		$main = $_FILES[$file] ['name'][$position];
        $name = "MFile_".$date_path."_".$rand."_".$main."";
        $loc = $_FILES[$file] ['tmp_name'][$position];
        if(move_uploaded_file($loc, $folder.$name)){
        	$this->registerMessageFile($msg_id,$name);
        	return "success";
        }else{
        	return "errUnk";
        }
	}


	/**
	 *
	 * Upload to users_file
	 * @param $usr_id = user id, $file = the file to be uploaded, $folder=where to upload
	 * @return Case #1 -> success => successfuly uploaded
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other 
	*/
	public function uploadUsersFile($usr_id,$file,$folder){
		$date_path = $this->dateGenerator("mdY");
        $rand = uniqid();

		$main = $_FILES[$file] ['name'];
        $name = "MFile_".$date_path."_".$rand."_".$main."";
        $loc = $_FILES[$file] ['tmp_name'];
        if(move_uploaded_file($loc, $folder.$name)){
        	$this->registerUsersFile($usr_id,$name);
        	return "success";
        }else{
        	return "errUnk";
        }
	}

	/**
	 *
	 * Upldate to users_file
	 * @param $usr_id = user id, $file = the file to be uploaded, $folder=where to upload, $oldfile=old file name
	 * @return Case #1 -> success => successfuly uploaded
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other 
	*/
	public function updateUserFile($usr_id,$file,$folder,$oldfile){
		unlink($folder."/".$oldfile."");
		mysqli_query($this->conn(), "DELETE FROM users_file WHERE usr_id = '$usr_id'");

		$date_path = $this->dateGenerator("mdY");
        $rand = uniqid();

		$this->uploadUsersFile($usr_id,$file,$folder);
	}

	/**
	 *
	 * Upldate to user status
	 * @param $usr_id = user id, $key = either 1 or 0
	 * @return Case #1 -> success => successfuly uploaded
	 *         Case #2 -> errUnk = when the data is not inserted because of either there is interuption in connection or other 
	*/
	public function updateUserStatus($usr_id,$key){
		$usr_id = $this->myencode($usr_id);
		$sql = "UPDATE users SET isactive='$key' WHERE usr_id='$usr_id'";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}


}