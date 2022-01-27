<?php 
session_start();
require_once 'Database/Database.php';
require_once 'Models/Users.php';
require_once 'Models/Product.php';
require_once 'Models/Categories.php';
require_once 'Controllers/usersController.php';
require_once 'Controllers/AuthController.php';
require_once 'Controllers/CategoriesController.php';
require_once 'Controllers/ProductsController.php';
require_once 'Controllers/MainController.php';

$user = new App\Models\Users();
$test=$user->getAll();
if(isset($_GET['page'])){
    $page = explode('/',$_GET['page']);
    $controller = ucfirst($page[0]).'Controller';
    if(class_exists($controller)){
        $controller = new $controller();
        $method = $page[1];
        $controller->$method();
    }else{
        require_once  '404.php';
    }
    
}else{
    ob_start();
        require_once 'Templates/home.php';
        $content = ob_get_clean();
        require_once 'Templates/template.php';
    
}



?>