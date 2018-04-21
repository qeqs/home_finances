<?php
class UserTwo extends Controller
{
    public static function isGuest()
    {
        if (isset($_SESSION['User'])) {
            {
                return false;
            }
            return true;
        }
    }
}