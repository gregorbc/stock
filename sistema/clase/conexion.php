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

class Conexion {

    private $mysqli;

    /**
     * Constructor de la clase
     */
    <?php
    class Conexion {
        public function __construct() {
            echo "Clase Conexion cargada correctamente.";
        }
    }

    /**
     * Establecimiento de la conexión a la base de datos
     * @return mysqli Manejador de conexión de base de datos
     * @throws Exception Si ocurre un error al conectar
     */
    public function Conectar() {
        $this->mysqli = new mysqli(HOST, USER, PASSWORD, DB, PORT);
        
        // Comprobar errores en la conexión
        if ($this->mysqli->connect_error) {
            throw new Exception("Error al conectar con la base de datos (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error);
        }

        // Configurar soporte para caracteres especiales
        $this->mysqli->set_charset("utf8");

        // Devolver recurso de conexión
        return $this->mysqli;
    }

    /**
     * Ejecutar una consulta SQL
     * @param string $sqlconsulta Consulta SQL
     * @return mysqli_result|false Resultado de la consulta o false si falla
     * @throws Exception Si ocurre un error al ejecutar la consulta
     */
    public function SQL($sqlconsulta) {
        $conexion = $this->Conectar();
        $resultado = $conexion->query($sqlconsulta);

        if ($conexion->error) {
            throw new Exception("Error en la consulta SQL: " . $conexion->error);
        }

        return $resultado;
    }

    /**
     * Cierra la conexión a la base de datos
     */
    public function Cerrar() {
        if ($this->mysqli) {
            $this->mysqli->close();
        }
    }
}