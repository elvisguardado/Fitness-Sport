<?php
//Se incluye la clase con plantillas del documento.
require_once("../../app/helpers/dashboard/admin_page.php");
//Se imprime la plantilla del encabezado y se establece el titulo para la pagina web.
admin_page::headerTemplate('Principal');
?>

<!-- CARD HORIZONTAL -->
<div class="container">
    <div class="card horizontal" id="nuestra_historia">
        <div class="card-image hide-on-med-and-down">
            <!-- Imagen mostrada en la card -->
            <img src="../../resources/img/7.png">
        </div>
        <!-- Contenido de la card -->
        <div class="card-stacked col s12 m12 l6">
            <div class="card-content">
                <h4 class="center">Nuestra historia</h4>
                <p>“Baética Digital tiene sus orígenes en Madrid, donde llevamos ayudando a nuestros clientes desde hace más de 15 años. Nace con el fin de dar un salto de calidad en la profesionalización de los servicios digitales tales como el Diseño y Desarrollo Web, el Marketing Online y la Generación de Contenidos Digitales. Acabamos de abrir oficina en Motril y estaremos encantados de ayudarte en tu proyecto.”
                </p>

                <br>
                <p>Nuestro lema: Piensa diferente, Hazlo diferente!
                </p>

                <!-- Iconos para las redes sociales -->
                <div class="center">
                    <a href="https://www.facebook.com/RoberthDstsv/" target="_blank"><img src="https://st2.depositphotos.com/1144386/7770/v/600/depositphotos_77705004-stock-illustration-original-square-with-round-corners.jpg" alt="40" width="40" HSPACE="25" VSPACE="10">
                    </a>
                    <a href="#" target="_blank"><img src="https://i.pinimg.com/originals/3b/21/c7/3b21c7efd2ba9c119fb8d361acacc31d.png" alt="40" width="40" HSPACE="25" VSPACE="10">
                    </a>
                    <a href="#" target="_blank"><img src="https://cdn.icon-icons.com/icons2/895/PNG/512/Twitter_icon_icon-icons.com_69154.png" alt="40" width="40" HSPACE="25" VSPACE="10">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<h3 id="tituloPropositos" class="center"><i>Nuestros propósitos</i></h3>
<!-- Iniciando con la estructura de las cards -->
<div class="row container" id="propositosCard">
    <!-- Columna de las Cards -->
    <div class="col s12 m6 l6">

        <div class="card">
            <!-- Imagen de la card -->
            <div class="card-image">
                <img src="http://grupodenker.com/es%20-%20Copia/images/mision.png" alt="" width="500" height="500" HSPACE="1" VSPACE="1">
            </div>
            <!-- Contenido de la card -->
            <div class="card-content">
                <span class="card-title">Nuestra Visión</span>
                <!-- No Sabia que poner -->
                <p>
                    El Área de Deportes de la Universidad de Cádiz coordina y gestiona las actividades y cursos propios y en convenio, competiciones internas y externas, y sus instalaciones deportivas. Con este fin, fruto de sus compromisos de colaboración en las acciones docentes e investigadoras y de responsabilidad social, pone a disposición de la Comunidad Universitaria y la sociedad en general, los medios, tanto humanos como materiales, para que pueda conciliarse vida académica y deporte, estudio y ocio, que garantice una educación integral y de calidad..
                </p>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6">
        <div class="card">
            <!-- Imagen de la card -->
            <div class="card-image">
                <img src="http://grupoam.eu/wp-content/uploads/mision.jpg" alt="" width="500" height="500" HSPACE="1" VSPACE="1">
            </div>
            <!-- Contenido de la card -->
            <div class="card-content">
                <span class="card-title">Nuesta mision</span>
                <p>
                    El Área de Deportes (ADE) aspira a ser una organización referente en el ámbito del deporte mediante una programación innovadora, abierta a la participación y propuestas de los usuarios, ofreciendo unas instalaciones propias modernas, funcionales y adaptadas a todas las necesidades.
                    El ADE está decidido a ser un servicio gestionado con la eficiencia, la eficacia, la solvencia y la continua puesta al día que demanda la sociedad, estableciendo alianzas concretas de colaboración y manteniendo un acentuado interés por la calidad y la transparencia.

                </p>
            </div>
        </div>
    </div>
</div>
<!-- Terminando con la estructura de las cards -->

<?php
//Se imprime la plantilla del pie de pagina y se establece el controlador para la pagina web.
admin_page::footerTemplate('');
?>