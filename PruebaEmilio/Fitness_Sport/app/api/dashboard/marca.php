<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/marca.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $marca = new Marca;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_usuario'])) {
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            //Acción para hacer un Read a todo para la tabla
            case 'readAll':
                if ($result['dataset'] = $marca->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay marcas registradas';
                    }
                }
                break;
                //Acción de buscar para el metodo de buscar
            case 'search':
                $_POST = $marca->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $marca->searchRows($_POST['search'])) {
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
                $_POST = $marca->validateForm($_POST);
                if ($marca->setNombre($_POST['nombre_marca'])) {
                        if (is_uploaded_file($_FILES['archivo_marca']['tmp_name'])) {
                            if ($marca->setImagen($_FILES['archivo_marca'])) {
                                if ($marca->createRow()) {
                                    $result['status'] = 1;
                                    if ($marca->saveFile($_FILES['archivo_marca'], $marca->getRuta(), $marca->getImagen())) {
                                        $result['message'] = 'Marca creada correctamente';
                                    } else {
                                        $result['message'] = 'Marca creada pero no se guardó la imagen';
                                    }
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = $marca->getImageError();
                            }
                        } else {
                        $result['exception'] = 'Descripción incorrecta';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
                //Acción que solo lee por un dato
            case 'readOne':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($result['dataset'] = $marca->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Marca inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
                }
                break;
                //Acción para actualizar un campo o varios
            case 'update':
                $_POST = $marca->validateForm($_POST);
                if ($marca->setId($_POST['id_marca'])) {
                    if ($data = $marca->readOne()) {
                        if ($marca->setNombre($_POST['nombre_marca'])) {
                                if (is_uploaded_file($_FILES['archivo_marca']['tmp_name'])) {
                                    if ($marca->setImagen($_FILES['archivo_marca'])) {
                                        if ($marca->updateRow($data['imagen_marca'])) {
                                            $result['status'] = 1;
                                            if ($marca->saveFile($_FILES['archivo_marca'], $marca->getRuta(), $marca->getImagen())) {
                                                $result['message'] = 'Marca modificada correctamente';
                                            } else {
                                                $result['message'] = 'Marca modificada pero no se guardó la imagen';
                                            }
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = $marca->getImageError();
                                    }
                                } else {
                                    if ($marca->updateRow($data['imagen_marca'])) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Marca modificada correctamente';
                                    } else {
                                        $result['exception'] = Database::getException();
                                    }
                                }
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    }  else {
                    $result['exception'] = 'Marca incorrecta';
                }
                break;
                 //Accion para Eliminar
            case 'delete':
                if ($marca->setId($_POST['id_marca'])) {
                    if ($data = $marca->readOne()) {
                        if ($marca->deleteRow()) {
                            $result['status'] = 1;
                            if ($marca->deleteFile($marca->getRuta(), $data['imagen_marca'])) {
                                $result['message'] = 'Marca eliminada correctamente';
                            } else {
                                $result['message'] = 'Marca eliminada pero no se borró la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Marca inexistente';
                    }
                } else {
                    $result['exception'] = 'Marca incorrecta';
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