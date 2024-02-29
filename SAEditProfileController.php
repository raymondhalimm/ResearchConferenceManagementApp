<?php
include("ProfilesClass.php");

class SAEditProfileController{

    function updateProfile($old_pname, $new_pname){

        $profile = new Profile();

        $result = $profile->updateProfile($old_pname, $new_pname);

        return $result;

    }

}

?>