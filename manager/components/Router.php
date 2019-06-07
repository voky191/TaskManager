<?php


class Router
{
    private  $routes; //rotes array

    public function __construct()
    {
      $routesPath = ROOT.'/config/routes.php';
      $this->routes = include($routesPath);
    }

    //returns request string
    private function getURI()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
       //get request string
       $uri = $this->getURI();

       //for every route
        // $uriPattern - request string
        // $path - path like 'news/index'
       foreach ($this->routes as $uriPattern => $path)
       {
           //check match for $uri and $uriPattern
           if(preg_match("~$uriPattern~", $uri))
           {

               //forming internal route
               $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

               $segments = explode('/', $internalRoute);

               $controllerName = array_shift($segments) . 'Controller';
               $controllerName = ucfirst($controllerName);

               $actionName = 'action' . ucfirst(array_shift($segments));
               $parameters = $segments;




               //connect class controller file
               $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
               if(file_exists($controllerFile))
               {
                   include_once ($controllerFile);
               }


               $controllerObject = new $controllerName;

               //call action in actionName from controllerObject  and gives array with parameters

               $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
               if($result != null)
               {
                   break;
               }
           }
       }


    }
}