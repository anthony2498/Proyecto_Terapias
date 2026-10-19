<?php
session_start();

$mensaje = $_SESSION['mensaje'] ?? '';
$tipo_mensaje = $_SESSION['tipo_mensaje'] ?? '';

unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terapias Alternativas Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/styles.css">
</head>

<body class="bg-light">
    <main>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow-lg p-4 w-100" style="max-width:420px; border-top:6px solid #2FA4E7;">
                <h4 class="text-center mb-4">
                    <i class="bi bi-heart-pulse"></i> Terapias Alternativas
                </h4>

                <?php if (!empty($mensaje)) : ?>
                    <div class="alert alert-<?php echo htmlspecialchars($tipo_mensaje); ?> text-center">
                        <?php echo htmlspecialchars($mensaje); ?>
                    </div>
                <?php endif; ?>

                <ul class="nav nav-tabs mb-4" id="authTabs" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#login" type="button">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#register" type="button">
                            <i class="bi bi-person-plus"></i> Registrarse
                        </button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="login">
                        <form method="post" action="../BD/login.php">
                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input type="email" name="user" class="form-control" placeholder="usuario@correo.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" required>
                                    <button class="btn btn-outline-secondary" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <button class="btn btn-primary w-100" type="submit">
                                Iniciar sesión
                            </button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="register">
                        <form method="post" action="../BD/register.php">
                            <div class="mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Correo</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="password" name="register_password" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirmar contraseña</label>
                                <input type="password" name="register_password_confirm" class="form-control" required>
                            </div>

                            <button class="btn btn-success w-100" type="submit">
                                Registrarse
                            </button>
                        </form>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="../index.php" class="btn btn-outline-primary btn-sm">Volver al inicio</a>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center pb-3">
        Sistema Web Terapias Alternativas © 2026
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>