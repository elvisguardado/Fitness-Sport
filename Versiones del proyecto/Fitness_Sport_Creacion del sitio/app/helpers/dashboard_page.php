<?php
//Clase para definir las plantillas de las páginas web del sitio privado
class Dashboard_Page {
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
                <link type="text/css" rel="stylesheet" href="../../resources/css/dashboard_styles.css" />
                <!--Se informa al navegador que el sitio web está optimizado para dispositivos móviles-->
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <!--Título del documento-->
                <title>Administradores - '.$title.'</title>
            </head>
            
            <body>
                <!--Encabezado del documento-->
                <header>
                    <nav class="green">
                        <div class="nav-wrapper">
                            <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large">
                                <i class="material-icons">menu</i>
                            </a>
                            <ul class="right">
                                <li><a href="index.php"><i class="material-icons left">dashboard</i>Home</a></li>
                            </ul>
                        </div>
                    </nav>

                    <ul id="slide-out" class="sidenav">
                        <li>
                            <div class="user-view">
                                <div class="background">
                                    <img src="../../resources/img/background.png">
                                </div>
                                <a href="#user"><img class="circle" src="../../resources/img/users/foto.png"></a>
                                <a href="#name"><span class="white-text name">John Doe</span></a>
                                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                            </div>
                        </li>
                        <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
                        <li><a href="#!">Second Link</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a class="subheader">Subheader</a></li>
                        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
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
                <footer class="page-footer green">
                    <div class="container">
                        <div class="row">
                            <div class="col l6 s12">
                                <h5 class="white-text">Footer Content</h5>
                                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                                    content.</p>
                            </div>
                            <div class="col l4 offset-l2 s12">
                                <h5 class="white-text">Links</h5>
                                <ul>
                                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            © 2014 Copyright Text
                            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                        </div>
                    </div>
                </footer>
                <!--Importación de archivos JavaScript al final del cuerpo para una carga optimizada-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                <script src="../../app/controllers/dashboard/'.$controller.'"></script>
            </body>
            </html>
        ');
    }
}
?>