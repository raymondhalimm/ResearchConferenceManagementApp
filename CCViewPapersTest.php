<?php
include_once("CCViewPapersController.php");

use PHPUnit\Framework\TestCase;

final class CCViewPapersTest extends TestCase{

    private $conn = NULL;

    public function setUp() : void {

        $sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

        $query = "INSERT INTO accounts (username, password, account_status, name, email, pname)
        VALUES ('username9999', 'password9999', 'Active', 'name9999', 'email9999', 'Author')";

        $this->conn->query($query);

        $query = "INSERT INTO paper (paper_id, username, title, paper_status)
        VALUES (9999, 'username9999', 'TestTitle', 'Pending')";

        $this->conn->query($query);

        $query = "INSERT INTO bid (paper_id, username, bid_status)
        VALUES (9999, 'username9999', 'Pending')";

        $this->conn->query($query);

    }

    public function test(){

        $testController = new CCViewPapersController();

        $this->assertTrue((mysqli_num_rows($testController->viewPapers()) > 0));

    }

    public function tearDown() : void {

        $query = "DELETE FROM bid WHERE paper_id=9999";
        $this->conn->query($query);

        $query = "DELETE FROM paper WHERE paper_id=9999";
        $this->conn->query($query);

        $query = "DELETE FROM accounts WHERE username='username9999'";
        $this->conn->query($query);

    }

}

?>