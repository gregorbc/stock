<?php
/**
* Copyright (C) 2015 QualtivaWebAPP <http://www.qualtivacr.com>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
**/

/*
|--------------------------------------------------------------------------|
| Carga automática de Clases
|--------------------------------------------------------------------------|
*/

// Verificar que las constantes necesarias estén definidas
if (!defined('SISTEMA') || !defined('DS')) {
    exit('Error: Las constantes SISTEMA y DS deben estar definidas.');
}

spl_autoload_register(function ($className) {
    $filePath = __DIR__ . '/clase/' . strtolower($className) . '.php';
    if (file_exists($filePath)) {
        require_once $filePath;
    } else {
        error_log("Clase no encontrada: $className en $filePath");
        throw new Exception("Error: No se pudo cargar la clase $className. Archivo no encontrado: $filePath");
    }
});
/*
|--------------------------------------------------------------------------|
| Instanciar Clases
|--------------------------------------------------------------------------|
*/
try {
    $db = new Conexion();
    $usuario = new Usuario();
    $enlace = new Enlace();
    $sistema = new Sistema();
    $Vendedor = new Vendedor();
    $notificacion = new Notificacion();
    $EstadoCuenta = new EstadoCuenta();
    $ProductosClase = new Productos();
    $CajaDeVenta = new Venta();

    // Ejecutar algunas clases
    $sistema->ReportarError();
} catch (Exception $e) {
    // Manejo de errores al instanciar clases
    error_log("Error al instanciar las clases: " . $e->getMessage());
    exit("Error crítico: No se pudo inicializar el sistema. Consulte los logs para más detalles.");
}
?>