<?php

require_once 'application/exceptions/AccountNotFoundException.php';
class controller_registration extends Controller
{

    function action_index()
    {
        $this->view->generate('registration_view.php', 'template_view.php');
    }

    public function action_reg()
    {

        $name = $_POST['username'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        if (isset($name) & isset($login) & isset($password)) {

            $userManager = new UserManager();

            $user = $userManager->getUserByLogin($login);
            if ($user != null) {
                throw new AccountNotFoundException("Login exists", 400);
            }
            $user = new User();
            $user->password = $password;
            $user->login = $login;
            $user->name = $name;
            $userManager->save($user);
            (new Route)->MainPage();
        }
        else{
            (new Route)->ErrorPage404();
        }
    }
}