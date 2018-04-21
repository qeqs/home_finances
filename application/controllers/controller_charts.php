<?php

class controller_charts extends Controller
{
    function __construct()
    {
        $this->model = new model_charts();
        parent::__construct();
    }

    function action_index()
    {

        $user = $_SESSION["user"];
        if($user == null){
            (new Route)->MainPage();
        }
        $income = $this->model->getIncomeChart($user);
        $outcome = $this->model->getOutcomeChart($user);
        $merged = $this->model->mergeCharts($income, 'Incomes', $outcome, 'Outcomes');
        $data = array(
            "IncomeOutcomeChart" => $this->model->getIncomeOutcomeChart($user),
            "IncomeChart" => $income,
            "OutcomeChart" => $outcome,
            "MergedCharts" => $merged
        );
        $this->view->generate('chart_view.php', 'template_view.php', $data);
    }
}