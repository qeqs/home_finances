<?php

class controller_charts extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function action_index()
    {

        $user = $_SESSION["user"];
        if($user == null){
            Route::MainPage();
        }
        $model = array(
            "IncomeOutcomeChart" => $this->model->getIncomeOutcomeChart($user),
            "IncomeChart" => $this->model->getIncomeChart($user),
            "OutcomeChart" => $this->model->getOutcomeChart($user)
        );
        $this->view->generate('chart_view.php', 'template_view.php', $model);
    }
}