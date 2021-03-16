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
        <img src="https://natacioncs.com/blog/wp-content/uploads/2016/03/como-escoger-gafas-natacion.jpg">
        <span class="card-title">Lentes de natación</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Lentes de natación perfectos para nadar en cualquier lugar.</p>
      </div>
    </div>
  </div>
  <!--Segunda card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://okdiario.com/img/2019/08/13/como-hacer-unos-tapones-para-los-oidos-655x368.jpg">
        <span class="card-title">Tapones para oidos</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Perfecto para que no te entre el agua.</p>
      </div>
    </div>
  </div>
  <!--Tercera card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://www.cr4.cat/tmp/images/HTTP___WWW.GRUPODESCOM.ES_IMATGES_DE513901_W_800_Q_100.PNG">
        <span class="card-title">Gorro de natación</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal3"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Para cubrirte el pelo y no se te moje.</p>
      </div>
    </div>
  </div>
  </div> <!--Este es el final de la primer card-->

  <!-- Estructura del modal 1 -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Lentes de natación</h4>
      <p>Sirve para cubrirse los ojos y poder ver bajo el agua.</p>
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
      <h4>Tapones para los oidos</h4>
      <p>Perfecto para que no te entre agua en los oidos.</p>
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
      <h4>Gorro de natacion</h4>
      <p>Perfecto para no mojarte el pelo</p>
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