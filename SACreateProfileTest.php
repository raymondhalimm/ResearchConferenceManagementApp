<?php
include("SACreateProfileController.php");

use PHPUnit\Framework\TestCase;

final class SACreateProfileTest extends TestCase{

    private $conn = NULL;

    public function setUp() : void {

        $sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

    }

    public function test(){

        $testController = new CreateProfileController();

        $this->assertTrue($testController->createProfile("Test"));

        $this->assertFalse($testController->createProfile("Test"));

    }

    public function tearDown() : void {

        $query = "DELETE FROM profiles WHERE pname='Test'";
        $this->conn->query($query);

    }

}

?>