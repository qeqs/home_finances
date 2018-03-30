<?php

class model_charts extends Model
{
    private $incomeManager;
    private $outcomeManager;

    public function __construct()
    {

        $this->incomeManager = new IncomeManager();
        $this->outcomeManager = new OutcomeManager();
    }

    public function getIncomeChart($user){
        $incomes = $this->incomeManager->getByColumn("user_id", $user->id);
        return $this->toChartData($incomes);
    }

    public function getOutcomeChart($user){
        $outcomes = $this->outcomeManager->getByColumn("user_id", $user->id);
        return $this->toChartData($outcomes);
    }

    public function getIncomeOutcomeChart($user){
        $outcomes = $this->outcomeManager->getByColumn("user_id", $user->id);
        $incomes = $this->incomeManager->getByColumn("user_id", $user->id);
        return array_merge($this->toChartData($incomes), $this->toChartData($outcomes, -1));
    }

    private function toChartData($finances, $sign = 1){
        $data = array();
        $data[0][0] = "\"Date\"";
        $data[0][1] = "\"Values\"";
        for ($i = 1; $i < count($finances); $i++) {
            $data[i][0] = $finances[$i-1]->date;
            $data[i][1] = $finances[$i-1]->value * $sign;
        }
        return $data;
    }

}