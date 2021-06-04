<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/detalle_pedido.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $detalle_pedido = new detalle_pedido;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            //Acción para hacer un Read a todo para la tabla
            case 'readAll':
                if ($result['dataset'] = $detalle_pedido->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay pedidos registrados';
                    }
                }
                break;
                //Acción de buscar para el metodo de buscar
            case 'search':
                $_POST = $detalle_pedido->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $detalle_pedido->searchRows($_POST['search'])) {
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
            //Acción que solo lee por un dato
            case 'readOne':
                if ($detalle_pedido->setId($_POST['id_compra'])) {
                    if ($result['dataset'] = $detalle_pedido->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Pedido inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Pedido incorrecto';
                }
                break;
                //Acción para actualizar un campo o varios
            case 'update':
                $_POST = $detalle_pedido->validateForm($_POST);
                if ($detalle_pedido->setId($_POST['id_compra'])) {
                    if ($data = $detalle_pedido->readOne()) {
                        if ($detalle_pedido->setEstado($_POST['estado'])) {
                            if ($detalle_pedido->updateRow()) {
                              $result['status'] = 1;
                             $result['message'] = 'Pedido modificado correctamente';
                            }else{
                                $result['exception'] = Database::getException();
                                 }
                        } else {
                                    $result['exception'] = 'Estado Inexistente';
                             }
                    } else {
                        $result['exception'] = 'Pedido Inexistente';
                        }
                } else {
                     $result['exception'] = 'Pedido incorrecto';
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
