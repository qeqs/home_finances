<?php

class Route
{

	static function start()
	{
	    $_SESSION['session_started'] = session_start();
		// default controller/page
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}

		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		/*
		echo "Model: $model_name <br>";
		echo "Controller: $controller_name <br>";
		echo "Action: $action_name <br>";
		*/

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			 * todo: throw exception here
			*/
			(new Route)->ErrorPage404();
		}

		$controller = new $controller_name;//creating controller
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			$controller->$action();//call controller's action
		}
		else
		{
			// todo: throw exception here
			(new Route)->ErrorPage404();
		}
	
	}

	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }

    function MainPage(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host);
    }

    function FinancesPage(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('Location:'.$host.'finances');
    }
    
}
