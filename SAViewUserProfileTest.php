<?php
include("SAViewUserProfileController.php");

use PHPUnit\Framework\TestCase;

final class SAViewUserProfileTest extends TestCase{

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

    }

    public function test(){

        $testController = new SAViewUserProfileController();

        $this->assertTrue((mysqli_num_rows($testController->viewProfiles()) > 0));

    }

    public function tearDown() : void {

        $query = "DELETE FROM profiles WHERE pname='Test'";
        $this->conn->query($query);

    }

}

?>