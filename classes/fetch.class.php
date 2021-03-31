<?php

/**
 * Fetching From Database, Updating Database and Deleting From Database
 */
class fetch extends db
{
	private function myencode($typ){
		$ret = mysqli_real_escape_string($this->conn(), $typ);
		return $ret;
	}

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

########################################################################################################################################
	
	/**
	 * Fetching Admin Table 
	 * @param Case #1 -> $type = "ALL", $key=""
	 *        Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of user(s) data
	 */
	public function fetchAdmin($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM admin ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM admin WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

	/**
	 * Fetching Users Table 
	 * @param Case #1 -> $type = "ALL", $key=""
	 *        Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of user(s) data
	 */
	public function fetchUsers($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM users ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM users WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}


	/**
	 * Fetching Items Table 
	 * @param Case #1 -> $type = "ALL", $key=""
	 * 		  Case #2 -> $type = "BYDATE", $key="sort/status"(where sort is either "DESC"(descending) or "ASC"(ascending) and  status is either 1(active) or 0(deactivated))
	 *        Case #3 -> $type = "BYDATEFILTER", $key="sort/catid"(where sort is either "DESC"(descending) or "ASC"(ascending) and  catid is catagory id)
	 *		  Case #4 -> $type = "CATAGORIES", $key="sort/catid/status"(where sort is either "DESC"(descending) or "ASC"(ascending) , catid is catagories id and  status is either 1(active) or 0(deactivated))
	 *        Case #5 -> $type = "ADTYPE", $key="sort/adsid/status"(where sort is either "DESC"(descending) or "ASC"(ascending) , adsid is ad type id and  status is either 1(active) or 0(deactivated))
	 *        Case #6 -> $type = "REGION", $key="type/sort/catid/regionid"(where type is either DATE or PRICE,sort is either "DESC"(descending) or "ASC"(ascending) , catid is catagory id and regionid is region id)
	 *        Case #7 -> $type = "PRICE", $key="sort/status"(where sort is either "DESC"(descending) or "ASC"(ascending) and  status is either 1(active) or 0(deactivated))
	 *        Case #8 -> $type = "PRICEFILTER", $key="sort/catid"(where sort is either "DESC"(descending) or "ASC"(ascending) and  catid is catagory id)
	 *		  Case #9 -> $type = "SEARCHRESULT", $key="type/sort/query"(where type is either DATE or PRICE,sort is either "DESC"(descending) or "ASC"(ascending) and query is search query)
	 *        Case #10 -> $type = "BYUSER", $key = "usrid"(where usrid is user id)
	 *        Case #11 -> $type = "ADMINCATAGOEY", $key = "catid"(where catid is catagory id)
	 *        Case #12 -> $type = "ADMINIDSEARCH", $key = "itemid"(where itemid is item id)
	 *        Case #13 -> $type = "INDIVIDUAL", $key = "itemid"(where itemid is item id)
	 * @return array of item(s) data
	 */
	public function fetchItems($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM items ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "BYDATE"){
			$keyex = explode('/', $key);
			if($keyex[0]=="DESC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE isactive='$keyex[1]' ORDER BY regdate DESC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}elseif($keyex[0]=="ASC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE isactive='$keyex[1]' ORDER BY regdate ASC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}
		}elseif($type == "BYDATEFILTER"){
			$keyex = explode('/', $key);
			if($keyex[0]=="DESC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[1]' ORDER BY regdate DESC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}elseif($keyex[0]=="ASC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[1]' ORDER BY regdate ASC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}
		}elseif ($type == "CATAGORIES") {
			$keyex = explode('/', $key);
			if($keyex[0]=="DESC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[1]' AND isactive='$keyex[2]' ORDER BY regdate DESC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}elseif($keyex[0]=="ASC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[1]' AND isactive='$keyex[2]' ORDER BY regdate ASC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}
		}elseif ($type == "ADTYPE") {
			$keyex = explode('/', $key);
			if($keyex[0]=="DESC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE ad_item_id='$keyex[1]' AND isactive='$keyex[2]' ORDER BY regdate DESC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}elseif($keyex[0]=="ASC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE ad_item_id='$keyex[1]' AND isactive='$keyex[2]' ORDER BY regdate ASC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}
		}elseif($type == "PRICE"){
			$keyex = explode('/', $key);
			if($keyex[0]=="DESC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE isactive='$keyex[1]' ORDER BY price DESC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}elseif($keyex[0]=="ASC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE isactive='$keyex[1]' ORDER BY price ASC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}
		}elseif($type == "PRICEFILTER"){
			$keyex = explode('/', $key);
			if($keyex[0]=="DESC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[1]' ORDER BY price DESC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}elseif($keyex[0]=="ASC"){
				$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[1]' ORDER BY price ASC");
				$array = array();
				while ($row = mysqli_fetch_assoc($query)) {
					$array[] = $row;
				}
				return $array;
			}
		}elseif($type == "REGION"){
			$keyex = explode('/', $key);
			if($keyex[0] == "BYDATEFILTER"){
				if($keyex[1]=="DESC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[2]' AND region='$keyex[3]' ORDER BY id DESC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}elseif($keyex[1]=="ASC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[2]' AND region='$keyex[3]' ORDER BY id ASC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}
			}elseif($keyex[0] == "PRICEFILTER"){
				if($keyex[1]=="DESC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[2]' AND region='$keyex[3]' ORDER BY price DESC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}elseif($keyex[1]=="ASC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$keyex[2]' AND region='$keyex[3]' ORDER BY price ASC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}
			}
			
		}elseif($type == "SEARCHRESULT"){
			$keyex = explode('/', $key);
			$searchquery = preg_replace("#[^0-9a-z]#i", "", $keyex[2]);
			if($keyex[0] == "BYDATEFILTER"){
				if($keyex[1]=="DESC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE name LIKE '%$searchquery%'  OR descr LIKE '%$searchquery%' ORDER BY id DESC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}elseif($keyex[1]=="ASC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE name LIKE '%$searchquery%' OR descr LIKE '%$searchquery%' ORDER BY id ASC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}
			}elseif($keyex[0] == "PRICEFILTER"){
				if($keyex[1]=="DESC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE name LIKE '%$searchquery%'  OR descr LIKE '%$searchquery%' ORDER BY price DESC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}elseif($keyex[1]=="ASC"){
					$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE name LIKE '%$searchquery%'  OR descr LIKE '%$searchquery%' ORDER BY price ASC");
					$array = array();
					while ($row = mysqli_fetch_assoc($query)) {
						$array[] = $row;
					}
					return $array;
				}
			}
			
		}elseif($type == "BYUSER"){
			$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE usr_id='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "ADMINCATAGORY"){
			$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE cat_id='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "ADMINIDSEARCH"){
			$searchquery = preg_replace("#[^0-9a-z]#i", "", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE item_id LIKE '%$searchquery%' ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM items WHERE item_id='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

	/**
	 * Fetching Catagories Table 
	 * @param Case #1 -> $type = "ALL", $key=""
	 *        Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of catagories data(s)
	 */
	public function fetchCatagories($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM catagories ORDER BY id ASC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM catagories WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}


	/**
	 * Fetch form Cat_key Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Cat_key data(s)
	*/
	public function fetchCatKey($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM cat_key ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM cat_key WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}
	
	/**
	 * Fetch form Items_file Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Items_file data(s)
	*/
	public function fetchItemsFile($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM items_file ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM items_file WHERE $explodekey[0]='$explodekey[1]' ORDER BY id ASC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

	/**
	 * Fetch form Items_key_detail Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Items_key_detail data(s)
	*/
	public function fetchItemsKeyDetail($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM items_key_detail ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUALDETAIL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM items_key_detail WHERE item_id='$explodekey[0]' AND cat_key_id='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM items_key_detail WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}


	/**
	 * Fetch form Messages Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 *        Case #2 -> $type = "ALL", $key = "reciver/status"(where reciver is reciver id and status is either 1 or 0)
	 * 		  Case #3 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Messages data(s)
	*/
	public function fetchMessage($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM messages ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "STATUS"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM messages WHERE msg_to='$explodekey[0]' AND isreaded='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM messages WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

	/**
	 * Fetch form Messages_file Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Messages_file data(s)
	*/
	public function fetchMessageFile($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM messages_file ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM messages_file WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

	/**
	 * Fetch form Users_file Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Users_file data(s)
	*/
	public function fetchUsersFile($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM users_file ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM users_file WHERE $explodekey[0]='$explodekey[1]'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

###########################################################################################################################################
	/**
	 * update Items Table
	 * @param $item_id=item id, $cat_id=new catagory id, $name=new name, $price=new price, $descr=new description, $region=new region, $comp=new address, $city=new city,$negtype = new negtype
	 * @return Case #1 -> success = table succesfuly updated
	 *         Case #2 -> errUnk = when the table is not updated because of either there is interuption in connection or other factors.
	*/
	public function updateItems($item_id, $cat_id, $name, $price, $descr, $region, $comp, $city,$negtype){
		$item_id = $this->myencode($item_id);
		$cat_id = $this->myencode($cat_id);
		$name = $this->myencode($name);
		$price = $this->myencode($price);
		$descr = $this->myencode($descr);
		$region = $this->myencode($region);
		$comp = $this->myencode($comp);
		$city = $this->myencode($city);
		$negtype = $this->myencode($negtype);
		$date = $this->dategen();

		$sql = "UPDATE items SET cat_id='$cat_id', name='$name', price='$price', descr='$descr', region='$region', comp='$comp', city='$city', negtype='$negtype',  udate='$date' WHERE item_id='$item_id'";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * update Item Key Detail Table
	 * @param $item_id=item id, $cat_key_id = catagory key id, $cat_value = new value
	 * @return Case #1 -> success = table succesfuly updated
	 *         Case #2 -> errUnk = when the table is not updated because of either there is interuption in connection or other factors.
	*/
	public function updatedItemKeyDetail($item_id, $cat_key_id, $cat_value){
		$item_id = $this->myencode($item_id);
		$cat_key_id = $this->myencode($cat_key_id);
		$cat_value = $this->myencode($cat_value);
		$date=$this->dategen();

		$sql = "UPDATE items_key_detail SET cat_value='$cat_value', udate='$date' WHERE item_id='$item_id' AND cat_key_id='$cat_key_id'";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * update Items Table
	 * @param $item_id=item id, $uda = user type
	 * @return Case #1 -> success = table succesfuly updated
	 *         Case #2 -> errUnk = when the table is not updated because of either there is interuption in connection or other factors.
	 *         Case #3 -> errAuth = when there is a authentication error
	*/
	public function updateItemStatus($item_id,$uda){
		$before = $this->fetchItems("INDIVIDUAL", $item_id)[0]['isactive'];
		$beforeadmin = $this->fetchItems("INDIVIDUAL", $item_id)[0]['isadmin'];
		if($uda=="admin"){
			if($before == 1){
				$sql = "UPDATE items SET isactive=0, isadmin=1 WHERE item_id='$item_id' ";
				if(mysqli_query($this->conn(), $sql)){
					return "success";
				}else{
					return "errUnk";
				}
			}elseif($before == 0){
				$sql = "UPDATE items SET isactive=1, isadmin=0 WHERE item_id='$item_id' ";
				if(mysqli_query($this->conn(), $sql)){
					return "success";
				}else{
					return "errUnk";
				}
			}
		}elseif($uda=="user"){
			if($before == 1 && $beforeadmin==0){
				$sql = "UPDATE items SET isactive=0 WHERE item_id='$item_id' ";
				if(mysqli_query($this->conn(), $sql)){
					return "success";
				}else{
					return "errUnk";
				}
			}elseif($before == 1 && $beforeadmin==1){
				return "errAuth";
			}elseif($before == 0 && $beforeadmin==1){
				return "errAuth";
			}elseif($before == 0 && $beforeadmin==0){
				$sql = "UPDATE items SET isactive=1 WHERE item_id='$item_id' ";
				if(mysqli_query($this->conn(), $sql)){
					return "success";
				}else{
					return "errUnk";
				}
			}
		}	
	}

	/**
	 * update Message Table
	 * @param $msg_id=message id
	 * @return Case #1 -> success = table succesfuly updated
	 *         Case #2 -> errUnk = when the table is not updated because of either there is interuption in connection or other factors.
	*/
	public function updateReadedMessage($msg_id){
		$msg_id = $this->myencode($msg_id);
		$sql = "UPDATE messages SET isreaded=1 WHERE msg_id='$msg_id' ";
		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * update cat_key Table
	 * @param $cat_key_id=catagory key id,$cat_value = catagory value
	 * @return Case #1 -> success = table succesfuly updated
	 *         Case #2 -> errUnk = when the table is not updated because of either there is interuption in connection or other factors.
	*/
	public function updateCatagoryKey($cat_key_id,$cat_value){
		$cat_key_id = $this->myencode($cat_key_id);
		$cat_value = $this->myencode($cat_value);
		$date=$this->dategen();

		$sql = "UPDATE cat_key SET catkey='$cat_value', udate='$date' WHERE cat_key_id='$cat_key_id'";

		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 * update catagories Table
	 * @param $cat_id=catagory id,$name = new catagory name
	 * @return Case #1 -> success = table succesfuly updated
	 *         Case #2 -> errUnk = when the table is not updated because of either there is interuption in connection or other factors.
	*/
	public function updateCatagory($cat_id, $name){
		$cat_id = $this->myencode($cat_id);
		$name = $this->myencode($name);
		$date = $this->dategen();

		$sql = "UPDATE catagories SET name='$name', udate='$date' WHERE cat_id='$cat_id'";

		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}
##########################################################################################################################################

	/**
	 *
	 * delete to messages
	 * @param $msg_id = message id ,$folder = folder path
	 * @return Case #1 -> success => successfuly deleted
	 *         Case #2 -> errUnk = when the data is not deleted because of either there is interuption in connection or other 
	*/
	public function deleteMessages($msg_id,$folder){
		$arr_msg_file = $this->fetchMessageFile("INDIVIDUAL", "msg_id/".$msg_id);
		foreach ($arr_msg_file as $key ) {
			$oldfile = $key['filePath'];
			unlink($folder."/".$oldfile."");
		}
		if(mysqli_query($this->conn(), "DELETE FROM messages_file WHERE msg_id = '$msg_id'")){
			if(mysqli_query($this->conn(), "DELETE FROM messages WHERE msg_id = '$msg_id'")){
				return "success";
			}else{
				return "errUnk";
			}
		}else{
			return "errUnk";
		}


	}

	/**
	 *
	 * delete to cat_key
	 * @param $cat_key_id = category id
	 * @return Case #1 -> success => successfuly deleted
	 *         Case #2 -> errUnk = when the data is not deleted because of either there is interuption in connection or other 
	*/
	public function delectCatagoryKey($cat_key_id){
		$cat_key_id = $this->myencode($cat_key_id);

		$sql = "DELETE FROM cat_key WHERE cat_key_id='$cat_key_id'";

		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}

	/**
	 *
	 * delete to category
	 * @param $cat_key_id = category id
	 * @return Case #1 -> success => successfuly deleted
	 *         Case #2 -> errUnk = when the data is not deleted because of either there is interuption in connection or other 
	*/
	public function deleteCatagory($cat_id){
		$cat_id = $this->myencode($cat_id);
		$cat_key_id = $this->fetchCatKey("INDIVIDUAL", "cat_key_id/".$cat_id);

		foreach ($cat_key_id as $key) {
			$this->delectCatagoryKey($key);
		}

		$sql = "DELETE FROM catagories WHERE cat_id='$cat_id'";

		if(mysqli_query($this->conn(), $sql)){
			return "success";
		}else{
			return "errUnk";
		}
	}
	
############################################################################################################################################

	/**
	 *
	 * check authentication 
	 * @param $usr_id=user id,$for=for which method,$val=enterd code 
	 * @return Case #1 -> success => successfuly deleted
	 *         Case #2 -> errUnk = when the data is not deleted because of either there is interuption in connection or other 
	 *         Case #3 -> invalid = when the enterd key is not correct 
	*/
	public function checkAuthenticationCode($usr_id,$for,$val){
		$for = $this->myencode($for);
		$val = $this->myencode($val);

		$original = $this->fetchUsers("INDIVIDUAL", "usr_id/".$usr_id)[0];

		if($original[$for]==$val){
			$sql = "UPDATE users SET $for=1 WHERE usr_id='$usr_id'";
			if(mysqli_query($this->conn(),$sql)){
				return "success";
			}else{
				return "errUnk";
			}
		}else{
			return "invalid";
		}

	}

	
}