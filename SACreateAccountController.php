<?php
include("UserClass.php");

//making new class
class SACreateAccountController{

    function getCurrentProfiles()
    {
        
	    $user = new User();

	    $result = $user-> getAllProfiles();

	    return $result;

    }

    //controller only has one function, to login using the username and password
    function create($username, $password, $status, $name, $email, $profile)
    {

        //create new user entity object
        $user = new User();

        //use create account function in entity to create a new account
        $result = $user->createAccount($username, $password, $status, $name, $email, $profile);

        if ($profile == "Reviewer"){

            $user->createWorkload($username);

        }

        return $result;

    }

}

?>
