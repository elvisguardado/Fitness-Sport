<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/marca.php');
require_once('../../models/productos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se instancian las clases correspondientes.
    $marca = new Marca;
    $producto = new Productos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar según la petición del controlador.
    switch ($_GET['action']) {
        case 'readAll':
            if ($result['dataset'] = $marca->readAll()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No existen categorías para mostrar';
                }
            }
            break;
            case 'search':
                $_POST = $producto->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $marca->searchRowsM($_POST['search'])) {
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
        case 'readProductosMarca':
            if ($marca->setId($_POST['id_marca'])) {
                if ($result['dataset'] = $marca->readProductosMarca()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen productos para mostrar';
                    }
                }
            } else {
                $result['exception'] = 'Marca incorrecta';
            }
            break;
            case 'readProductosFutbol':
                if ($result['dataset'] = $marca->readProductosFutbol()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existen categorías para mostrar';
                    }
                }
                break;
                case 'readProductosBasquetbol':
                    if ($result['dataset'] = $marca->readProductosBasquetbol()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existen categorías para mostrar';
                        }
                    }
                    break;
                    case 'readProductosTenis':
                        if ($result['dataset'] = $marca->readProductosTenis()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No existen categorías para mostrar';
                            }
                        }
                        break;
                        case 'readProductosNatacion':
                            if ($result['dataset'] = $marca->readProductosNatacion()) {
                                $result['status'] = 1;
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'No existen categorías para mostrar';
                                }
                            }
                            break;
                            case 'readProductosBeisbol':
                                if ($result['dataset'] = $marca->readProductosBeisbol()) {
                                    $result['status'] = 1;
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        $result['exception'] = 'No existen categorías para mostrar';
                                    }
                                }
                                break;
                                case 'readProductosAccesorios':
                                    if ($result['dataset'] = $marca->readProductosAccesorios()) {
                                        $result['status'] = 1;
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'No existen categorías para mostrar';
                                        }
                                    }
                                    break;
        case 'readOne':
            if ($producto->setId($_POST['id_producto'])) {
                if ($result['dataset'] = $producto->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Producto incorrecto';
            }
            break;
        default:
            $result['exception'] = 'Acción no disponible';
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
