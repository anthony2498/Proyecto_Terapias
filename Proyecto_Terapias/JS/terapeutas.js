document.addEventListener('DOMContentLoaded', function(){

    const tablaUsuarios = document.getElementById('tablaUsuarios');
    const form = document.getElementById('formUsuarios');

    form.addEventListener('submit', function(e){

        e.preventDefault();

        const nombre = document.getElementById('nombre').value;
        const apellido = document.getElementById('apellido').value;
        const edad = document.getElementById('edad').value;
        const telefono = document.getElementById('telefono').value;
        const especialidad = document.getElementById('tipoTerapia').value;
        const provincia = document.getElementById('provincia').value;
        const email = document.getElementById('email').value;
        const direccion = document.getElementById('direccion').value;
        const disponibilidad = document.getElementById('disponibilidad').value;

        if(!nombre || !email || !identificacion || provincia === "-1" || especialidad === "-1"){
            alert("Por favor, rellenar los campos obligatorios");
            return;
        }

        const nuevaFila = tablaUsuarios.insertRow();

        nuevaFila.innerHTML = `
        <td>${nombre}</td>
        <td>${apellido}</td>
        <td>${edad}</td>
        <td>${telefono}</td>
        <td>${email}</td>
        <td>${especialidad}</td>
        <td>${provincia}</td>
        <td>${direccion}</td>
        <td>${disponibilidad}</td>

        <td>
            <div class="form-check">
                <input class="form-check-input checkEstado" type="checkbox" checked>
                <label class="form-check-label estadoTexto">Disponible</label>
            </div>
        </td>

        <td>
            <a href="#" class="btn btn-warning btn-sm btnEditar">Editar</a>
            <a href="#" class="btn btn-danger btn-sm btnEliminar"
            onclick="return confirm('¿Está seguro de eliminar este usuario?')">Eliminar</a>
        </td>
        `;

        form.reset();

        const modal = bootstrap.Modal.getInstance(document.getElementById('modalFormulario'));
        modal.hide();

    });

    document.addEventListener("change", function(e){

        if(e.target.classList.contains("checkEstado")){

            const label = e.target.nextElementSibling;

            if(e.target.checked){
                label.textContent = "Ocupado";
            }else{
                label.textContent = "Disponible";
            }

        }

    });

});