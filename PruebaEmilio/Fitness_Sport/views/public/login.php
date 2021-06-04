<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/public/public_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
public_Page::headerTemplate('');
?>

<div class="section container">
    <div class="row">
        <div class="row card-panel">
            <div class="container">
                <div class="row">
                    <form method="post" id="session-form">
                        <div class="card-content">
                            <a class="responsive-img" class="brand-logo"><img class="responsive-img"
                                    src="../../resources/img/7.png" width="520" alt="600"></a>
                        </div>
                        <div class="input-field col s12 m6 offset-m3">
                            <i class="material-icons prefix">email</i>
                            <input type="email" id="usuario" name="usuario" class="validate" required />
                            <label for="usuario">Correo electrónico</label>
                        </div>
                        <div class="input-field col s12 m6 offset-m3">
                            <i class="material-icons prefix">security</i>
                            <input type="password" id="clave" name="clave" class="validate" required />
                            <label for="clave">Clave</label>
                        </div>
                        <div class="col s12 center-align">
                            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i
                                    class="material-icons">send</i></button>
                            <a href="signin.php" type="submit" class="btn waves-effect indigo tooltipped"
                                data-tooltip="Registrarse"><i class="material-icons">person</i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
public_Page::footerTemplate('login.js');
?>