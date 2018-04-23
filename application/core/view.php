<?php

class View
{

    //public $template_view; // здесь можно указать общий вид по умолчанию.

    /*
    $content_file - виды отображающие контент страниц;
    $template_file - общий для всех страниц шаблон;
    $data - массив, содержащий элементы контента страницы. заполняется в моделе.
    */
    function generate($content_view, $template_view, $data = null)
    {

        /*
        if(is_array($data)) {

            extract($data);
        }
        */

        /*
         * подключение шаблона
        */

        if (controller_user::isGuest()) {
            // Подключаем вид
            //require_once(ROOT . 'application/views/template_unreg.php');

            include 'application/views/' . 'template_unreg.php';
        } else {
            // Подключаем вид
            //require_once(ROOT . 'application/views/template_view.php');

            include 'application/views/' . $template_view;
        }
    }
}
