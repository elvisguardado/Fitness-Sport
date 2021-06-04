<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/registro_clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new registro_clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            
            //Acción para hacer un Read a todo para la tabla
            case 'readAll':
                if ($result['dataset'] = $cliente->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay clientes registrados';
                    }
                }
                break;
                //Acción de buscar para el metodo de buscar
            case 'search':
                $_POST = $cliente->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $cliente->searchRows($_POST['search'])) {
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
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setNombres($_POST['nombres_cliente'])) {
                    if ($cliente->setApellidos($_POST['apellidos_cliente'])) {
                        if ($cliente->setCorreo($_POST['correo_cliente'])) {
                            if ($cliente->setDireccion($_POST['direccion_cliente'])) {
                                if ($cliente->setDUI($_POST['dui_cliente'])) {
                                    if ($cliente->setNacimiento($_POST['nacimiento_cliente'])) {
                                        if ($cliente->setTelefono($_POST['telefono_cliente'])) {
                                                if ($cliente->setClave($_POST['clave_cliente'])) {
                                                    if ($cliente->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                    if ($cliente->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Cliente registrado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                }else{
                                                    $result['exception'] = 'Estado incorrecto';
                                                }
                                                } else {
                                                    $result['exception'] = 'Clave incorrecto';
                                                } 
                                        } else {
                                            $result['exception'] = 'Teléfono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'DUI incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Dirección incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
           
        break;
        //Acción que solo lee por un dato
            case 'readOne':
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($result['dataset'] = $cliente->readOne()) {
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
            case 'update':
                //Acción para actualizar un campo o varios
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($data = $cliente->readOne()) {
                        if ($cliente->setNombres($_POST['nombres_cliente'])) {
                            if ($cliente->setApellidos($_POST['apellidos_cliente'])) {
                                if ($cliente->setCorreo($_POST['correo_cliente'])) {
                                    if ($cliente->setDireccion($_POST['direccion_cliente'])) {
                                        if ($cliente->setDUI($_POST['dui_cliente'])) {   
                                            if ($cliente->setNacimiento($_POST['nacimiento_cliente'])) {
                                                if ($cliente->setTelefono($_POST['telefono_cliente'])) {
                                                        if ($cliente->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                            if ($cliente->updateRow()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Cliente modificado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        }else{
                                                            $result['exception'] = 'Falto Estado';  
                                                        }
                                                }else{
                                                    $result['exception'] = 'Falto Telefono'; 
                                                }
                                            }else{
                                                $result['exception'] = 'Falto fecha de nacimiento';
                                            }
                                        }else{
                                            $result['exception'] = 'Falto Dui';
                                        }
                                    } else {
                                        $result['exception'] = 'Falto Direccion';
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
                        $result['exception'] = 'Cliente incorrecta';
                    }
                } else {
                    $result['exception'] = 'Id incorrecto';
                }

                break;
            case 'delete':
                 //Accion para Eliminar
                if ($cliente->setId($_POST['id_cliente'])) {
                    if ($data = $cliente->readOne()) {
                        if ($cliente->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Cliente eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                } else {
                    $result['exception'] = 'Cliente incorrecto';
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
