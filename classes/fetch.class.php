<?php

/**
 * Fetching From Database, Updating Database and Deleting From Database
 */
class fetch extends db
{
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
	 *		  Case #3 -> $type = "CATAGORIES", $key="sort/catid/status"(where sort is either "DESC"(descending) or "ASC"(ascending) , catid is catagories id and  status is either 1(active) or 0(deactivated))
	 *        Case #4 -> $type = "ADTYPE", $key="sort/adsid/status"(where sort is either "DESC"(descending) or "ASC"(ascending) , adsid is ad type id and  status is either 1(active) or 0(deactivated))
	 *        Case #5 -> $type = "INDIVIDUAL", $key = "itemid"(where itemid is item id)
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
	 * Fetch form Items_detail Table
	 * @param Case #1 -> $type = "ALL", $key = ""
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
	 * @return array of Items_detail data(s)
	*/
	public function fetchItemsDetail($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this-conn(), "SELECT * FROM items_detail ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$explodekey = explode("/", $key);
			$query = mysqli_query($this->conn(), "SELECT * FROM items_detail WHERE $explodekey[0]='$explodekey[1]'");
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
	 * 		  Case #2 -> $type = "INDIVIDUAL", $key="key/value"(where key = column name, value = value to be searched)
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
}