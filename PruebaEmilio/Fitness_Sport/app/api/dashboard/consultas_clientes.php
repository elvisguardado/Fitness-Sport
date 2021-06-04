<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/consultas_clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $consultas = new Consultas_Clientes;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            //Acción para hacer un Read a todo para la tabla
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
                //Acción de buscar para el metodo de buscar
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
                //Acción para hacer una insercción para la tabla
                case 'create':
                    $_POST = $consultas->validateForm($_POST);
                    if ($consultas->setComentario($_POST['recomendaciones'])) {
                        if ($consultas->setCliente($_POST['nombres_cliente'])) {
                            if ($consultas->setCliente($_POST['fecha'])) {                                  
                                        if ($consultas->setEstado(isset($_POST['estado']) ? 1 : 0)) {                                              
                                                   } else {
                                    $result['exception'] = 'Estado incorrecto';
                                }
                            } else {
                            $result['exception'] = 'Cliente incorrecto';
                        }
                    }else {
                        $result['exception'] = 'Cliente incorrecto';
                    }
                } else {
                        $result['exception'] = 'Recomendacion Incorrecta';
                    }
                    break;
                    //Acción que solo lee por un dato
                case 'readOne':
                    if ($consultas->setId($_POST['id_recomendaciones'])) {
                        if ($result['dataset'] = $consultas->readOne()) {
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
                    //Acción para actualizar un campo o varios
                case 'update':
                    $_POST = $producto->validateForm($_POST);
                    if ($producto->setId($_POST['id_producto'])) {
                        if ($data = $producto->readOne()) {
                            if ($producto->setNombre($_POST['nombre_producto'])) {
                                if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                                    if ($producto->setPrecio($_POST['precio_producto'])) {
                                        if ($producto->setStock($_POST['stock'])){
                                        if ($producto->setMarca($_POST['tipo_marca'])) {
                                            if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                                if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                    if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                        if ($producto->updateRow($data['imagen_producto'])) {
                                                            $result['status'] = 1;
                                                            if ($producto->saveFile($_FILES['archivo_producto'], $producto->getRuta(), $producto->getImagen())) {
                                                                $result['message'] = 'Producto modificado correctamente';
                                                            } else {
                                                                $result['message'] = 'Producto modificado pero no se guardó la imagen';
                                                            }
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                    }
                                                } else {
                                                    if ($producto->updateRow($data['imagen_producto'])) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Producto modificado correctamente';
                                                    } else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione un usuario';
                                        } 
                                    } else {
                                            $result['exception'] = 'Seleccione una marca';
                                        }
                                    } else {
                                        $result['exception'] = 'Precio incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Stock Incorrecto';
                                }
                            }else {
                                    $result['exception'] = 'Descripción incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                    break;
                    //Accion para Eliminar
                case 'delete':
                    if ($consultas->setId($_POST['id_producto'])) {
                        if ($data = $producto->readOne()) {
                            if ($consultas->deleteRow()) {
                                $result['status'] = 1;
                                if ($consultas->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                    $result['message'] = 'Producto eliminado correctamente';
                                } else {
                                    $result['message'] = 'Producto eliminado pero no se borró la imagen';
                                }
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                    break;
                case 'cantidadProductosMarca':
                    if ($result['dataset'] = $producto->cantidadProductosMarca()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
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