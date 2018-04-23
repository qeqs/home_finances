<?php

class controller_user extends Controller
{
    public static function isGuest()
    {
        //error_log("User " . $_SESSION['user'] . " logged: " . isset($_SESSION['user']));
        return !isset($_SESSION['user']);
    }
}