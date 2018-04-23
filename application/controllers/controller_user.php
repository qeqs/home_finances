<?php

class controller_user extends Controller
{
    public static function isGuest()
    {
        if(!$_SESSION['session_started']){
            session_start();
        }
        return !isset($_SESSION['user']);
    }
}