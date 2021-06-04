<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class inventario extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $fecha = null;
    private $stock = null;
    private $nombre = null;
    private $usuario = null;
    
  
    

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

    public function setFecha($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setStock($value)
    {
        if ($this->validateMoney($value)) {
            $this->stock = $value;
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

    public function setUsuario($value)
    {
        if ($this->validateString($value, 1, 250)) {
            $this->usuario = $value;
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

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 2 campos especificos los cuales son
    // Nombre_producto y nombres_usuario
    public function searchRows($value)
    {
        $sql = 'SELECT id_inventario, fecha_ingreso, r.stock, r.nombre_producto, e.nombres_usuario
                FROM inventario 
                Inner join productos r
                on Inventario.id_producto = r.id_producto
                Inner join usuarios e
                on Inventario.id_usuario = e.id_usuario
                WHERE r.nombre_producto ILIKE ? OR e.nombres_usuario ILIKE ?
                ORDER BY fecha_ingreso';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para crear las filas que tendra la tabla especificando los campos de las mismas y tomando la declaracion de atributos
    public function readAll()
    {
        $sql = 'SELECT id_inventario, fecha_ingreso, r.stock, r.nombre_producto, e.nombres_usuario
                FROM inventario 
                Inner join productos r
                on Inventario.id_producto = r.id_producto
                Inner join usuarios e
                on Inventario.id_usuario = e.id_usuario
                ORDER BY fecha_ingreso';
        $params = null;
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readOne()
    {
        $sql = 'SELECT id_inventario, fecha_ingreso, r.stock, r.nombre_producto, e.nombres_usuario
                FROM inventario 
                Inner join productos r
                on Inventario.id_producto = r.id_producto
                Inner join usuarios e
                on Inventario.id_usuario = e.id_usuario 
                WHERE id_inventario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

}


