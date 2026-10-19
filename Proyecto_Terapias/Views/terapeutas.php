<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../CSS/styles.css" rel="stylesheet">
    <title>Terapeutas</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <aside class="col-md-3 bg-primary text-white p-3">
                <h4 class="text-center mb-4">
                    <i class="bi bi-heart-pulse"></i> Terapias Alternativas
                </h4>
                <nav class="nav flex-column">
                    <a class="nav-link text-white" href="../index.php">
                        <i class="bi bi-house"></i> Inicio
                    </a>
                    <a class="nav-link text-white" href="login.php">
                        <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                    </a>
                    <a class="nav-link text-white active" href="../views/terapeutas.php">
                        <i class="bi bi-people"></i> Terapeutas
                    </a>
                    <a class="nav-link text-white" href="../views/clientes.php">
                        <i class="bi bi-people"></i> Clientes
                    </a>
                    <a class="nav-link text-white" href="citas.php">
                        <i class="bi bi-calendar-check"></i> Agendar Cita
                    </a>
                    <a class="nav-link text-white" href="../terapias.php">
                        <i class="bi bi-flower1"></i> Tipos de Terapia
                    </a>
                </nav>
            </aside>
            <main class="col-md-9 p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Listado de Terapeutas</h2>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                        <i class="bi bi-person-plus"></i> Nuevo Terapeuta
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Edad</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Especialidad</th>
                                <th>Provincia</th>
                                <th>Dirección</th>
                                <th>Disponibilidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaUsuarios">

                            <tr>
                                <td>Juan Jose</td>
                                <td>Mora Barboza</td>
                                <td>30</td>
                                <td>8455-1234</td>
                                <td>juan@example.com</td>
                                <td>Masajes Terapeuticos</td>
                                <td>San José</td>
                                <td>123 Calle Principal</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkEstado" type="checkbox" checked>
                                        <label class="form-check-label estadoTexto">
                                            Disponible
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">Editar</a>
                                    <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <div class="modal fade" id="modalUsuarios" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        Registrar Terapeuta
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="formUsuarios">

                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Juan Pérez">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Identificación</label>
                            <input type="text" class="form-control" id="identificacion" placeholder="X-XXXX-XXXX">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="correo@email.com">
                        </div>
                        <div class="mb-3">

                            <label class="form-label">Tipo de Terapia</label>
                            <select class="form-select" id="tipoTerapia">
                                <option value="-1">Seleccione una terapia</option>
                                <option value="Hidroterapia">Hidroterapia</option>
                                <option value="Acupuntura">Acupuntura</option>
                                <option value="Aromaterapia">Aromaterapia</option>
                                <option value="Masaje Terapéutico">Masaje Terapéutico</option>
                                <option value="Electroterapia">Electroterapia</option>
                            </select>

                        </div>
                        <div class="mb-3">

                            <label class="form-label">Provincia</label>

                            <select class="form-select" id="provincia">

                                <option value="-1">Seleccione una provincia</option>
                                <option value="San José">San José</option>
                                <option value="Alajuela">Alajuela</option>
                                <option value="Cartago">Cartago</option>
                                <option value="Heredia">Heredia</option>
                                <option value="Guanacaste">Guanacaste</option>
                                <option value="Puntarenas">Puntarenas</option>
                                <option value="Limón">Limón</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Dirección Consultorio</label>

                            <textarea class="form-control" rows="3" id="direccion"></textarea>

                        </div>


                        <button type="submit" class="btn btn-success w-100">

                            <i class="bi bi-save"></i> Guardar Usuario

                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../JS/terapeutas.js"></script>

    <script>
        initLayout('terapeutas');
    </script>
</body>
</html>