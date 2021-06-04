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
            <h5>Recomendaciones Clientes</h5>
          </div>
          <br>
          <br>
          <div class="row">
            <!-- Formulario de búsqueda -->
            <form method="post" id="search-form">
              <div class="input-field col s6 m8">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" placeholder = "Recomendaciones o nombre Cliente" name="search" required />
                <label for="search">Buscador</label>
              </div>
              <div class="input-field col s6 m4">
                <button type="submit" class="btn waves-effect deep-purple accent-1 tooltipped" data-tooltip="Buscar"><i
                    class="material-icons">check_circle</i></button>
              </div>
            </form>
          </div>
        </div>

        <div class="card-tabs">
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a href="#tabla1">Recomendaciones Clientes</a></li>
          </ul>
        </div>

        <table id="tabla1" class="highlight responsive-table centered">
          <thead>
            <tr>
              
              <th>Cliente</th>
              <th>Comentario</th>
              <th>Fecha de comentario</th>                              
              <th>Estado</th>
              <th class="actions-column">Acción</th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
          </tbody>
        </table> 
        
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
              <div class="input-field col s12 m12">
                <i class="material-icons prefix">chat_bubble_outline</i>
                <input type="text" placeholder="Ingrese su Comentario" name="recomendaciones" class="validate"
                  id="recomendaciones">
                <label for="recomendaciones">Comentario</label>
              </div>
              <div class="switch">
                <span>Estado:</span>
                <label>
                  <i class="material-icons">visibility_off</i>
                  <input id="estado" type="checkbox" name="estado" checked />
                  <span class="lever"></span>
                  <i class="material-icons">visibility</i>
                </label>
              </div>

              <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
                    class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
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
admin_page::footerTemplate('consultas_clientes.js');
?>