<?php

class StatisticService
{
    public function saldo($income, $outcome)
    {
        return array_sum($income) - array_sum($outcome);
    }

    public function avg($arr)
    {
        return array_sum($arr) / count($arr);
    }
}