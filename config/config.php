<?php
// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'ic6821');
define('DB_PASS', 'ic6821');
define('DB_NAME', 'ic6821_ejemplo2');

// Otras configuraciones globales
//define('SITE_URL', 'http://tu_sitio_web.com');
//define('UPLOAD_PATH', 'uploads/');

// Configuración de la zona horaria
date_default_timezone_set('America/Costa_Rica');

// Configuración para mostrar errores (para desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Autocarga de clases (si estás usando Composer)
// require_once __DIR__ . '/vendor/autoload.php';
