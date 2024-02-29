<?php

//making new class
class SASearchAccountController{

    function getSearch($name)
    {

	    $user = new User();

	    $result = $user->viewSearch($name);

	    return $result;

    }

}
?>
