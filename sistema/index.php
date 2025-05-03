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

/**
 * QualtivaWebAPP Version
 *
 * @var string
 *
 */

// Verificar y definir constantes
if (!defined('MYLOTTERYAPP_VERSION')) {
    define('MYLOTTERYAPP_VERSION', '2.0.1');
}

if (!defined('ENTORNO_DESARROLLO')) {
    define('ENTORNO_DESARROLLO', false);
}

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

if (!defined('URLBASE')) {
    define('URLBASE', 'https://stock.gregorbritez.com'); // Definir URLBASE
}

if (!defined('ESTATICO')) {
    define('ESTATICO', URLBASE . 'estatico/');
}

if (!defined('IMGNOTICIAS')) {
    define('IMGNOTICIAS', ESTATICO . 'img/noticias/');
}

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}

if (!defined('SISTEMA')) {
    define('SISTEMA', __ROOT__ . DS . 'sistema' . DS);
}

if (!defined('CLASE')) {
    define('CLASE', SISTEMA . 'clase' . DS);
}

if (!defined('MODULO')) {
    define('MODULO', SISTEMA . 'modulo' . DS);
}

if (!defined('EXCEL')) {
    define('EXCEL', SISTEMA . 'tmp' . DS . 'excel' . DS);
}

// Configuración de sesiones
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1); // Prevenir uso de cookies con JavaScript
    ini_set('session.use_only_cookies', 1); // Usar solo cookies para la sesión
}

// Configuración de zona horaria
if (!defined('HORARIO')) {
    define('HORARIO', 'UTC'); // Cambia 'UTC' por tu zona horaria si es necesario.
}
date_default_timezone_set(HORARIO);

// Directorios Importantes NO EDITAR DE AQUÍ EN ADELANTE
require_once(SISTEMA . 'clase.php');
require_once(SISTEMA . 'metodo.php');
require_once(SISTEMA . 'Tema.Apps.php');
require_once(SISTEMA . 'POO.php');