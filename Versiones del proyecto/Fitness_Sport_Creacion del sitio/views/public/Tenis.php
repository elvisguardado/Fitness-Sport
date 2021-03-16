<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Public_Page::headerTemplate('Bienvenido');
?>

<!--Primera card-->  
<div class="row">
  <div class="col s4 m4">
    <div class="card">
      <div class="card-image">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAYcnVqwl_ttiXrSN1d0442O6rVFMsJQdDJw&usqp=CAU">
        <span class="card-title">Raqueta de tenis</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Pelota empleda para el juego de tenis acompañada de una raqueta. Pelota de tenis. Utilizada para la realización del deporte tenis</p>
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
        <p>Pelota de tenis para jugar tenis.</p>
      </div>
    </div>
  </div>
  <!--Tercera card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="http://www.aihuasport.com/wp-content/uploads/2020/05/malla-tenis.jpg">
        <span class="card-title">Red de tenis</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal3"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Red de tenis.</p>
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
      <h4>Pelota de Tenis</h4>
      <p>Perfecta para poner en practicas tus tiros.</p>
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
      <h4>Red de Tenis</h4>
      <p>Red deportiva para tenis</p>
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