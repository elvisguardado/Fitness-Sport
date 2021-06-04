<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/public/public_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Productos por categría');
?>
<!-- Formulario de búsqueda -->
<br>
        <br>
        <div class="row">
          <!-- Formulario de búsqueda -->
          <form method="post" id="search-form">
            <div class="input-field col s6 m4">
              <i class="material-icons prefix">search</i>
              <input id="search" type="text" placeholder = "Nombre Producto" name="search" required />
              <label for="search">Buscador</label>
            </div>
            <div class="input-field col s6 m4">
              <button type="submit" class="btn waves-effect deep-purple accent-1 tooltipped" data-tooltip="Buscar"><i
                  class="material-icons">check_circle</i></button>
            </div>
          </form>
        </div>
<!-- Contenedor para mostrar los producto de la categoría seleccionada previamente -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center indigo-text" id="title"></h4>
    <!-- Fila para mostrar los productos disponibles por categoría -->
    <div class="row" id="productos"></div>
</div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('futbol.js');
?>