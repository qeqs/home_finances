<?php
class UserTwo extends Controller
{
    public static function isGuest()
    {
        if (isset($_SESSION['UserTwo'])) {
            {
                return false;
            }
            return true;
        }
    }
}