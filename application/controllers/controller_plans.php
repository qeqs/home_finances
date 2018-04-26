<?php

class controller_plans extends Controller
{
    function __construct()
    {
        $this->model = new model_plans();
        $this->view = new View();
    }

    function action_index()
    {
        //session_start();
        $user = $_SESSION["user"];
        error_log(json_encode($user));
        if (!isset($user) || $user == null) {
            (new Route)->MainPage();
        }
        $data = $this->model->getFullTable($user);
        $this->view->generate('plans_view.php', 'template_view.php', $data);
    }

    function action_filter()
    {
        //todo
    }

    function action_add()
    {
        $user = $_SESSION["user"];
        if (!isset($user)) {
            (new Route)->MainPage();
        }

        $plans = $this->model->createPlans($user);
        if ($plans->value > 0) {
            if ($plans->value > 0) {
                $this->model->getIncomes()->save($plans);
            } else {
                $this->model->getOutcomes()->save($plans);
            }
        }
        (new Route())->PlansPage();
        //$this->action_index();
    }}
