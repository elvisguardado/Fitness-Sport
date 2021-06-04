<?php
/*
*	Clase para definir las plantillas de las páginas web del sitio privado.
*/
class admin_page
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web y del contenido principal).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <title>Fitness Sport - Bienvenido ' . $title . '</title>
                    <link type="image/png" rel="icon" href="../../resources/img/4.png"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/material_icons.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/dashboard.css"/>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body>
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_usuario'])) {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para no iniciar sesión otra vez, de lo contrario se direcciona a main.php
            if ($filename != 'index.php' && $filename != 'register.php') {
                // Se llama al método que contiene el código de las cajas de dialogo (modals).
                self::modals();
                // Se imprime el código HTML para el encabezado del documento con el menú de opciones.
                print('
                <header>
                <div class="navbar-fixed">
                    <nav class=" cyan darken-4">
                        <div class="nav-wrapper">
                            <a href="main.php" class="brand-logo"><img src="../../resources/img/3.png" height="48"></a>
                                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul class="right hide-on-med-and-down">
                                    <li><a href="main.php"><i class="material-icons left">home</i>Principal</a></li>
                                    <li><a href="inventario.php"><i class="material-icons left">assignment</i>Inventario</a></li>
                                    <li><a href="#" class="dropdown-trigger" data-target="dropdown7"><i class="material-icons left">arrow_drop_down</i>Productos</a></li>
                                    <li><a href="#" class="dropdown-trigger" data-target="dropdown3"><i class="material-icons left">arrow_drop_down</i>Empleados</a></li>
                                    <li><a href="#" class="dropdown-trigger" data-target="dropdown4"><i class="material-icons left">arrow_drop_down</i>Clientes</a></li>                           
                                    <li><a href="#" class="dropdown-trigger" data-target="dropdown5"><i class="material-icons left">verified_user</i>Cuenta: <b>' . $_SESSION['alias_usuario'] . '</b></a></li>

                                </ul>
                                <ul id="dropdown7" class="dropdown-content">
                                        <li><a href="productos.php"><i class="material-icons left">local_mall</i>Producto</a></li>
                                        <li><a href="marca.php"><i class="material-icons left">shop_two</i>Marca</a></li>
                                    </ul>
                                <ul id="dropdown3" class="dropdown-content">
                                        <li><a href="administrar_empleado.php"><i class="material-icons left">group</i>Registro Empleado</a></li>
                                        <li><a href="consultas_clientes.php"><i class="material-icons left">lobusiness_centerck</i>Consulta Clientes</a></li>
                                    </ul>
                                <ul id="dropdown4" class="dropdown-content">
                                        <li><a href="registro_clientes.php"><i class="material-icons">contacts</i>Registro Clientes</a></li>
                                        <li><a href="detalle_pedido.php"><i class="material-icons left">assignment</i>Detalle Pedido</a></li>
                                        <li><a href="detalle_compra.php"><i class="material-icons left">attach_money</i>Detalle Compra</a></li>
                                    </ul>
                                <ul id="dropdown5" class="dropdown-content">
                                        <li><a href="#" onclick="openProfileDialog()"><i class="material-icons">contact_mail</i>Editar perfil</a></li>
                                        <li><a href="#" onclick="openPasswordDialog()"><i class="material-icons">lock</i>Cambiar clave</a></li>
                                        <li><a href="#" onclick="logOut()"><i class="material-icons">clear</i>Salir</a></li>
                                    </ul>
                            </div>
                        </nav>
                    </div>
        
                    <!--Creacion de vista para telefono-->         
                    <ul class="sidenav" id="mobile">
                        <li><a href="main.php"><i class="material-icons left">home</i>Principal</a></li>
                        <li><a href="inventario.php"><i class="material-icons left">assignment</i>Inventario</a></li>
                        <li><a href="productos.php"><i class="material-icons left">local_mall</i>Producto</a></li>
                        <li><a href="#" class="dropdown-trigger" data-target="dropdown"><i class="material-icons left">group</i>Empleados</a></li>
                        <li><a href="#" class="dropdown-trigger" data-target="dropdown1"><i class="material-icons left">arrow_drop_down</i>Clientes</a></li>
                        <li><a href="#" class="dropdown-trigger" data-target="dropdown2"><i class="material-icons left">account_circle</i>Cuenta: <b>' . $_SESSION['alias_usuario'] . '</b></a></li>
                    </ul>
                    <ul id="dropdown" class="dropdown-content">
                        <li><a href="administrar_empleado.php"><i class="material-icons left">contacts</i>Registro Empleado</a></li>
                        <li><a href="consultas_clientes.php"><i class="material-icons left">business_center</i>Consulta Clientes</a></li>
                    </ul>
                    <ul id="dropdown1" class="dropdown-content">
                        <li><a href="registro_clientes.php"><i class="material-icons">face</i>Registro Clientes</a></li>
                        <li><a href="detalle_pedido.php"><i class="material-icons left">assignment</i>Detalle Pedido</a></li>
                        <li><a href="detalle_compra.php"><i class="material-icons left">attach_money</i>Detalle Compra</a></li>
                    </ul>
                    <ul id="dropdown2" class="dropdown-content">
                        <li><a href="#" onclick="openProfileDialog()"><i class="material-icons">contact_mail</i>Editar perfil</a></li>
                        <li><a href="#" onclick="openPasswordDialog()"><i class="material-icons">lock</i>Cambiar clave</a></li>
                        <li><a href="#" onclick="logOut()"><i class="material-icons">clear</i>Cerrar Sesión</a></li>
                    </ul>
            </header>
                    <main class="container">
                        <h3 class="center-align">' . $title . '</h3>
                ');
            } else {
                header('location: main.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'index.php' && $filename != 'register.php') {
                header('location: index.php');
            } else {
                // Se imprime el código HTML para el encabezado del documento con un menú vacío cuando sea iniciar sesión o registrar el primer usuario.
                print('
                    <header>
                        <div class="navbar-fixed">
                            <nav class="cyan darken-4">
                                <div class="nav-wrapper">
                                    <a href="main.php" class="brand-logo"><img src="../../resources/img/3.png" height="48"></a>
                                </div>
                            </nav>
                        </div>
                    </header>
                    <main class="container">
                        <h3 class="center-align">' . $title . '</h3>
                ');
            }
        }
    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se comprueba si existe una sesión de administrador para imprimir el pie respectivo del documento.
        if (isset($_SESSION['id_usuario'])) {
            $scripts = '
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/initialization.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/account.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            ';
        } else {
            $scripts = '
                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '"></script>
            ';
        }
        print('
                    </main>
                    <footer class="page-footer cyan darken-4">
                    <div class="container">
                       <div class="row">
                       <div class="col s12 m6 l6">
                       <h5 class="white-text">Derechos de autor reservados para la compañia</h5>
                       <p class="grey-text text-lighten-4">Razon social:  Fitness Sports, s.a. de c.v

                       Número de identificación tributaria (NIT):  0114-900803-101-5
                       
                       Dirección: 9ª calle poniente #3935. Col. Escalon, San Salvador.
                       
                       © 2020 Fitness Sport | Fitnes_Sport.com.sv | Todos los derechos reservados.</p>
                   </div>
                   <div class="col l4 offset-l2 s12">
                       <h5 class="white-text">Terminos de uso</h5>
                       <ul>
                       <li><a class="white-text" href="https://www.facebook.com/Fitness-Sport-106849218143648">Politicas de Privacidad</a><i class="material-icons left">build</i></li>
                       <li><a class="white-text" href="empresa.php">Empresa</a><i class="material-icons left">home</i></li>                                                     
                       </ul>
                   </div>
                    </footer>
                    ' . $scripts . '
                </body>
            </html>
        ');
    }

    /*
    *   Método para imprimir las cajas de dialogo (modals) de editar pefil y cambiar contraseña.
    */
    private static function modals()
    {
        // Se imprime el código HTML de las cajas de dialogo (modals).
        print('
            <!-- Componente Modal para mostrar el formulario de editar perfil -->
            <div id="profile-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Editar perfil</h4>
                    <form method="post" id="profile-form">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="nombres_perfil" type="text" name="nombres_perfil" class="validate" required/>
                                <label for="nombres_perfil">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person</i>
                                <input id="apellidos_perfil" type="text" name="apellidos_perfil" class="validate" required/>
                                <label for="apellidos_perfil">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input id="correo_perfil" type="email" name="correo_perfil" class="validate" required/>
                                <label for="correo_perfil">Correo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input id="alias_perfil" type="text" name="alias_perfil" class="validate" required/>
                                <label for="alias_perfil">Alias</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Componente Modal para mostrar el formulario de cambiar contraseña -->
            <div id="password-modal" class="modal">
                <div class="modal-content">
                    <h4 class="center-align">Cambiar contraseña</h4>
                    <form method="post" id="password-form">
                    <div class="center-align">
                        <a href="" class="brand-logo"><img src="https://www.uap.edu.pe/wp-content/uploads/2020/04/change-pass.png" height="220"></a>                       
                    </div>
                        <div class="row">                      
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_actual" type="password" name="clave_actual" class="validate" required/>
                                <label for="clave_actual">Clave actual</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <label>CLAVE NUEVA</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate" required/>
                                <label for="clave_nueva_1">Clave</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate" required/>
                                <label for="clave_nueva_2">Confirmar clave</label>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                        </div>
                    </form>
                </div>
            </div>
        ');
    }
}