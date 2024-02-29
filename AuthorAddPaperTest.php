<?php
include("AuthorAddPaperController.php");

use PHPUnit\Framework\TestCase;

final class AuthorAddPaperTest extends TestCase{

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

        $user = new User();
        $user->getAccount("username9999", "password9999");
        $_SESSION["user"] = $user;

    }

    public function test(){

        $testController = new AuthorAddPaperController();

        $this->assertSame("username9999", $testController->getAuthorLogin());

        $this->assertTrue((count($testController->getAuthor("username9999")) > 0));

        $this->assertTrue($testController->addPaper("username9999", "TestTitle", "Pending"));

        $this->assertTrue($testController->addSub("TestTitle", "username9999", "username9999"));

    }

    public function tearDown() : void {

        $query = "DELETE FROM co_author WHERE username='username9999'";
        $this->conn->query($query);

        $query = "DELETE FROM paper WHERE username='username9999'";
        $this->conn->query($query);

        $query = "DELETE FROM accounts WHERE username='username9999'";
        $this->conn->query($query);

        session_destroy();

    }

}

?>