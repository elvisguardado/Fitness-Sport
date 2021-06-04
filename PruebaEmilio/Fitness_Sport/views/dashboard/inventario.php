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
                            <h5>Administracion de Inventario</h5>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                          <!-- Formulario de búsqueda -->
                           <form method="post" id="search-form">
                            <div class="input-field col s6 m8">
                                <i class="material-icons prefix">search</i>
                                    <input id="search" type="text" placeholder = "Nombre Usuario o Nombre Producto" name="search" required />
                                    <label for="search">Buscador</label>
                            </div>
                            <div class="input-field col s6 m4">
                                <button type="submit" class="btn waves-effect deep-purple accent-1 tooltipped" data-tooltip="Buscar"><i
                                     class="material-icons">check_circle</i></button>
                        </div>
                         </form>
                         </div>

                         <div class="card-tabs">
                          <ul class="tabs tabs-fixed-width">
                            <li class="tab"><a href="#tabla1">Registro Inventario</a></li>
                          </ul>
                         </div>
                        
                         <!-- Estructura de la tabla -->
                         <table class="highlight responsive-table centered">
                            <thead>
                                <tr>
                                    <th>Fecha Ingreso</th>
                                    <th>Cantidad Producto</th>
                                    <th>Producto</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-rows">
                            </tbody>
                         </table>
                         <br>
                         <br>
                         <br>
                    </div>
                </div>
            </div>
     
    </div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
admin_page::footerTemplate('inventario.js');
?>