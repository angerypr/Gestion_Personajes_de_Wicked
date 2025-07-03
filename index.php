<?php
require_once 'plantilla.php';
require_once 'db_config.php';

Plantilla::aplicar(); 

$sql = "SELECT * FROM personajes";
$resultado = $conn->query($sql);
?>

<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">
<style>
    body {
    background: url('https://cinescopia.com/wp-content/uploads/2024/11/Universal_HomeMainCarousel_1920x1025-5.jpg') no-repeat center center fixed;
    background-size: cover;
    background-attachment: fixed;
    background-color: #000; /* Fallback por si no carga */
    color: white;
}

.btn-wicked-elegante {
    background: linear-gradient(135deg, #e83e8c,rgb(29, 112, 14));
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

.btn-wicked-elegante i {
    font-size: 1.5rem;
   
}
body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.51); /* ajusta la opacidad aquí */
    z-index: -1;
}
</style>

<div class="container p-4">
    
    <div class="text-center my-5">
        <h1 style="
            font-size: 4.5rem;
            font-weight: bold;
            font-family: 'Cinzel Decorative', cursive;
            background: linear-gradient(90deg, #39ff14, #ff4ec9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 3px 3px 8px rgba(0,0,0,0.7);
        ">
            Bienvenido al Wicked World
        </h1>
        <h2 class="mt-4" style="color: #e83e8c; text-shadow: 1px 1px 2px #000;">
            <i class="bi bi-stars text-warning me-2"></i> Lista de Personajes de Wicked <i class="bi bi-stars text-warning me-2"></i>
        </h2>
    </div>

    <?php if ($resultado->num_rows > 0): ?>
    <style>
        .table thead {
            background: linear-gradient(135deg, #39ff14, #e83e8c);
            color: black;
        }

        .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .btn-custom i {
            font-size: 1.2rem;
        }

        .table td, .table th {
            vertical-align: middle !important;
        }
    </style>

    <div class="card-wicked mx-auto" style="max-width: 1000px;">
        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Color</th>
                        <th>Tipo</th>
                        <th>Nivel</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td>
                            <img src="<?= htmlspecialchars($fila['foto']) ?>" alt="Foto" width="70" height="70" class="rounded-circle border border-light">
                        </td>
                        <td><?= htmlspecialchars($fila['nombre']) ?></td>
                        <td><?= htmlspecialchars($fila['color']) ?></td>
                        <td><?= htmlspecialchars($fila['tipo']) ?></td>
                        <td><?= htmlspecialchars($fila['nivel']) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $fila['id'] ?>" class="btn btn-warning btn-sm btn-custom" title="Editar">Editar</a>
                            <a href="descargar_pdf.php?id=<?= $fila['id'] ?>" class="btn btn-info btn-sm btn-custom" target="_blank" title="Descargar PDF">Descargar PDF</a>
                            <a href="eliminar.php?id=<?= $fila['id'] ?>" class="btn btn-danger btn-sm btn-custom" onclick="return confirm('¿Estás seguro de eliminar este personaje?')" title="Eliminar">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-info text-center mt-4">
        <i class="bi bi-person-bounding-box text-primary me-2"></i> No hay personajes registrados todavía.
    </div>
<?php endif; ?>


    <div class="text-center mt-4">
        <a href="agregar.php" class="btn-wicked-elegante" title="Agregar nuevo personaje">
    <i class="bi bi-plus-circle"></i> Agregar nuevo personaje
</a>
    </div>
</div>
