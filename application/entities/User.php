<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 17.03.2018
 * Time: 17:02
 */

class User
{
    var $id;
    var $name;
    var $saves;
    var $login;
    var $password;

    public function __construct()
    {
        $this->saves = 0.0;
    }
}