<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public/public_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
public_Page::headerTemplate('Bienvenido');
?>

<!-- Componente Slider con indicadores, altura de 400px y una duración entre transiciones de 6 segundos -->
<div class="slider" id="slider">
  <ul class="slides">
    <li>
      <img src="http://www.lacuadrauniversitaria.com/uploads/2/0/9/1/20917732/sports-recovery-slider_orig.jpg">
      <div class="caption center-align">
        <h3>Lentes para natación</h3>
        <h5 class="light grey-text text-lighten-3">Contamos con los mejores accesorios para natación.</h5>
      </div>
    </li>
    <li>
      <img
        src="https://cf.ltkcdn.net/ejercicio/images/orig/255680-1600x1030-rutinas-levantamiento-pesas-imprimibles.jpg">
      <div class="caption center-align">
        <h3>Pesas</h3>
        <h5 class="light grey-text text-lighten-3">Contamos con pesas de 5kg para esas rutinas de ejercicio.</h5>
      </div>
    </li>
    <li>
      <img src="https://www.gigantes.com/wp-content/uploads/2020/03/xxxxx.jpg">
      <div class="caption center-align">
        <h3>Pelota basquetbol</h3>
        <h5 class="light grey-text text-lighten-3">Las mejores pelotas de basquetbol con nosotros.</h5>
      </div>
    </li>
  </ul>
</div>

<!-- Contenedor para mostrar el catálogo de tipos de producto -->
<div class="container">
  <!-- Título del contenido principal -->
  <h4 class="center indigo-text" id="title">Nuestras Marcas de Productos</h4>
  <!-- Fila para mostrar las categorías disponibles -->
  <div class="row" id="marquita"></div>
</div>


<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
public_Page::footerTemplate('index.js');
?>