<?php
include("UserClass.php");

//making new class
class SAViewAccountController{

    function getInfo()
    {
      
	    $user = new User();

	    $result = $user->viewInfo();

	    return $result;
      
    }

}

?>
