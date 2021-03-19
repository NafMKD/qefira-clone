<?php

/**
 * Fetching From Database, Updating Database and Deleting From Database
 */
class fetch extends db
{
	/**
	 * Fetching Admin Table 
	 * @param $type = "ALL":"all data fetch","INDIVIDUAL": "fetch specific data by id"
	 * @param $key ="By defualt its empty if $type is INDIVIDUAL it take an argument"
	 * @return array of admin data(s)
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
			$query = mysqli_query($this->conn(), "SELECT * FROM admin WHERE admin_id='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}

	/**
	 * Fetching Users Table 
	 * @param $type = "ALL":"all data fetch","INDIVIDUAL": "fetch specific data by id"
	 * @param $key ="By defualt its empty if $type is INDIVIDUAL it take an argument"
	 * @return array of users data(s)
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
			$query = mysqli_query($this->conn(), "SELECT * FROM users WHERE usr_id='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "STATUS"){
			$query = mysqli_query($this->conn(), "SELECT * FROM users WHERE isactive='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}


	/**
	 * Fetching Items Table 
	 * @param $type = "ALL","INDIVIDUAl","BYDATE","CATAGORIES","ADTYPE"
	 * @param $key ="By defualt its empty"
	 * @return array of users data(s)
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
	 * @param $type = "ALL":"all data fetch","INDIVIDUAL": "fetch specific data by id"
	 * @param $key ="By defualt its empty if $type is INDIVIDUAL it take an argument"
	 * @return array of catagories data(s)
	 */
	public function fetchCatagories($type, $key=""){
		if($type == "ALL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM catagories ORDER BY id DESC");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}elseif($type == "INDIVIDUAL"){
			$query = mysqli_query($this->conn(), "SELECT * FROM catagories WHERE cat_id='$key'");
			$array = array();
			while ($row = mysqli_fetch_assoc($query)) {
				$array[] = $row;
			}
			return $array;
		}
	}
	
}