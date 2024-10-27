<?php 
require dirname(__DIR__). '/vendor/autoload.php';
$whoops= new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$uri = $_SERVER['REQUEST_URI'];
$router = new AltoRouter();
require dirname(__DIR__).'/routes/routes.php';
// match des routes
$match = $router->match();
if(is_array($match)){
    if(is_callable($match['target']))
    {
    call_user_func_array($match['target'],$match['params']);
    }else{
        $params=$match['params'];
        require "../templates/{$match['target']}.php";
    }   
}else
// page 404 a affichers
{
    require '../templates/404.php';
}
 


