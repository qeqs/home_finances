<?php

class Controller_Login extends Controller
{

    function action_index()
    {
        //$data["login_status"] = "";

        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $user = $this->login($login, $password);
            if (isset($user)) {
                $data["login_status"] = "access_granted";

                //session_start();
                $_SESSION['user'] = $user;
                header('Location:/finances');
            } else {
                $data["login_status"] = "access_denied";
            }
        } else {
            $data["login_status"] = "";
        }

        $this->view->generate('login_view.php', 'template_view.php', $data);
    }

    private function login($login, $password)
    {
        $userManager = new UserManager();
        $user = $userManager->getUserByLoginPassword($login, $password);
//        if ($user == null) {
//            throw new AccountNotFoundException("Wrong password or login", 401);
//        }
        return $user;
    }


    function action_logout()
    {
        session_start();
        session_destroy();
        header('Location:/');
    }

}
