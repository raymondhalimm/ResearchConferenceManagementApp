<?php
include_once("UserClass.php");

//making new class
class SAEditAccountController{

    function getCurrentProfiles()
    {

	    $user = new User();

	    $result = $user-> getAllProfiles();

	    return $result;

    }

    function getAccountInfo($username)
    {

        $user = new User();

        $result = $user ->getAllInfo($username);

        return $result;

    }

    //controller only has one function, to login using the username and password
    function edit($username, $password, $status, $name, $email, $profile)
    {

        //create new user entity object
        $user = new User();

        //use create account function in entity to create a new account
        $result = $user->editAccount($username, $password, $status, $name, $email, $profile);

        if ($profile == "Reviewer"){

            $user->createWorkload($username);

        }

        return $result;

    }

}

?>
