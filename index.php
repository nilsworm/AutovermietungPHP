<?php 

session_start();

spl_autoload_register(function ($className) {
    if (substr($className, 0, 5) !== 'Blog\\') {
            // not our business
            return;
    }

    $fileName = __DIR__.'/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 5)).'.php';

    if (file_exists($fileName)) {
            include $fileName;
    }
});    
    
    
$controllerName = "";
$doMethodName = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controllerName = isset($_POST['controller']) && $_POST['controller'] ? $_POST['controller'] : "Welcome";
    $doMethodName = isset($_POST['do']) && $_POST['do'] ? $_POST['do'] : "showWelcome";
} else {
    $controllerName = isset($_GET['controller']) && $_GET['controller'] ? $_GET['controller'] : "Welcome";
    $doMethodName = isset($_GET['do']) && $_GET['do'] ? $_GET['do'] : "showWelcome";
}

$controllerClassName = 'Blog\\Controller\\'.ucfirst($controllerName).'Controller';

if (method_exists($controllerClassName, $doMethodName)) {
    $view = new \Blog\Library\View(__DIR__.DIRECTORY_SEPARATOR.'Views'
                , ucfirst($controllerName), $doMethodName);
    
    $controller = new $controllerClassName($view);
    $controller->$doMethodName();

    $view->render();

} else {
    // new \Blog\Library\ErrorMsg('Page not found: '.$controllerClassName.'::'.$doMethodName); 
}
       
