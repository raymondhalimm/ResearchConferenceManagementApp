<?php
include("SACreateAccountController.php");

use PHPUnit\Framework\TestCase;

final class SACreateAccountTest extends TestCase{

    private $conn = NULL;

    public function setUp() : void {

        $sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

        $query = "INSERT INTO profiles (pname)
        VALUES ('Test')";

        $this->conn->query($query);        

        $query = "INSERT INTO accounts (username, password, account_status, name, email, pname)
        VALUES ('username9999', 'password9999', 'Active', 'name9999', 'email9999', 'Test')";

        $this->conn->query($query);

    }

    public function test(){

        $testController = new SACreateAccountController();

        $this->assertTrue((mysqli_num_rows($testController->getCurrentProfiles()) > 0));

        $this->assertFalse($testController->create('username9999', 'password9999', 'Active', 'name9999', 'email9999', 'Test'));

    }

    public function tearDown() : void {

        $query = "DELETE FROM accounts WHERE username='username9999'";
        $this->conn->query($query);

        $query = "DELETE FROM profiles WHERE pname='Test'";
        $this->conn->query($query);

    }

}

?>