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
        <img src="https://www.mundosilbato.es/media/wysiwyg/blog5/balon-baloncesto-oficial.jpg">
        <span class="card-title">Pelota de Basquetbol</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Perfecta para jugar Basquetbol con tus amigos.</p>
      </div>
    </div>
  </div>
  <!--Segunda card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://imagenes.20minutos.es/files/image_656_370/uploads/imagenes/2020/05/11/canasta-para-jugar-en-casa.jpeg">
        <span class="card-title">Canasta</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Para practicar en tu casa.</p>
      </div>
    </div>
  </div>
  <!--Tercera card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://m.media-amazon.com/images/I/712rAsz4sAL._AC._SR360,460.jpg">
        <span class="card-title">Red de Canasta</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal3"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Para tu canasta de casa.</p>
      </div>
    </div>
  </div>
  </div> <!--Este es el final de la primer card-->

  <!-- Estructura del modal 1 -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Pelota de Basquetbol</h4>
      <p>El balón de basquetbol utilizado en competiciones oficiales es regulado en sus medidas.</p>
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
      <h4>Canasta de Basquetbol</h4>
      <p>Perfecta para poner en la pared de tu casa, facil para entrenar.</p>
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
      <h4>Red de Basquetbol</h4>
      <p>Red deportiva para la canasta de Basquetbol</p>
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