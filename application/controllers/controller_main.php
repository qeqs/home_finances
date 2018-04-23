<?php

class Controller_Main extends Controller
{
    function action_index()
    {
        if (UserTwo::isGuest()) {
            // Подключаем вид
            require_once(ROOT . 'application/views/template_unreg.php');
        } else {
            // Подключаем вид
            require_once(ROOT . 'application/views/template_view.php');
        }
        return true;
    }
}
