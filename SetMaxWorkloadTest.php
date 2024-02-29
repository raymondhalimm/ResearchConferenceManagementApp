<?php
include("SetMaxWorkloadController.php");

use PHPUnit\Framework\TestCase;

final class SetMaxWorkloadTest extends TestCase{

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

        $user = new User();
        $user->getAccount("username9999", "password9999");
        $_SESSION["user"] = $user;

    }

    public function test(){

        $testController = new SetMaxWorkloadController();

        $this->assertSame('10', $testController->displayMaxWorkload()->fetch_assoc()["max_workload"]);

        $this->assertTrue($testController->updateMaxWorkload(5));

        $this->assertSame('5', $testController->displayMaxWorkload()->fetch_assoc()["max_workload"]);

    }

    public function tearDown() : void {

        $query = "DELETE FROM workload WHERE username='username9999'";
        $this->conn->query($query); 

        $query = "DELETE FROM accounts WHERE username='username9999'";
        $this->conn->query($query);

        session_destroy();

    }

}

?>