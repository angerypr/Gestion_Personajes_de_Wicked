<?php
require_once 'plantilla.php';
require_once 'db_config.php';

Plantilla::aplicar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];
    $foto = $_POST['foto']; 

    $stmt = $conn->prepare("INSERT INTO personajes (nombre, color, tipo, nivel, foto) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $nombre, $color, $tipo, $nivel, $foto);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
<style>
    body {
        background: url('https://cinescopia.com/wp-content/uploads/2024/11/Universal_HomeMainCarousel_1920x1025-5.jpg') no-repeat center center fixed;
        background-size: cover;
        background-attachment: fixed;
        background-color: #000;
        color: white;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.51);
        z-index: -1;
    }

    .btn-wicked-elegante {
        background: linear-gradient(135deg, #e83e8c, rgb(29, 112, 14));
        color: white;
        font-weight: 500;
        font-size: 1.2rem;
        padding: 0.6rem 2.2rem;
        border-radius: 2rem;
        display: inline-flex;
        align-items: center;
        gap: 0.7rem;
        text-decoration: none;
    }

    .btn-wicked-elegante:hover {
        background: linear-gradient(135deg, rgb(29, 112, 14), #e83e8c);
    }

    .form-wicked {
        background-color: rgba(0, 0, 0, 0.65);
        padding: 2rem;
        border-radius: 1.5rem;
        color: white;
    }

    input, select {
        background-color: #1c1c1c;
        color: white;
        border: 1px solid #555;
        border-radius: 0.5rem;
        padding: 0.5rem;
        width: 100%;
    }
</style>

<div class="container p-2">
    <div class="text-center my-5">
        <h2 class="mt-4" style="color: #e83e8c; text-shadow: 1px 1px 2px #000;">
            <i class="bi bi-stars text-warning me-2"></i> Agregar un nuevo personaje <i class="bi bi-stars text-warning me-2"></i>
        </h2>
    </div>

    <div class="form-wicked mx-auto" style="max-width: 600px;">
        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color:</label>
                <input type="text" name="color" id="color" required>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="text" name="tipo" id="tipo" required>
            </div>

            <div class="mb-3">
                <label for="nivel" class="form-label">Nivel (1 al 5):</label>
                <input type="number" name="nivel" id="nivel" min="1" max="5" required>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto (URL):</label>
                <input type="url" name="foto" id="foto" placeholder="https://ejemplo.com/imagen.jpg" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn-wicked-elegante">
                    <i class="bi bi-check2-circle"></i> Guardar Personaje
                </button>
            </div>
        </form>
    </div>
</div>
