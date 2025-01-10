<?php

namespace Framework\Http;
use Framework\Http\Request;
use Framework\Http\Response;
use FastRoute\RouteCollector;


class Kernel 
{
	
	public function handle(Request $request): Response
	{
		$dispatcher = \FastRoute\simpleDispatcher(function(RouteCollector $routeCollector)
		{
			$routes = include BASE_PATH.'/routes/web.php';	
			
			foreach($routes as $route)
			{
				$routeCollector->addRoute(...$route);
			}
			
		});
		
		$routeInfo = $dispatcher->dispatch(
			$request->getMethodInfo(),
			$request->getPathInfo()
		);
		
		[$status, [$controller, $method], $vars] = $routeInfo;
		
		$response = call_user_func_array(array(new $controller, $method), $vars);
	
		return new Response($response);
		
	}
	
}