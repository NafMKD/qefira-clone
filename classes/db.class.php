<?php

/**
 * Database Connection
 */
class db
{	
	private $host = "localhost";
	private $user = "root";
	private $pwd = "";
	private $dbname = "qefira";

	protected function conn()
	{
		$db = mysqli_connect($this->host, $this->user, $this->pwd, $this->dbname);

		if (!$db) {
			echo "Database Connection Error" . mysqli_connect_error($db);
		}
		return $db;
	}
}
