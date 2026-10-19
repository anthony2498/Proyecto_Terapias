<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agendar Cita</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-light">

    <main>

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="card shadow-lg p-4 w-100" style="max-width:450px; border-top:6px solid #2FA4E7;">

                <h4 class="text-center mb-4">
                    <i class="bi bi-calendar-check"></i> Agendar Cita
                </h4>

                <form>

                    <div class="mb-3">
                        <label class="form-label">Tipo de terapia</label>
                        <select class="form-select">
                            <option>Quiropraxia</option>
                            <option>Masaje Terapéutico</option>
                            <option>Ajuste de columna</option>
                            <option>Hidroterapia</option>
                            <option>Acupuntura</option>
                            <option>Aromaterapia</option>
                            <option>Electroterapia</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hora</label>
                        <input type="time" class="form-control">
                    </div>

                    <button class="btn btn-primary w-100">
                        Reservar cita
                    </button>

                </form>

            </div>

        </div>

    </main>

</body>

</html>