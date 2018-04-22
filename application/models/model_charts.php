<?php

class model_charts extends Model
{
    private $incomeManager;
    private $outcomeManager;
    private $statistic;

    public function __construct()
    {
        $this->statistic = new StatisticService();
        $this->incomeManager = new IncomeManager();
        $this->outcomeManager = new OutcomeManager();
    }

    public function getIncomeChart($user)
    {
        $incomes = $this->is_not_planned($this->incomeManager->getByColumn("user_id", $user->id));
        return $this->toChartData($incomes);
    }

    public function getOutcomeChart($user)
    {
        $outcomes = $this->is_not_planned($this->outcomeManager->getByColumn("user_id", $user->id));
        return $this->toChartData($outcomes);
    }

    public function getIncomeOutcomeChart($user)
    {
        $outcomes = $this->is_not_planned($this->outcomeManager->getByColumn("user_id", $user->id));
        $incomes = $this->is_not_planned($this->incomeManager->getByColumn("user_id", $user->id));
        return array_merge($this->toChartData($incomes), $this->toChartData($outcomes, -1));
    }

    public function stats($user)
    {
        $outcomes = $this->is_not_planned($this->outcomeManager->getByColumn("user_id", $user->id));
        $incomes = $this->is_not_planned($this->incomeManager->getByColumn("user_id", $user->id));
        return array(
            "saldo" => strval($this->statistic->saldo($incomes, $outcomes)),
            "avg_income" => strval($this->statistic->avg($incomes)),
            "avg_outcome" => strval($this->statistic->avg($outcomes))
        );
    }

    private function toChartData($finances, $sign = 1)
    {
        $data = array();
        if (count($finances) > 0) {
            $data[0][0] = "\"Date\"";
            $data[0][1] = "\"Values\"";
            for ($i = 1; $i < count($finances); $i++) {
                $data[$i][0] = $finances[$i - 1]->date;
                $data[$i][1] = $finances[$i - 1]->value * $sign;
            }
        }
        return $data;
    }


    public function mergeCharts($left, $titleLeft, $right, $titleRight)
    {
        $data = array();
        if (count($left) > 0 && count($right) > 0) {
            $data[0][0] = "\"Date\"";
            $data[0][1] = "\"" . $titleLeft . "\"";
            $data[0][2] = "\"" . $titleRight . "\"";
            for ($i = 1; $i < count($left); $i++) {
                $data[$i][0] = $left[$i][0];
                $data[$i][1] = $left[$i][1];
            }
            for ($i = 1; $i < count($right); $i++) {
                $data[$i][0] = $right[$i][0];
                $data[$i][2] = $right[$i][1];
            }
        }
        return $data;
    }

    public function is_not_planned($arr)
    {
        $data = array();
        foreach ($arr as $item) {
            if (!$item->is_planned) {
                array_push($data, $item);
            }
        }
        return $data;
    }
}