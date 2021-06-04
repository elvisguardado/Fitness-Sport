<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/administrar_empleado.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $usuarios = new administrar_empleados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            //Acción para hacer un Read a todo para la tabla
            case 'readAll':
                if ($result['dataset'] = $usuarios->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay productos registrados';
                    }
                }
                break;
            //Acción de buscar para el metodo de buscar
            case 'search':
                $_POST = $usuarios->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuarios->searchRows($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            //Acción para hacer una insercción para la tabla
            case 'create':
                $_POST = $usuarios->validateForm($_POST);
                if ($usuarios->setNombre($_POST['nombre_admin_empl'])) {
                    if ($usuarios->setApellido($_POST['apellido_admin_empl'])) {
                        if ($usuarios->setCorreo($_POST['correo_admin_empl'])) {
                            if ($usuarios->setUsuario($_POST['usuario_admin_empl'])) {
                                if ($usuarios->setClave($_POST['clave_admin_empl'])) {
                                    if ($usuarios->createRow()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Usuario creado correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                } else {
                                    $result['exception'] = 'Clave incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Usuario incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            //Acción que solo lee por un dato
            case 'readOne':
                if ($usuarios->setId($_POST['id_usuario'])) {
                    if ($result['dataset'] = $usuarios->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            //Acción para actualizar un campo o varios
            case 'update':
                $_POST = $usuarios->validateForm($_POST);
                if ($usuarios->setId($_POST['id_usuario'])) {
                    if ($data = $usuarios->readOne()) {
                        if ($usuarios->setNombre($_POST['nombre_admin_empl'])) {
                            if ($usuarios->setApellido($_POST['apellido_admin_empl'])) {
                                if ($usuarios->setCorreo($_POST['correo_admin_empl'])) {
                                    if ($usuarios->setUsuario($_POST['usuario_admin_empl'])) {
                                        if ($usuarios->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Usuario modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Falto Usuario';
                                    }
                                } else {
                                    $result['exception'] = 'Falto Correo';
                                }
                            } else {
                                $result['exception'] = 'Apellido incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre Incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecta';
                    }
                } else {
                    $result['exception'] = 'Id incorrecto';
                }

                break;
            //Accion para Eliminar
            case 'delete':
                if ($usuarios->setId($_POST['id_usuario'])) {
                    if ($data = $usuarios->readOne()) {
                        if ($usuarios->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Producto eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }
} else {
    print(json_encode('Recurso no disponible'));
}
