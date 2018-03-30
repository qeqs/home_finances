<?php

class OutcomeManager extends BaseManager
{

    public function __construct()
    {
        parent::__construct("outcome", Outcome::class);
    }
}