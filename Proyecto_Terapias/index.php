<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Terapias Alternativas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
          
            <aside class="col-md-3 bg-primary text-white">//

                <h4 class="text-center">Terapias Alternativas</h4>

                <nav class="nav flex-column mt-4">

                    <a class="nav-link text-white active" href="index.php">
                        <i class="fa-solid fa-house me-2"></i> Inicio
                    </a>

                    <a class="nav-link text-white" href="views/login.php">
                        <i class="fa-solid fa-right-to-bracket me-2"></i> Iniciar Sesión
                    </a>

                    <a class="nav-link text-white" href="register.php">
                        <i class="fa-solid fa-circle-user me-2"></i> Registrarse
                    </a>

                    <a class="nav-link text-white" href="views/terapeutas.php">
                        <i class="fa-solid fa-user-doctor me-2"></i> Terapeutas
                    </a>

                    <a class="nav-link text-white" href="views/clientes.php">
                        <i class="fa-solid fa-users me-2"></i> Clientes
                    </a>

                    <a class="nav-link text-white" href="views/citas.php">
                        <i class="fa-solid fa-calendar-check me-2"></i> Agendar Cita
                    </a>

                    <a class="nav-link text-white" href="views/terapias.php">
                    <i class="fa-solid fa-book me-2"></i> Tipos de Terapia
                    </a>

                </nav>

            </aside>
            <main class="col-md-9">
                <h2 class="mb-4">Bienvenido</h2>
                <p>
                    Sistema de gestión de citas para el consultorio de terapias alternativas
                    de Juan José Mora Barboza.
                </p>
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">
                            <div class="card-body text-center">
                                <h5 class="card-title">Agendar Cita</h5>
                                <p class="card-text">
                                    Reserve fácilmente su cita seleccionando fecha y hora disponible.
                                </p>
                                <a href="views/citas.php" class="btn btn-primary">
                                    Agendar
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">
                            <div class="card-body text-center">

                                <h5 class="card-title">Terapias</h5>

                                <p class="card-text">
                                    Conozca los diferentes tratamientos disponibles.
                                </p>

                                <a href="views/terapias.php" class="btn btn-success">
                                 Ver terapias
                                  </a>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card hover-card shadow-sm">

                            <div class="card-body text-center">

                                <h5 class="card-title">Perfil</h5>

                                <p class="card-text">
                                    Gestione su información personal y citas agendadas.
                                </p>

                                <a href="perfil.php" class="btn btn-dark">
                                    Ver perfil
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="text-center mt-3">
                <p>
                    Sistema Web - Terapias Alternativas © 2026
                </p>
            </footer>
        </div>
    </div>
</body>
</html>