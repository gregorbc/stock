<?php
// Definir constantes necesarias
if (!defined('SISTEMA')) {
    define('SISTEMA', __DIR__ . '/'); // Ruta del sistema
}
if (!defined('HORARIO')) {
    define('HORARIO', 'UTC'); // Zona horaria
}
if (!defined('URLBASE')) {
    define('URLBASE', 'https://stock.gregorbritez.com'); // URL Base
}

// Configurar zona horaria
date_default_timezone_set(HORARIO);

// Autoload para cargar clases
spl_autoload_register(function ($className) {
    $filePath = SISTEMA . 'clase/' . strtolower($className) . '.php';
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        error_log("Clase no encontrada: $className en $filePath");
        throw new Exception("Error: No se pudo cargar la clase $className. Archivo no encontrado: $filePath");
    }
});

// Instanciar clases necesarias
try {
    $db = new Conexion();
    $usuario = new Usuario();
    $enlace = new Enlace();
    $sistema = new Sistema();
    $vendedor = new Vendedor();
    $notificacion = new Notificacion();
    $estadoCuenta = new EstadoCuenta();
    $productosClase = new Productos();
    $cajaDeVenta = new Venta();

    // Ejecutar métodos principales
    $sistema->ReportarError();
} catch (Exception $e) {
    error_log("Error al instanciar clases: " . $e->getMessage());
    exit("Error crítico: No se pudo inicializar el sistema.");
}
?>