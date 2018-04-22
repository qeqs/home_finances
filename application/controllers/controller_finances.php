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
        if ($user == null) {
            Route::MainPage();
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
        if ($user == null) {
            Route::MainPage();
        }

        $finance = $this->createFinance();
        if (isset($finance) & $finance->value > 0) {
            if ($finance->value > 0) {
                $this->model->getIncomes()->save($finance);
            } else {
                $this->model->getOutcomes()->save($finance);
            }
        }


        $this->view->generate('finances_view.php', 'template_view.php', $data);
    }


    public function createFinance()
    {
        $finance = new Finance();
        if (isset($_POST["Date"]) & isset($_POST["Value"]) & isset($_POST["Type"])) {
            $finance->date = $_POST["Date"];
            $finance->value = $_POST["Value"];
            $type = new Type();
            $type->name = $_POST["Type"];
            $type->description = "";
            $type_id = (new TypeManager())->save($type);
            $finance->type_id = $type_id;
        }
        if (isset($_POST["Description"])) {
            $finance->description = $_POST["Description"];
        }

        if (isset($_POST["Is_planned"])) {
            $finance->is_planned = $_POST["Is_planned"];
        }
        return $finance
    }

}
