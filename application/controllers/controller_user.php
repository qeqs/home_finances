<?php
class controller_user extends Controller
{
    public static function isGuest()
    {
        $is_guest = !isset($_SESSION['user']);
        if($is_guest){
            session_start();
        }
        return $is_guest;
    }
}