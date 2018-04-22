<?php

class StatisticService
{
    public function saldo($income, $outcome)
    {
        return array_sum($income) - array_sum($outcome);
    }

    public function avg($arr)
    {
        return count($arr) > 0 ? array_sum($arr) / count($arr) : 0;
    }
}