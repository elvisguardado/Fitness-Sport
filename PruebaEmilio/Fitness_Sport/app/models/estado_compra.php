<?php
/*
*	Clase para manejar la tabla clientes de la base de datos. Es clase hija de Validator.
*/
class estado_compra extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $estado = null;
    private $fecha = null;
    private $hora = null; // Valor por defecto en la base de datos: true

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateAlphanumeric($value, 1, 250)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setHora($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->hora = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    } 

    public function getEstado()
    {
        return $this->estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getHora()
    {
        return $this->hora;
    }

     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readAll()
    {
        $sql = 'SELECT id_estado_de_comp, estado, fecha_compra, hora_entrega
                FROM Estado_de_Compra 
                ORDER BY estado';
        $params = null;
        return Database::getRows($sql, $params);
    }
}