//Método que agrega un controlador de eventos cuando el contenido del documento ha sido cargado
document.addEventListener('DOMContentLoaded', function() {
    //Se declaran las variables necesarias para inicializar los componentes del framework
    let elements, instances;
    //Se inicializa el componente sidenav
    elements = document.querySelectorAll('.sidenav');
    instances = M.Sidenav.init(elements);
});