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
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/07/%D0%A4%D0%9A_%22%D0%9A%D0%BE%D0%BB%D0%BE%D1%81%22_%28%D0%97%D0%B0%D1%87%D0%B5%D0%BF%D0%B8%D0%BB%D0%BE%D0%B2%D0%BA%D0%B0%2C_%D0%A5%D0%B0%D1%80%D1%8C%D0%BA%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F_%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C%29_-_%D0%A4%D0%9A_%22%D0%91%D0%B0%D0%BB%D0%BA%D0%B0%D0%BD%D1%8B%22_%28%D0%97%D0%B0%D1%80%D1%8F%2C_%D0%9E%D0%B4%D0%B5%D1%81%D1%81%D0%BA%D0%B0%D1%8F_%D0%BE%D0%B1%D0%BB%D0%B0%D1%81%D1%82%D1%8C%29_%2818790931100%29.jpg/1200px-thumbnail.jpg">
        <span class="card-title">Pelota de Futbol</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Perfecta para jugar futbol con tus amigos.</p>
      </div>
    </div>
  </div>
  <!--Segunda card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://i.pinimg.com/originals/89/dd/6a/89dd6a618ffce2b4e43f4b30e01748f7.jpg">
        <span class="card-title">Guantes</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal2"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Para los porteros mas experimentados.</p>
      </div>
    </div>
  </div>
  <!--Tercera card-->
  <div class="col s4 m4 ">
    <div class="card">
      <div class="card-image">
        <img src="https://img.milanuncios.com/fg/2939/29/293929870_3.jpg?VersionId=YEr5.QDBNt.oUPVpANdE65rWK_.n.wQ4">
        <span class="card-title">Rodilleras</span>
        <a class="waves-effect waves-light btn modal-trigger" href="#modal3"><i class="material-icons">add</i></a>
      </div>
      <div class="card-content">
        <p>Perfectas para las barridas.</p>
      </div>
    </div>
  </div>
  <!--Cuarta card--> 
    <div class="col s4 m4">
      <div class="card">
        <div class="card-image">
          <img src="https://cicadex.com/wp-content/uploads/2018/11/317-2545-1-1.jpg">
          <span class="card-title">Red de Porteria</span>
          <a class="waves-effect waves-light btn modal-trigger" href="#modal4"><i class="material-icons">add</i></a>
        </div>
        <div class="card-content">
          <p>Red para la porteria.</p>
        </div>
      </div>
    </div>
  </div> <!--Este es el final de la primer card-->

  <!-- Estructura del modal 1 -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Pelota de futbol</h4>
      <p>El balón de fútbol utilizado en competiciones oficiales es regulado en sus medidas por la FIFA. Tiene forma de icosaedro truncado en un 99.9%, una circunferencia entre 68 y 70 centímetros y un peso entre 410 y 450 gramos.</p>
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
      <h4>Guantes</h4>
      <p>Todos los guantes de portero de las mejores marcas como SP, adidas, nike, Reusch, Uhlsport en la tienda para porteros mas grande del mundo</p>
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
      <h4>Rodilleras</h4>
      <p>Todos los guantes de portero de las mejores marcas como SP, adidas, nike, Reusch, Uhlsport en la tienda para porteros mas grande del mundo</p>
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
      <h4>Red de la porteria</h4>
      <p>Nuestras redes para porterías de fútbol cumplen con todos los requisitos de la norma UNE-EN 748</p>
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