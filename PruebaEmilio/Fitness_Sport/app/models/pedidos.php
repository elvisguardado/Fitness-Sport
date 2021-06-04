<?php
/*
*	Clase para manejar las tablas pedidos y detalle_pedido de la base de datos. Es clase hija de Validator.
*/
class Pedidos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_compra = null;
    private $id_detalle_compra = null;
    private $cliente = null;
    private $producto = null;
    private $cantidad = null;
    private $precio = null;
    private $estado = null; // Valor por defecto en la base de datos: 0
    /*
    *   ESTADOS PARA UN PEDIDO
    *   0: Pendiente. Es cuando el pedido esta en proceso por parte del cliente y se puede modificar el detalle.
    *   1: Finalizado. Es cuando el cliente finaliza el pedido y ya no es posible modificar el detalle.
    *   2: Entregado. Es cuando la tienda ha entregado el pedido al cliente.
    *   3: Anulado. Es cuando el cliente se arrepiente de haber realizado el pedido.
    */

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setIdCompra($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_compra = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalleCompra($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_detalle_compra = $value;
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

    public function setProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
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

    public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdCompra()
    {
        return $this->id_compra;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    // Método para verificar si existe un pedido en proceso para seguir comprando, de lo contrario se crea uno.
    public function startOrder()
    {
        $this->estado = 0;

        $sql = 'SELECT id_compra
                FROM compra
                WHERE estado_compra = ? AND id_cliente = ?';
        $params = array($this->estado, $_SESSION['id_cliente']);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_compra = $data['id_compra'];
            return true;
        } else {
            $sql = 'INSERT INTO compra(estado_compra, id_cliente)
                    VALUES(?, ?)';
            $params = array($this->estado, $_SESSION['id_cliente']);
            // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
            if ($this->id_compra = Database::getLastRow($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Método para agregar un producto al carrito de compras.
    public function createDetail()
    {
        // Se realiza una subconsulta para obtener el precio del producto.
        $sql = 'INSERT INTO detalle_compra(id_producto, precio, cantidad, id_compra)
                VALUES(?, (SELECT precio FROM productos WHERE id_producto = ?), ?, ?)';
        $params = array($this->producto, $this->producto, $this->cantidad, $this->id_compra);
        return Database::executeRow($sql, $params);
    }

    // Método para obtener los productos que se encuentran en el carrito de compras.
    public function readOrderDetail()
    {
        $sql = 'SELECT id_detalle_compra, nombre_producto, detalle_compra.precio, detalle_compra.cantidad
                FROM compra INNER JOIN detalle_compra USING(id_compra) INNER JOIN productos USING(id_producto)
                WHERE id_compra = ?';
        $params = array($this->id_compra);
        return Database::getRows($sql, $params);
    }

    // Método para finalizar un pedido por parte del cliente.
    public function finishOrder()
    {
        // Se establece la zona horaria local para obtener la fecha del servidor.
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $this->estado = 1;
        $sql = 'UPDATE compra
                SET estado_compra = ?, fecha_compra = ?
                WHERE id_compra = ?';
        $params = array($this->estado, $date, $_SESSION['id_compra']);
        return Database::executeRow($sql, $params);
    }

    // Método para actualizar la cantidad de un producto agregado al carrito de compras.
    public function updateDetail()
    {
        $sql = 'UPDATE detalle_compra
                SET cantidad = ?
                WHERE id_detalle_compra = ? AND id_compra = ?';
        $params = array($this->cantidad, $this->id_detalle_compra, $_SESSION['id_compra']);
        return Database::executeRow($sql, $params);
    }

    // Método para eliminar un producto que se encuentra en el carrito de compras.
    public function deleteDetail()
    {
        $sql = 'DELETE FROM detalle_compra
                WHERE id_compra = ? AND id_compra = ?';
        $params = array($this->id_compra, $_SESSION['id_compra']);
        return Database::executeRow($sql, $params);
    }
}
