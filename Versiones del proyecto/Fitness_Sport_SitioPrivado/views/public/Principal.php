<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Public_Page::headerTemplate('Bienvenido');
?>

<!--Principal Slider-->
<div class="slider">
   <ul class="slides">
     <li>
       <img src="https://4.bp.blogspot.com/-Qk_elX1otiA/TtO5Q-_nSII/AAAAAAAAHFg/gjBwzjqfBNI/s1600/las_canilleras_que_utiliza_cristiano_ronaldo.jpg"> 
       <div class="caption center-align">
         <h3>Canilleras deportivas</h3>
         <h5 class="light grey-text text-lighten-3">Nuestras canilleras son las mejores.</h5>
       </div>
     </li>
     <li>
       <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/xiaomi-1592379932.jpg?crop=1.00xw:1.00xh;0,0&resize=640:*"> 
       <div class="caption left-align">
          <h3>pesa de 5kg</h3>
          <h5 class="light grey-text text-lighten-3">Nuestros pesos siempre confiables.</h5>
       </div>
   </li>
    <li>
      <img src="https://cdn.shopify.com/s/files/1/0760/5931/products/render_pelotabasket_sorpresa_800x.png?v=1584989067 "> 
      <div class="caption right-align">
        <h3>Pelota basquetbol</h3>
        <h5 class="light grey-text text-lighten-3">Las mejores pelotas de basquetbol con nosotros.</h5>
      </div>
    </li>
    <li>
      <img src="https://s.fenicio.app/f/menpuy/catalogo/articulos/SC3604309-0-1_1920-1200_1578160987_65f.jpg"> 
      <div class="caption center-align">
        <h3>Pelota de futbol</h3>
        <h5 class="light grey-text text-lighten-3">Las mejores pelotas de futbol con nosotros.</h5>
      </div>
    </li>
  </ul>
</div>
<!--Primera card-->  
<div class="row">
  <div class="col s4 m4">
    <div class="card">
      <div class="card-image">
        <img src="https://contents.mediadecathlon.com/p1617262/k$36fcfc1a635c3382f861b09f7ad0e108/raqueta-de-tenis-adulto-artengo-tr560-lite-negro.jpg?format=auto&f=800x800">
        <span class="card-title">Raqueta de tenis</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Raqueta de tenis para el deporte de tenis.</p>
      </div>
    </div>
  </div>
  <!--Segunda card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Closeup_of_a_tennis_ball_%282%29.jpg">
        <span class="card-title">Pelota de tenis</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Pelota de tenis para el deporte de tenis.</p>
      </div>
    </div>
  </div>
  <!--Tercera card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://natacioncs.com/blog/wp-content/uploads/2016/03/como-escoger-gafas-natacion.jpg">
        <span class="card-title">Lentes de natación</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal3"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Perfectos para nadar.</p>
      </div>
    </div>
  </div>
  <!--Cuarta card--> 
    <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="https://i1.wp.com/noticieros.televisa.com/wp-content/uploads/2018/03/adolescente-16-mata-bate-beisbol-amigo.jpg?fit=960%2C540&ssl=1">
          <span class="card-title">Bate de beisbol</span>
          <a class="waves-effect waves-light btn modal-trigger" href="#modal4"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <p>Con los bates nuestros nunca perderas un partido.</p>
        </div>
      </div>
    </div>
  </div> <!--Este es el final de la primer card-->

  <!-- Estructura del modal 1 -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Raqueta de tenis</h4>
      <p>Es un instrumento que se utiliza en el tenis para golpear la pelota. Raqueta de tenis. Es un instrumento que se utiliza en dicho deporte para golpear a la pelota de tenis se componen de un mango que sujeta unas cuerdas tensadas y cruzadas en forma de red o caucho que lo cubre.</p>
      <p>Precio: 15.99$</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Comprar</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>
  <!-- Estructura del modal 2 -->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Pelota de tenis</h4>
      <p>Pelota empleda para el juego de tenis acompañada de una raqueta. Pelota de tenis. Utilizada para la realización del deporte tenis.</p>
      <p>Precio: 15.99$</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Comprar</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>
  <!-- Estructura del modal 3 -->
  <div id="modal3" class="modal">
    <div class="modal-content">
      <h4>Lentes de natación</h4>
      <p>Gafas Racing de natación de estilo sport con cinta regulable, protección UVA, protección antivaho, y libres de látex.</p>
      <p>Precio: 15.99$</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Comprar</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>
  <!-- Estructura del modal 4 -->
  <div id="modal4" class="modal">
    <div class="modal-content">
      <h4>Bate de beisbol</h4>
      <p>Descubre el mejor Bates de Béisbol en Los más vendidos. Encuentra los 100 artículos más populares.</p>
      <p>Precio: 15.99$</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Comprar</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
  </div>
  

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Public_Page::footerTemplate('index.js');
?>
