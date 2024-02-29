<?php
include("UserClass.php");

//making new class
class ChangePasswordController{

    //void function to update password based on the user name, so the correct password can be updated
    function changePassword($username, $new_password)
    {

        //create new user entity object
        $user = new User();

        //update password
        $result = $user->updatePassword($username, $new_password);

        if ($result == true){

            $user->getAccount($username, $new_password);

            $_SESSION["user"] = $user;

            return true;

        }
        else{
            return false;
        }

    }

    function getUsername(){
        return $_SESSION["user"]->getUsername();
    }

    function getPassword(){
        return $_SESSION["user"]->getPassword();
    }

}
?>
