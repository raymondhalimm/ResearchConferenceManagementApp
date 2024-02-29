<?php
include_once("LoginController.php");

use PHPUnit\Framework\TestCase;

final class LoginTest extends TestCase{

    private $conn = NULL;

    public function setUp() : void {

        $sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

        $query = "INSERT INTO accounts (username, password, account_status, name, email, pname)
        VALUES ('username9999', 'password9999', 'Active', 'name9999', 'email9999', 'Admin')";

        $this->conn->query($query);

    }

    public function test(){

        $testController = new LoginController();

        $this->assertSame("Admin", $testController->login("username9999", "password9999"));

    }

    public function tearDown() : void {

        $query = "DELETE FROM accounts WHERE username='username9999'";
        $this->conn->query($query);

    }

}

?>