<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/dashboard/admin_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
admin_page::headerTemplate('');
?>

<!-- Estructura formulario que esta dentro de una card para que se mire mejor -->

<div class="section container">
    <div class="row">
        
            <div class="row card-panel">

                <div class="card">
                    <div class="card-content">

                        <div class="center-align">
                            <h5>Registro de clientes</h5>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                        <!-- Formulario de búsqueda -->
                            <form method="post" id="search-form">
                                <div class="input-field col s6 m4">
                                <i class="material-icons prefix">search</i>
                                <input id="search" type="text" placeholder = "Apellido o Nombre Cliente" name="search" required />
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
                    </div>

                    <div class="card-tabs">
                        <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a href="#tabla1">Registro Clientes</a></li>
                        </ul>
                    </div>

                    <table id="tabla1" class="highlight responsive-table centered">
                        <thead>
                            <tr>
                                <th>Nombre Cliente</th>
                                <th>Apellido Cliente</th>
                                <th>Correo</th>
                                <th>Dui</th>                               
                                <th>Telefono</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Direccion</th>
                                <th>Estado</th>
                                <th class="actions-column">Acción</th>
                                <th>Ver Pedido</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-rows">
                        </tbody>
                    </table>

                    <!-- Modal Structure 1-->
                    <div id="save-modal" class="modal">
                      <div class="modal-content">
                        <h4 id="modal-title" class="center-align"></h4>
                        <form method="post" id="save-form" enctype="multipart/form-data">
                         <input class="hide" type="number" id="id_cliente" name="id_cliente" />
                          <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_box</i>
                                <input type="text" id="nombres_cliente" name="nombres_cliente"  class="validate" required/>
                                <label for="nombres_cliente">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">account_box</i>
                                <input type="text" id="apellidos_cliente" name="apellidos_cliente"  class="validate" required/>
                                <label for="apellidos_cliente">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">email</i>
                                <input type="email" id="correo_cliente" name="correo_cliente" maxlength="100" class="validate" required/>
                                <label for="correo_cliente">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">how_to_reg</i>
                                <input type="text" id="dui_cliente" name="dui_cliente" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate" required/>
                                <label for="dui_cliente">DUI</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">phone</i>
                                <input type="text" id="telefono_cliente" name="telefono_cliente" placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" class="validate" required/>
                                <label for="telefono_cliente">Teléfono</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">cake</i>
                                <input type="date" id="nacimiento_cliente" name="nacimiento_cliente" class="validate" required/>
                                <label for="nacimiento_cliente">Nacimiento</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">security</i>
                                <input type="password" id="clave_cliente" name="clave_cliente" class="validate"/>
                                <label for="clave_cliente">Clave</label>
                            </div>
                            <div class="input-field col s12">
                                <i class="material-icons prefix">place</i>
                                <input type="text" id="direccion_cliente" name="direccion_cliente" maxlength="200" class="validate" required/>
                                <label for="direccion_cliente">Dirección</label>
                            </div>
                            <div class="col s12 m6">
                            <p>
                            <div class="switch">  
                                <span>Estado:</span>
                                <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="estado" type="checkbox" name="estado" checked />
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                                </label>
                            </div>
                            </p>
                            </div> 
                                <div class="row center-align">
                                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
                                </div> 
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
admin_page::footerTemplate('registro_clientes.js');
?>