<?php

class Controller_Main extends Controller
{
    function actionInde x()
    {
        if (UserTwo::isGuest()) {
            // Подключаем вид
            require_once(ROOT . '/views/template_unreg.php');
        } else {
            // Подключаем вид
            require_once(ROOT . '/views/template_view.php');
        }
        return true;
    }
}