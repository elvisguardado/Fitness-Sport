<?php
/*
*	Clase para manejar la tabla usuarios de la base de datos. Es clase hija de Validator.
*/
class Usuarios extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $alias = null;
    private $clave = null;

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

    public function setNombres($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos($value)
    {
        if ($this->validateAlphabetic($value, 1, 50)) {
            $this->apellidos = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setAlias($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->alias = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
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

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getAlias()
    {
        return $this->alias;
    }

    public function getClave()
    {
        return $this->clave;
    }

    /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    //Este metodo se utiliza para ver el usuario 
    public function checkUser($alias)
    {
        $sql = 'SELECT id_usuario FROM usuarios WHERE alias_usuario = ?';
        $params = array($alias);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->alias = $alias;
            return true;
        } else {
            return false;
        }
    }
    //Este metodo se utiliza para ver la contraseña del cliente
    public function checkPassword($password)
    {
        $sql = 'SELECT clave_usuario FROM usuarios WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_usuario'])) {
            return true;
        } else {
            return false;
        }
    }
    //Este metodo se utiliza para cambiar la contraseña del cliente
    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET clave_usuario = ? WHERE id_usuario = ?';
        $params = array($hash, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }
    //Se utiliza para leer el perfil del usuario
    public function readProfile()
    {
        $sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($_SESSION['id_usuario']);
        return Database::getRow($sql, $params);
    }
    //Este metodo se ocupa para editar el perfil del cliente asi mismo tomando la declaracion de atributos
    public function editProfile()
    {
        $sql = 'UPDATE usuarios
                SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, alias_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $_SESSION['id_usuario']);
        return Database::executeRow($sql, $params);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    //Este metodo se ocupa para una busqueda filtrada en este caso se puede ocupar para buscar por 2 campos especificos los cuales son
    // apellidos_usuario y nombres_usuario
    public function searchRows($value)
    {
        $sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario
                FROM usuarios
                WHERE apellidos_usuario ILIKE ? OR nombres_usuario ILIKE ?
                ORDER BY apellidos_usuario';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    //Este metodo se ocupa para crear las filas que tendra la tabla especificando los campos de las mismas y tomando la declaracion de atributos
    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO usuarios(nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario, clave_usuario)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash);
        return Database::executeRow($sql, $params);
    }
    //Este metodo se ocupa para rellenar las filas de la tabla especificando cada campo
    public function readAll()
    {
        $sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario
                FROM usuarios
                ORDER BY apellidos_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para crear regitros
    public function readOne()
    {
        $sql = 'SELECT id_usuario, nombres_usuario, apellidos_usuario, correo_usuario
                FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para actualizar regitros
    public function updateRow()
    {
        $sql = 'UPDATE usuarios 
                SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->id);
        return Database::executeRow($sql, $params);
    }
    // Esta es una operacion escrud que se utiliza para eliminar regitros
    public function deleteRow()
    {
        $sql = 'DELETE FROM usuarios
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
