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
            <h5>Pedidos</h5>
          </div>
          <br>
        </div>
        <div class="row">
          <!-- Formulario de búsqueda -->
          <form method="post" id="search-form">
            <div class="input-field col s6 m8">
              <i class="material-icons prefix">search</i>
              <input id="search" type="text" placeholder = "Nombre Cliente o Dirección de envio" name="search" required />
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
            <li class="tab"><a href="#tabla1">Registro Pedidos</a></li>
          </ul>
        </div>

        <table id="tabla1" class="highlight responsive-table centered">
          <thead>
            <tr>
              <th>Dirección envio</th>
              <th>Impuestos</th>
              <th>Total</th>
              <th>Precio de envio</th>
              <th>Nombre cliente</th>
              <th>Estado de Entrega</th>          
              <th class="actions-column">Acción</th>
              <th>Ver Detalle Compra</th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
            <!--Poner el id del tbody -->
          </tbody>
        </table>
      </div>
    </div>

    <!-- Modal Structure 3-->
    <div id="save-modal" class="modal">
      <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <!-- Formulario para crear o actualizar un registro -->
        <form method="post" id="save-form" enctype="multipart/form-data">
          <input class="hide" type="number" id="id_compra" name="id_compra" />
          <div class="row">
                <div class="input-field col s12 m6">
                  <select id="estado" name="estado">
                  </select>
                  <label>Estado</label>
                </div>   
            <div class="row center-align">
              <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
                  class="material-icons">cancel</i></a>
              <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i
                  class="material-icons">save</i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
admin_page::footerTemplate('detalle_pedidos.js');
?>