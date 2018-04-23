<?php

class Controller_Main extends Controller
{
    function action_index()
    {
        if (controller_user::isGuest()) {
            // Подключаем вид
            //require_once(ROOT . 'application/views/template_unreg.php');

            $this->view->generate('main_view.php', 'template_unreg.php');
        } else {
            // Подключаем вид
            //require_once(ROOT . 'application/views/template_view.php');
            $this->view->generate('main_view.php', 'template_view.php');
        }
        return true;
    }
}
