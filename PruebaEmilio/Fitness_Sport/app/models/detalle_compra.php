<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class detalle_compra extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $precio = null;
    private $cantidad = null;
    private $nombre = null;
    private $direccion = null;
    

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

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateMoney($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateString($value)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->direccion = $value;
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

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 2 campos especificos los cuales son
    // Nombre_producto y Direccion_env
    public function searchRows($value)
    {
        $sql = 'SELECT id_detalle_compra, precio, cantidad, nombre_producto, direccion_env FROM detalle_compra
                INNER JOIN productos USING (id_producto)
                INNER JOIN compra USING (id_compra)
                WHERE nombre_producto ILIKE ? OR direccion_env ILIKE ?';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para crear las filas que tendra la tabla especificando los campos de las mismas y tomando la declaracion de atributos
    public function readAll()
    {
        $sql = 'SELECT id_detalle_compra, precio, cantidad, nombre_producto, direccion_env FROM detalle_compra
                INNER JOIN productos USING (id_producto)
                INNER JOIN compra USING (id_compra)
                ORDER BY cantidad';
        $params = null;
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readOne()
    {
        $sql = 'SELECT id_detalle_compra, precio, cantidad, nombre_producto, direccion_env FROM detalle_compra
                INNER JOIN productos USING (id_producto)
                INNER JOIN compra USING (id_compra) 
                WHERE id_detalle_compra = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

}


