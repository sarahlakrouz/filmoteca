
<?php



require_once 'controllers/FilmsController.php';
require_once 'controllers/ContactController.php';


$requestURI = $_SERVER['REQUEST_URI'];


switch ($requestURI) {
    case '/films':
        
        $controller = new FilmsController();
        $controller->readAll();
        break;

    case '/contact':
        
        $controller = new ContactController();
        $controller->contact();
        break;

    
}