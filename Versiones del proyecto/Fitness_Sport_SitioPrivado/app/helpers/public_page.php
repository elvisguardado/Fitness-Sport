<?php
//Clase para definir las plantillas de las páginas web del sitio público
class Public_Page {
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        print('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <!--Se establece la codificación de caracteres para el documento-->
                <meta charset="utf-8">
                <!--Se importa la fuente de iconos de Google-->
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <!--Se importan los archivos CSS-->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
                <link type="text/css" rel="stylesheet" href="../../resources/css/public_styles.css" />
                <!--Se informa al navegador que el sitio web está optimizado para dispositivos móviles-->
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <!--Título del documento-->
                <title>Fitness Sport - '.$title.'</title>
            </head>
            
            <body>
                <!--Encabezado del documento-->
                <header>
                    <!--Barra de navegación fija-->
                    <nav class="light-green lighten-1" role="navigation">
                <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo"></a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="Principal.php">Principal</a></li>
                        <li><a href="Basquetbol.php">Futbol</a></li>
                        <li><a href="Basquetbol.php">Basquetbol</a></li>
                        <li><a href="Tenis.php">Tenis</a></li>
                        <li><a href="Natacion.php">Natación</a></li>
                        <li><a href="Beisbol.php">Béisbol</a></li>
                        <li><a href="Accesorios.php">Accesorios</a></li>
                        <li><a class="waves-effect waves-light btn modal-trigger" href="#modal6">Carrito</a></li>
                    </ul>
                    </div>
                </nav>
                    <!--Navegación lateral para dispositivos móviles-->
                    <ul class="sidenav" id="mobile-sidenav">
                        <li><a href="https://materializecss.com/cards.html">Cards</a></li>
                        <li><a href="https://materializecss.com/icons.html">Icons</a></li>
                    </ul>
                </header>
                <!--Contenido principal del documento-->
                <main>
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
                </main>
                <!--Pie del documento-->
                <footer class="page-footer light-green">
                    <div class="container">
                        <div class="row">
                            <div class="col l6 s12">
                                <h5 class="white-text">Derechos de autor reservados para la compañia</h5>
                                <p class="grey-text text-lighten-4">Somos una pagina de venta de accesorios deportivos.</p>
                            </div>
                            <div class="col l4 offset-l2 s12">
                                <h5 class="white-text">Nuestras redes sociales</h5>
                                <ul>
                                    <li><a class="white-text" href="http://facebook.com">Facebook</a></li>
                                    <li><a class="white-text" href="http://Instagram.com">Instagram</a></li>
                                    <li><a class="white-text" href="http://twitter.com">Twitter</a></li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            © 2014 Copyright Text
                        </div>
                    </div>
                </footer>
                <!--Importación de archivos JavaScript al final del cuerpo para una carga optimizada-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script src="../../app/controllers/public/'.$controller.'"></script>
                <div id="modal6" class="modal">
                    <div class="modal-content">
                    <h4>Carrito</h4>
                    <p>Productos</p>
                    </div>
                    <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                    </div>
                </div>
                </body>

            </html>
        ');
    }
}
?>