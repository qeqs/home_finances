<?php

class TypeManager extends BaseManager
{
    public function __construct()
    {
        parent::__construct("type", Type::class);
    }
}