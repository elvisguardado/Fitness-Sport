// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_DETALLE_PEDIDO = '../../app/api/dashboard/detalle_pedido.php?action=';
const ENDPOINT_ESTADO = '../../app/api/dashboard/estado_compra.php?action=readAll';




// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_DETALLE_PEDIDO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
       
       
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.direccion_env}</td>
                <td>${row.impuestos}</td>
                <td>${row.total}</td>
                <td>${row.precio_env}</td>
                <td>${row.nombres_cliente}</td>
                <td>${row.estado}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_compra})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                </td>
                <td>
                    <a href="detalle_compra.php" class="btn waves-effect orange lighten-1 tooltipped" data-tooltip="Ver Pedido"><i class="material-icons">arrow_forward</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    // Se inicializa el componente Material Box asignado a las imagenes para que funcione el efecto Lightbox.
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_DETALLE_PEDIDO, 'search-form');
});



// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar pedido';
  
    

    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_compra', id);

    fetch(API_DETALLE_PEDIDO + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_compra').value = response.dataset.id_compra;
                    fillSelect(ENDPOINT_ESTADO, 'estado', response.dataset.id_estado_de_comp);                

                    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                    M.updateTextFields();
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    
    saveRow(API_DETALLE_PEDIDO, 'update' , 'save-form', 'save-modal');
});






