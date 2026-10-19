document.addEventListener('DOMContentLoaded', function(){

    const tablaClientes = document.getElementById('tablaUsuarios');
    const form = document.getElementById('formUsuarios');

    form.addEventListener('submit', function(e){

        e.preventDefault();

        const nombre = document.getElementById('nombre').value;
        const apellidos = document.getElementById('apellidos').value;
        const identificacion = document.getElementById('identificacion').value;
        const edad = document.getElementById('edad').value;
        const telefono = document.getElementById('telefono').value;
        const email = document.getElementById('email').value;
        const tipoTerapia = document.getElementById('tipoTerapia').value;
        const provincia = document.getElementById('provincia').value;
        const direccion = document.getElementById('direccion').value;

        const generoSeleccionado = document.querySelector('input[name="genero"]:checked');

        // Validaciones
        if(!nombre || !apellidos || !email || !identificacion || provincia === "-1" || tipoTerapia === "-1" || !generoSeleccionado){
            alert("Por favor, complete los campos obligatorios");
            return;
        }

        const genero = generoSeleccionado.value;
        const nuevaFila = tablaClientes.insertRow();

        nuevaFila.innerHTML = `
        <td>${nombre}</td>
        <td>${apellidos}</td>
        <td>${identificacion}</td>
        <td>${edad}</td>
        <td>${telefono}</td>
        <td>${email}</td>
        <td>${genero}</td>
        <td>${tipoTerapia}</td>
        <td>${provincia}</td>
        <td>${direccion}</td>
        <td>
            <button class="btn btn-warning btn-sm btnEditar">Editar</button>
            <button class="btn btn-danger btn-sm btnEliminar">Eliminar</button>
        </td>
        `;

        form.reset();

        const modal = bootstrap.Modal.getInstance(document.getElementById('modalUsuarios'));
        modal.hide();

    });
    tablaClientes.addEventListener('click', function(e){

        if(e.target.classList.contains("btnEliminar")){

            if(confirm("¿Está seguro de eliminar este cliente?")){
                const fila = e.target.closest("tr");
                fila.remove();
            }

        }

    });

});