<?php
class UserTwo extends Controller
{
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            {
                return false;
            }
            return true;
        }
    }
}