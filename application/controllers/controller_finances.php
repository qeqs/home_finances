<?php

class controller_finances extends Controller
{
    function __construct()
    {
        $this->model = new model_finances();
        $this->view = new View();
    }

    function action_index()
    {
        // session_start();
        $user = $_SESSION["user"];
        if (!isset($user)) {
            (new Route)->MainPage();
        }
        $data = $this->model->getFullTable($user);
        $this->view->generate('finances_view.php', 'template_view.php', $data);
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

        $finance = $this->model->createFinance($user);
        if ($finance->value > 0) {
            if ($finance->value > 0) {
                $this->model->getIncomes()->save($finance);
            } else {
                $this->model->getOutcomes()->save($finance);
            }
        }
        (new Route())->FinancesPage();
        //$this->action_index();
    }




}