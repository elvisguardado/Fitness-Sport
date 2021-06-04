<?php
/*
*	Clase para manejar la tabla clientes de la base de datos. Es clase hija de Validator.
*/
class Consultas_Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $cliente = null;
    private $comentario = null;
    private $fecha = null;
    private $estado = null; // Valor por defecto en la base de datos: true

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

    public function setComentario($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->comentario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cliente = $value;
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

    public function getComentario()
    {
        return $this->comentario;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

     /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 2 campos especificos los cuales son
    // Nombres_Cliente y Recomendaciones
    public function searchRows($value)
    {
        $sql = 'SELECT id_recomendaciones, recomendaciones, fecha, estado, nombres_cliente
                FROM recomendaciones INNER JOIN clientes USING (id_cliente)
                WHERE recomendaciones ILIKE ? OR nombres_cliente ILIKE ?
                ORDER BY recomendaciones';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para crear las filas que tendra la tabla especificando los campos de las mismas y tomando la declaracion de atributos
    public function createRow()
    {
        $sql = 'INSERT INTO recomendaciones(recomendaciones, fecha, estado, id_cliente)
                VALUES(?, ?, ?, ?)';
        $params = array($this->comentario, $this->fecha, $this->estado, $this->cliente);
        return Database::executeRow($sql, $params);
    }
    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readAll()
    {
        $sql = 'SELECT id_recomendaciones, recomendaciones, fecha, estado, nombres_cliente
                FROM recomendaciones INNER JOIN clientes USING(id_cliente) 
                ORDER BY id_cliente';
        $params = null;
        return Database::getRows($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para crear regitros
    public function readOne()
    {
        $sql = 'SELECT id_recomendaciones, recomendaciones, fecha, estado, id_cliente 
                From recomendaciones
                WHERE id_recomendaciones = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para actualizar regitros
    public function updateRow()
    {
        $sql = 'UPDATE recomendaciones
                SET recomendaciones = ?, fecha = ?, estado = ?, id_cliente = ?
                WHERE id_recomendaciones = ?';
        $params = array($this->comentario, $this->estado, $this->cliente);
        return Database::executeRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para eliminar regitros
    public function deleteRow()
    {
        $sql = 'DELETE FROM recomendaciones
                WHERE id_recomendaciones = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}