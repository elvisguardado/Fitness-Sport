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
            <h5>Detalle Compra</h5>
          </div>
          <br>
        </div>
        <div class="row">
          <!-- Formulario de búsqueda -->
          <form method="post" id="search-form">
            <div class="input-field col s6 m8">
              <i class="material-icons prefix">search</i>
              <input id="search" type="text" placeholder = "Nombre producto o Dirección envio" name="search" required />
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
            <li class="tab"><a href="#tabla1">Registro Compra</a></li>
          </ul>
        </div>
        <table id="tabla1" class="highlight responsive-table centered">
          <thead>
            <tr>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Nombre producto</th>
              <th>Direccion de envio</th>
            </tr>
          </thead>
          <tbody id="tbody-rows">
            <!--Poner el id del tbody -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
admin_page::footerTemplate('detalle_compra.js');
?>