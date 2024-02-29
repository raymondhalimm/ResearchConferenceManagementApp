<?php

class Profile
{

	private $pname;
	private $conn = NULL;

	function __construct()
	{

		$sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

	}

	public function addProfile($pname)
	{

		//check if profile exists in table before insertion
		$query = "SELECT pname FROM profiles WHERE pname='$pname'";
		$result = $this->conn->query($query);

		if (mysqli_num_rows($result) == 0) {

			//inserts new profile name (pname) into profiles Table
			$query = "INSERT INTO profiles(pname) VALUES ('$pname')";
			$this->conn->query($query);

			return true;

		}

		return false;

	}

	//used to get profile name
	public function getPname()
	{
		return $this->pname;
	}

	public function getAllProfiles()
	{

		$query = "SELECT * FROM profiles";
		
		$result = $this->conn->query($query);

		return $result;

	}

	public function searchProfile()
	{

		$searchpname = $_POST['searchpname'];

		$query = "SELECT * FROM profiles where pname LIKE '%$searchpname%'";

		$result = $this->conn->query($query);

		return $result;

	}

	public function updateProfile($old_pname, $new_pname)
	{
		
		$query = "UPDATE profiles SET pname='$new_pname' WHERE pname='$old_pname'";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}
	
}
