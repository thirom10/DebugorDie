<?php

require_once 'controllers/AuthController.php';

$controller = new AuthController();

// Obtener la acción de la URL
$action = $_GET['action'] ?? 'login';

// Enrutamiento simple
switch($action) {
    case 'login':
        $controller->showLogin();
        break;
    
    case 'process_login':
        $controller->processLogin();
        break;
    
    case 'register':
        $controller->showRegister();
        break;
    
    case 'process_register':
        $controller->processRegister();
        break;
    
    case 'dashboard':
        $controller->showDashboard();
        break;
    
    case 'logout':
        $controller->logout();
        break;
    
    default:
        $controller->showLogin();
        break;
}

?>