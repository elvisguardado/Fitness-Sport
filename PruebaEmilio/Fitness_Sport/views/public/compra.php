<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/public_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Public_Page::headerTemplate('Bienvenido');
?>

<!-- Estructura de formulario dentro de una card, y asi mismo con una imagen que se mostrara a la izquierda del mismo -->
<div class="section container">
  <div class="row">
    <form class="col12">
      <div class="row card-panel">

            <div class="image">
              <img class="left materialboxed responsive-img" width="600" height="600"
                src="https://www.futbolemotion.com/imagesarticulos/122314/grandes/balon-nike-strike-2018-2019-pure-platinum-wolf-grey-white-0.jpg">
            </div>

            <!-- Estructura del formulario, cada div clas imput es una entrada de registro -->
            <div class="input-field col s12 m6">
              <i class="material-icons prefix">face</i>
              <input placeholder="Escriba su nombre" id="first_name" type="text" class="validate">
              <label for="first_name">Nombre</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix">perm_contact_calendar</i>
              <input placeholder="Escriba su Apellido" id="last_name" type="text" class="validate">
              <label for="last_name">Apellido</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix">location_on</i>
              <input placeholder="Escrina su punto de referencia" id="Punto Referencia" type="text" class="validate">
              <label for="Phone_number">Punto referencia</label>
            </div>

            <div class="input-field col s12 m6">
              <i class="material-icons prefix">hotel</i>
              <input placeholder="Direccion de su casa." id="Direccion" type="text" class="validate">
              <label for="Direccion">Direccion de la casa.</label>
            </div>

            <div class="input-field col s12 m6">
              <form action="#">
                <p class="range-field">
                  <input type="range" id="test5" min="1" max="100" />
                  <label for="CantidadProducto">Cantidad Producto.</label>
                </p>
              </form>
            </div>

            <div class="input-field col s12 m6">
              <input disabled value="Total a pagar: $20.0" id="disabled" type="text" class="validate">
              <label for="disabled">Precio</label>
            </div>

            <div class="row center-align">
              <a href="#" onclick="openCreateDialog()" class="btn-large waves-effect teal lighten-1 tooltipped"
                data-tooltip="Crear"><i class="material-icons left">check</i>Finalizar Compra</a>
            </div>

            <div class="card-tabs">
          <ul class="tabs tabs-fixed-width">
            <li class="tab"><a href="#tabla1">COMENTARIOS</a></li>
          </ul>
        </div>

        <table id="tabla1" class="highlight responsive-table centered">
          <thead>
            <tr>             
              <th>Cliente</th>
              <th>Comentario</th>                          
              <th>Fecha</th>
              <th>Producto</th>
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

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Public_Page::footerTemplate('compra.js');
?>