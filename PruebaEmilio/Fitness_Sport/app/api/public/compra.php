<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/compra.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $consultas = new Compra;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_cliente'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $consultas->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay consultas registrados';
                    }
                }
                break;
            case 'search':
                $_POST = $consultas->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $consultas->searchRows($_POST['search'])) {
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
            case 'create':
                $_POST = $consultas->validateForm($_POST);
                if ($consultas->setComentario($_POST['recomendaciones'])) {
                    if ($consultas->setCliente($_POST['id_cliente'])) {
                                                    if ($consultas->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                    if ($consultas->createRow()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Consulta registrado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                }else{
                                                    $result['exception'] = 'Estado incorrecto';
                                                }
                                                } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
           
        break;
            case 'readOne':
                if ($consultas->setId($_POST['id_recomendaciones'])) {
                    if ($result['dataset'] = $consultas->readOne()) {
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
                $_POST = $consultas->validateForm($_POST);
                if ($consultas->setId($_POST['id_cliente'])) {
                    if ($data = $consultas->readOne()) {
                        if ($consultas->setNombres($_POST['nombres_cliente'])) {
                            if ($consultas->setApellidos($_POST['apellidos_cliente'])) {
                                if ($consultas->setCorreo($_POST['correo_cliente'])) {
                                    if ($consultas->setDireccion($_POST['direccion_cliente'])) {
                                        if ($consultas->setDUI($_POST['dui_cliente'])) {   
                                            if ($consultas->setNacimiento($_POST['nacimiento_cliente'])) {
                                                if ($consultas->setTelefono($_POST['telefono_cliente'])) {
                                                        if ($consultas->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                            if ($consultas->updateRow()) {
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
                if ($consultas->setId($_POST['id_recomedaciones'])) {
                    if ($data = $consultas->readOne()) {
                        if ($consultas->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Consulta eliminado correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Consulta inexistente';
                    }
                } else {
                    $result['exception'] = 'Consulta incorrecto';
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