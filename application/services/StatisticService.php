<?php

class StatisticService
{
    public function saldo($income, $outcome)
    {
        error_log("sum income = ".array_sum($income));
        error_log("sum income = ".array_sum($outcome));
        return array_sum($income) - array_sum($outcome);
    }

    public function avg($arr)
    {
        error_log(count($arr));
        return count($arr) > 0 ? array_sum($arr) / count($arr) : 0;
    }
}