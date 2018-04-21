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
        $data = array(
            "IncomeOutcomeChart" => $this->model->getIncomeOutcomeChart($user),
            "IncomeChart" => $this->model->getIncomeChart($user),
            "OutcomeChart" => $this->model->getOutcomeChart($user)
        );
        $this->view->generate('chart_view.php', 'template_view.php', $data);
    }
}