<?php
include("ProfilesClass.php");

class CreateProfileController{

    function createProfile($pname){

        //creates new Profile object
        $profile = new Profile();

        //calls addProfile() function in Profile class and returns boolean value.
        $bool = $profile->addProfile($pname);

        return $bool;

    }
    
}

?>
