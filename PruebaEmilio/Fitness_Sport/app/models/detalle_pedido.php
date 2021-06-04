<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class detalle_pedido extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $direccion = null;
    private $impuestos = null;
    private $total = null;
    private $precio = null;
    private $nombres= null;
    private $estado = null;    
    
  
    

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

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImpuesto($value)
    {
        if ($this->validateMoney($value)) {
            $this->impuesto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->total = $value;
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

    public function setNombre($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->nombre = $value;
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



    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getImpuestos()
    {
        return $this->impuestos;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }


    

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 2 campos especificos los cuales son
    // Nombre_producto y Direccion_env
    public function searchRows($value)
    {
        $sql = 'SELECT id_compra, direccion_env, impuestos, total, precio_env, nombres_cliente, estado From compra
                INNER JOIN clientes USING (id_cliente)
                INNER JOIN Estado_de_compra USING (id_estado_de_comp)
                WHERE nombres_cliente ILIKE ? OR direccion_env ILIKE ?
                ORDER BY estado';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para crear las filas que tendra la tabla especificando los campos de las mismas y tomando la declaracion de atributos
    public function readAll()
    {
        $sql = 'SELECT id_compra, direccion_env, impuestos, total, precio_env, nombres_cliente, estado From compra
                INNER JOIN clientes USING (id_cliente)
                INNER JOIN Estado_de_Compra USING (id_estado_de_comp)
                ORDER BY estado';
        $params = null;
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readOne()
    {
        $sql = 'SELECT id_compra, id_estado_de_comp From compra
                WHERE id_compra = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para actualizar regitros
    public function updateRow()
    {
        $sql = 'UPDATE compra
                SET id_estado_de_comp = ?
                WHERE id_compra = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }




}


