<?php

class UserManager extends BaseManager
{
    public function __construct()
    {
        parent::__construct("user", User::class);
    }


    public function save($object)
    {
        $object->password = hash("sha256", $object->password);
        return parent::save($object);
    }

    public function getUserByLoginPassword($login, $password){
        $hash = hash("sha256", $password);
        $sql = "select * from {$this->table} where login = '{$login}' and password = '{$hash}'";
        return $this->executeQuery($sql);
    }


    public function getUserByLogin($login){
        $sql = "select * from {$this->table} where login = '{$login}'";
        return $this->executeQuery($sql);
    }

}
