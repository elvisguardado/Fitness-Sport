<?php
/*
*	Clase para manejar la tabla marcas de la base de datos. Es clase hija de Validator.
*/
class Marca extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $imagen = null;
    private $ruta = '../../../resources/img/marca/';

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

    public function setNombre($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 1 campo
    // nombre_marca

    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 2 campos especificos los cuales son
    // nombre_producto y descripcion_producto
    public function searchRowsM($value)
    {
        $sql = 'SELECT id_producto, imagen_producto, nombre_producto, stock, descripcion_producto, precio_producto, nombre_marca, estado_producto
                FROM productos INNER JOIN marca USING(id_marca) 
                WHERE nombre_producto ILIKE ? OR descripcion_producto ILIKE ?
                ORDER BY nombre_producto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    public function searchRows($value)
    {
        $sql = 'SELECT id_marca, nombre_marca, imagen_marca
                FROM marca
                WHERE nombre_marca ILIKE ? 
                ORDER BY nombre_marca';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para crear las filas que tendra la tabla especificando los campos de las mismas y tomando la declaracion de atributos
    public function createRow()
    {
        $sql = 'INSERT INTO marca(nombre_marca, imagen_marca)
                VALUES(?, ?)';
        $params = array($this->nombre, $this->imagen);
        return Database::executeRow($sql, $params);
    }
    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readAll()
    {
        $sql = 'SELECT id_marca, nombre_marca, imagen_marca
                FROM marca
                ORDER BY nombre_marca';
        $params = null;
        return Database::getRows($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para crear regitros
    public function readOne()
    {
        $sql = 'SELECT id_marca, nombre_marca, imagen_marca
                FROM marca
                WHERE id_marca = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para actualizar regitros
    public function updateRow($current_image)
    {
        // Se verifica si existe una nueva imagen para borrar la actual, de lo contrario se mantiene la actual.
        if ($this->imagen) {
            $this->deleteFile($this->getRuta(), $current_image);
        } else {
            $this->imagen = $current_image;
        }

        $sql = 'UPDATE marca
                SET imagen_marca = ?, nombre_marca = ?
                WHERE id_marca = ?';
        $params = array($this->imagen, $this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para eliminar regitros
    public function deleteRow()
    {
        $sql = 'DELETE FROM marca
                WHERE id_marca = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    //Leer los productos que pertenecen a una marca
    public function readProductosMarca()
    {
        $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN marca USING(id_marca)
                WHERE id_marca = ? AND estado_producto = true
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }
    //Leer los productos que pertenecen a Futbol
    public function readProductosFutbol()
    {
        $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN marca USING(id_marca)
                WHERE id_marca = 1';
         $params = null;
        return Database::getRows($sql, $params);
    }
    //Leer los productos que pertenecen a Basquetbol
    public function readProductosBasquetbol()
    {
        $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN marca USING(id_marca)
                WHERE id_marca = 3';
         $params = null;
        return Database::getRows($sql, $params);
    }

    //Leer los productos que pertenecen a Tenis
    public function readProductosTenis()
    {
        $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN marca USING(id_marca)
                WHERE id_marca = 2';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Leer los productos que pertenecen a Natación
    public function readProductosNatacion()
    {
        $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                FROM productos INNER JOIN marca USING(id_marca)
                WHERE id_marca = 8';
         $params = null;
        return Database::getRows($sql, $params);
    }
    
      //Leer los productos que pertenecen a Beisbol
      public function readProductosBeisbol()
      {
          $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                  FROM productos INNER JOIN marca USING(id_marca)
                  WHERE id_marca = 6';
           $params = null;
          return Database::getRows($sql, $params);
      }

      //Leer los productos que pertenecen a Accesorios
      public function readProductosAccesorios()
      {
          $sql = 'SELECT nombre_marca, id_producto, imagen_producto, nombre_producto, descripcion_producto, precio_producto
                  FROM productos INNER JOIN marca USING(id_marca)
                  WHERE id_marca = 9';
           $params = null;
          return Database::getRows($sql, $params);
      }
}
