<?php

class StatisticService
{
    public function saldo($income, $outcome)
    {
        return $this->sum($income) - $this->sum($outcome);
    }

    public function avg($arr)
    {
        return count($arr) > 0 ? $this->sum($arr) / count($arr) : 0;
    }

    private function sum($arr){
        $res = 0;
        foreach($arr as $item){
            $res += $item->value;
        }
        return $res;
    }
}