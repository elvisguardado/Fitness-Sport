//Metodo que agrega un controlador de eventos cuando el contenido del documento ha sido cargado.
document.addEventListener('DOMContentLoaded', function () {

    //Se inicializan los modals
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
    M.AutoInit();

    //Se inicializan los medials
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, options);

    //Se inicializa el componente sidenav
    var elements = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elements);
    
    //Se inicializa el componente slider
    var elements = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elements);
});