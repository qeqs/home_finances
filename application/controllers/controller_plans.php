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
       // session_start();
        $user = $_SESSION["user"];
        if($user == null){
            Route::MainPage();
        }
        $data = $this->model->getFullTable($user);
        $this->view->generate('plans_view.php', 'template_view.php', $data);
    }

    function action_filter(){
        //todo
    }
}
