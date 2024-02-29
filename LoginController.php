<?php
include("UserClass.php");

class LoginController{

    //controller only has one function, to login using the username and password
    function login($username, $password){

        //create new user entity object
        $user = new User();

        //call getAccount() in entity, to try and retrieve the account info
        $bool = $user->getAccount($username, $password);

        //if getAccount() returns true, meaning there is an account, store the entire USER OBJECT into the session
        if ($bool == true){
            $_SESSION["user"] = $user;
        }

        //if account is disabled, return NULL for error handling
        if ($user->getStatus() == "Disabled"){
            return NULL;
        }

        //if nothing is wrong, return the profile to redirect to home page
        return $user->getProfile();

    }

}

?>

