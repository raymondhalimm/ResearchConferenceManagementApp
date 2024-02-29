<?php

class User{

	//class variables are declared as NULL
	private $username;
	private $password;
	private $status;
	private $name;
	private $email;
	private $profile;
	private $conn = NULL;

	//declaration of constructor to establish database connection.
	//getAccount() is not in the constructor as you may not always need the info.
	function __construct(){

		$sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

	}

	//used to retrieve full account info, and for logging in.
	//this function works in any place where you need to retrieve account info,
	//not only when you need to log in.
	public function getAccount($username, $password){

		//Find any entries with the exact username and password
		$query = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";

		//Run query
		$result = $this->conn->query($query);

		//If there are no rows found, it means no account, or wrong username and password
		if (mysqli_num_rows($result) == 0){
			return false;
		}

		//retrieve the row of info
		$row = $result->fetch_assoc();

		//assign the info to this object's variables
		$this->username = $row["username"];
		$this->password = $row["password"];
		$this->status = $row["account_status"];
		$this->name = $row["name"];
		$this->email = $row["email"];
		$this->profile = $row["pname"];

		//return true to indicate function ran properly
		return true;

	}

	//function to create user account
	public function createAccount($username, $password, $status, $name, $email, $profile)
	{

		$query = "INSERT INTO accounts (username, password, account_status, name, email, pname) VALUES ('$username', '$password', '$status', '$name', '$email', '$profile')";
		
		//catch any error, in this case, username taken error
		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

	public function createWorkload($username){

		$query = "INSERT INTO workload (username, current_workload, max_workload) VALUES ('$username', 0, 10)";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

	public function editAccount($username, $password, $status, $name, $email, $profile)
	{

		$query = "UPDATE accounts SET password='$password', account_status='$status',name='$name', email='$email', pname='$profile' WHERE username='$username'";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

	public function getAllProfiles()
	{

		$query = "SELECT * FROM profiles";

		return $this->conn->query($query);

	}

	public function getAllInfo($username)
	{

		$query = "SELECT * FROM accounts WHERE username='$username'";

		return $this->conn->query($query);

	}

	public function getProfiles($pname)
	{
		
		$query = "SELECT name FROM accounts WHERE pname = '$pname'";

		$result = $this->conn->query($query);

		return $result;
		
	}

	public function viewInfo()
	{
	
		$query = "SELECT username, name, pname FROM accounts";

		return $this->conn->query($query);

	}

	public function viewSearch($name)
	{

		$query = "SELECT username, name, pname FROM accounts WHERE name LIKE '%$name%'";

		return $this->conn->query($query);

	}

	public function updatePassword($username, $new_password)
	{

		$query = "UPDATE accounts SET password='$new_password' WHERE username='$username'";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;

	}

	//Function to get the current max workload of the current reviewer
    public function getWorkload($username){
		
		//Select max workload from workload where the username is the same as in the session
        $query = "SELECT * FROM workload WHERE username = '$username'";

		$result = $this->conn->query($query);

		return $result;
		
    }

	//Function to set the max workload of the current reviewer
    public function setMaxWorkload($max_workload, $username){

        //Update max_workload with the exact username
        $query = "UPDATE workload SET max_workload= '$max_workload' WHERE username = '$username'";

		try{
			$this->conn->query($query);
		}
		catch(mysqli_sql_exception $e){
			return false;
		}

		return true;
		
    }

	public function incrementWorkload($reviewer) {

		$query = "UPDATE workload SET current_workload = current_workload+1 WHERE username = '$reviewer'";

		$this->conn->query($query);

	}

	public function decreaseWorkload($reviewer) {

		$query = "UPDATE workload SET current_workload = current_workload-1 WHERE username = '$reviewer'";

		$this->conn->query($query);
		
	}

	//typical get functions
	public function getUsername(){
		return $this->username;
	}

	public function getPassword(){
		return $this->password;
	}

	public function getStatus(){
		return $this->status;
	}

	public function getName(){
		return $this->name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getProfile(){
		return $this->profile;
	}

}

?>
