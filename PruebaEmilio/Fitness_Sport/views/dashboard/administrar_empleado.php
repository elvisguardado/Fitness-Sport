<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/admin_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
admin_page::headerTemplate('');
?>

<!-- Estructura formulario que esta dentro de una card para que se mire mejor -->
<br>
<div class="section container">
    <div class="row">
        <div class="row card-panel">
            <div class="card">
                <div class="card-content">
                    <!-- Es Un mensaje centralizado para mostrar en la seccion en la que se encuentra -->
                    <div class="center-align">
                        <h5>Administracion de Empleados</h5>
                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <!-- Formulario de búsqueda -->
                        <form method="post" id="search-form">
                            <div class="input-field col s6 m4">
                                <i class="material-icons prefix">search</i>
                                <input id="search" type="text" placeholder = "Nombre Empleado o Usuario" name="search" required />
                                <label for="search">Buscador</label>
                            </div>
                            <div class="input-field col s6 m4">
                                <button type="submit" class="btn waves-effect deep-purple accent-1 tooltipped" data-tooltip="Buscar"><i class="material-icons">check_circle</i></button>
                            </div>
                        </form>
                        <div class="input-field center-align col s12 m4">
                            <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
                            <a href="#" onclick="openCreateDialog()" class="btn waves-effect teal lighten-1 tooltipped" data-tooltip="Crear"><i class="material-icons">add_circle</i></a>
                            <!-- Enlace para generar un reporte en formato PDF -->
                        </div>
                    </div>

                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a href="#tabla1">Registro Clientes</a></li>
                        </ul>
                    </div>

                    <!-- Estructura de la tabla -->
                    <table id="tabla1" class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <!-- Parte superior de la tabla indicando que tipo de datos se ingresaran -->
                                <th>Nombre Empleado</th>
                                <th>Apellido Empleado</th>
                                <th>Correo Empleado</th>
                                <th>Usuario</th>
                                <th class="actions-column">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-rows">
                        </tbody>
                    </table>
                </div>

                <!-- Modal Structure Para los 2 botones-->
                <div id="save-modal" class="modal">
                    <div class="modal-content">
                        <!-- Título para la caja de dialogo -->
                        <h4 id="modal-title" class="center-align"></h4>
                        <!-- Formulario para crear o actualizar un registro -->
                        <form method="post" id="save-form" enctype="multipart/form-data">
                            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                            <input class="hide" type="number" id="id_usuario" name="id_usuario" />
                            <!-- Estructura del formulario, cada div clas imput es una entrada de registro -->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">face</i>
                                <input type="text" placeholder="Ingrese su Nombre" name="nombre_admin_empl" class="validate" id="nombre_admin_empl">
                                <label for="nombre_admin_empl">Nombre</label>
                            </div>
                            <!-- Estructura del formulario, cada div clas imput es una entrada de registro -->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">perm_contact_calendar</i>
                                <input type="text" placeholder="Ingrese su apellido" name="apellido_admin_empl" class="validate" id="apellido_admin_empl">
                                <label for="apellido_admin_empl">Apellido</label>
                            </div>
                            <!-- Estructura del formulario, cada div clas imput es una entrada de registro -->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input type="text" placeholder="Ingrese su correo" name="correo_admin_empl" class="validate" id="correo_admin_empl">
                                <label for="correo_admin_empl">Correo</label>
                            </div>
                            <!-- Estructura del formulario, cada div clas imput es una entrada de registro -->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">person_pin</i>
                                <input type="text" placeholder="Ingrese su correo" name="usuario_admin_empl" class="validate" id="usuario_admin_empl">
                                <label for="usuario_admin_empl">Usuario</label>
                            </div>
                            <!-- Estructura del formulario, cada div clas imput es una entrada de registro -->
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input type="password" placeholder="Ingrese su clave" name="clave_admin_empl" class="validate" id="clave_admin_empl">
                                <label for="clave_admin_empl">Clave</label>
                            </div>
                            <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
admin_page::footerTemplate('empleados.js');
?>