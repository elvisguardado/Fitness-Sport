<?php
//Se incluye la clase con las plantillas del documento
include('../../app/helpers/public_page_index.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Public_Page::headerTemplate('Bienvenido');
?>


<!--Caja con los botones del login-->
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
     <div class = "left form-box">
     <div class = "button-box">
       <div id="btn"></div>
       <button type="button" class="toggle-btn" onclick="login()">Ingresar</button>
       <button type="button" class="toggle-btn" onclick="register()">Registrar
       </button>
     </div>
      <!--Lo que va adentro del login-->
     <form id = "login" class="input-group">
      <input type="text" class="input-field" placeholder="Ingresar Usuario" required>
      <input type="text" class="input-field" placeholder="Ingresar contraseña" required>
      <input type="checkbox" class="chech-box"><span>Quieres recordar tu contraseña</span>
      <br>
      <a class="waves-effect waves-light btn-small">Ingresar</a>
      <br>
      <a href="Principal.php" style="background: content-box;" type="submit" class="sumbit-btn">Ingresar como invitado</a>
    </form>
     <!--Lo que va adentro del registrarse--> 
    <form id = "register" class="input-group">
      <input type="text" class="input-field" placeholder="Ingresar Usuario" required>
      <input type="email" class="input-field" placeholder="Ingresar el correo" required>
      <input type="text" class="input-field" placeholder="Ingresar contraseña" required>
      <input type="checkbox" class="chech-box"><span>Aceptas terminos y condiciones</span>
      <br>
      <a class="waves-effect waves-light btn-small">Crear cuenta</a>
      
    </form>
     </div>  
     <!--TEXTO-->
     <div class="text">
       <br>
       <br>
       <br>
       <br>
       <p>Quienes somos</p>
        <br>
       <p>Somos una pagina web que ofrece accesorios deportivos que son enviados en menos de 24 horas a tu casa</p>
    </div>

    </div>
    </div>
  </div>
  <script>
   var x = document.getElementById("login");
   var y = document.getElementById("register");
   var z = document.getElementById("btn");

   function register(){
     x.style.left = "-400px";
     y.style.left = "50px";
     z.style.left = "110px";
   }
   function login(){
     x.style.left = "50px";
     y.style.left = "450px";
     z.style.left = "0px";
   }
 </script> 


<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Public_Page::footerTemplate('index.js');
?>



