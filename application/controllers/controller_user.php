<?php
class controller_user extends Controller
{
    public static function isGuest()
    {
        return !isset($_SESSION['user']);
    }
}