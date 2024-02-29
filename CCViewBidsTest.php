<?php
include("CCViewBidsController.php");

use PHPUnit\Framework\TestCase;

final class CCViewBidsTest extends TestCase{

    private $conn = NULL;

    public function setUp() : void {

        $sname = "localhost";
		$dbuser = "root";
		$dbpw = "";
		$dbname = "314";

		$this->conn = new mysqli($sname, $dbuser, $dbpw, $dbname);

        $query = "INSERT INTO accounts (username, password, account_status, name, email, pname)
        VALUES ('username9999', 'password9999', 'Active', 'name9999', 'email9999', 'Reviewer')";

        $this->conn->query($query);

        $query = "INSERT INTO workload
        VALUES ('username9999', 0, 10)";

        $this->conn->query($query);

        $query = "INSERT INTO paper (paper_id, username, title, paper_status)
        VALUES (9999, 'username9999', 'TestTitle', 'Pending')";

        $this->conn->query($query);

        $query = "INSERT INTO bid (paper_id, username, bid_status)
        VALUES (9999, 'username9999', 'Pending')";

        $this->conn->query($query);

    }

    public function test(){

        $testController = new CCViewBidsController();

        $this->assertTrue((mysqli_num_rows($testController->getPaper(9999)) > 0));

        $this->assertTrue((mysqli_num_rows($testController->getAllBiders(9999)) > 0));

    }

    public function tearDown() : void {

        $query = "DELETE FROM bid WHERE paper_id=9999";
        $this->conn->query($query);

        $query = "DELETE FROM paper WHERE paper_id=9999";
        $this->conn->query($query);

        $query = "DELETE FROM workload WHERE username='username9999'";
        $this->conn->query($query); 

        $query = "DELETE FROM accounts WHERE username='username9999'";
        $this->conn->query($query);

    }

}

?>