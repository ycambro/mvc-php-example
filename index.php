<?php
require_once('config/config.php');
require_once('controller/HomeController.php');
require_once('controller/AuthController.php');

// Obtener la ruta actual de la URL
$request = $_SERVER['REQUEST_URI'];

// Ejemplo básico de enrutamiento
if ($request === '/home') {
    // Página de inicio
    $homeController = new HomeController();
    $homeController->index();
} elseif ($request === '/login') {
    // Página de inicio de sesión
    $authController = new AuthController();
    $authController->login();
} elseif ($request === '/register') {
    // Página de registro
    $authController = new AuthController();
    $authController->register();
} elseif ($request === '/logout') {
    // Página de cierre de sesión
    $authController = new AuthController();
    $authController->logout();
} elseif ($request === '/update-profile') {
    // Página de actualización de perfil
    $homeController = new HomeController();
    $homeController->updateProfile();
} elseif ($request === '/upload-thumbnail') {
    // Página de carga de miniatura
    $homeController = new HomeController();
    $homeController->uploadThumbnail();
} else {
    // Página no encontrada (404)
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
?>
