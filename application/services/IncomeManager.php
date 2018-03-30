<?php

class IncomeManager extends BaseManager
{
    public function __construct()
    {
        parent::__construct("income", Income::class);
    }
}