<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/admin_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
admin_page::headerTemplate('');
?>

<br>
<div class="section container">
    <div class="row">
        <div class="row card-panel">
            <div class="card-content">
                <div class="center-align">
                    <h5>Marcas de productos</h5>
                </div>
                <br>
                <br>
                <div class="row">
                    <!-- Formulario de búsqueda -->
                    <form method="post" id="search-form">
                        <div class="input-field col s6 m4">
                            <i class="material-icons prefix">search</i>
                            <input id="search" type="text" placeholder = "Nombre Marca" name="search" required />
                            <label for="search">Buscador</label>
                        </div>
                        <div class="input-field col s6 m4">
                            <button type="submit" class="btn waves-effect deep-purple accent-1 tooltipped" data-tooltip="Buscar"><i
                                    class="material-icons">check_circle</i></button>
                        </div>
                    </form>
                    <div class="input-field center-align col s12 m4">
                        <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
                        <a href="#" onclick="openCreateDialog()" class="btn waves-effect teal lighten-1 tooltipped"
                            data-tooltip="Crear"><i class="material-icons">add_circle</i></a>
                    </div>
                </div>

                <!-- Tabla para mostrar los registros existentes -->
                <table class="highlight responsive-table centered">
                    <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
                    <thead>
                        <tr>
                            <th>Imagen de Marca</th>
                            <th>Nombre de Marca</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla para mostrar un registro por fila -->
                    <tbody id="tbody-rows">
                    </tbody>
                </table>

                <!-- Componente Modal para mostrar una caja de dialogo -->
                <div id="save-modal" class="modal">
                    <div class="modal-content">
                        <!-- Título para la caja de dialogo -->
                        <h4 id="modal-title" class="center-align"></h4>
                        <!-- Formulario para crear o actualizar un registro -->
                        <form method="post" id="save-form" enctype="multipart/form-data">
                            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
                            <input class="hide" type="number" id="id_marca" name="id_marca" />
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">note_add</i>
                                    <input id="nombre_marca" type="text" name="nombre_marca" class="validate"
                                        required />
                                    <label for="nombre_marca">Nombre</label>
                                </div>
                                <div class="file-field input-field col s12 m6">
                                    <div class="btn waves-effect tooltipped"
                                        data-tooltip="Seleccione una imagen de al menos 500x500">
                                        <span><i class="material-icons">image</i></span>
                                        <input id="archivo_marca" type="file" name="archivo_marca"
                                            accept=".gif, .jpg, .png" />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text"
                                            placeholder="Formatos aceptados: gif, jpg y png" />
                                    </div>
                                </div>
                            </div>
                            <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close"
                                    data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i
                                        class="material-icons">save</i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
admin_page::footerTemplate('marca.js');
?>