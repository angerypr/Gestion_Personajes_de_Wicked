<?php
require_once 'vendor/autoload.php'; 
require_once 'db_config_loader.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "ID no proporcionado";
    exit();
}

$stmt = $conn->prepare("SELECT * FROM personajes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$personaje = $resultado->fetch_assoc();

if (!$personaje) {
    echo "Personaje no encontrado";
    exit();
}

$html = '
<style>
    @page { margin: 0; }
    body {
        margin: 40px;
        font-family: "DejaVu Sans", sans-serif;
        background-color:rgb(18, 18, 18);
        color: #f0e6f6;
    }
    .tarjeta {
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
    }
    .foto {
        max-width: 280px;
        border-radius: 15px;
        border: 4px solid rgb(21, 87, 15);
        margin-bottom: 30px;
    }
    .titulo {
        font-size: 36px;
        font-weight: 900;
        color: #f72585;
        text-shadow: 0 0 10px #f72585;
        margin-bottom: 25px;
        letter-spacing: 3px;
    }
    .dato {
        font-size: 20px;
        margin: 15px 0;
        background: rgba(255, 255, 255, 0.1);
        padding: 15px 20px;
        border-radius: 12px;
        box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.1);
    }
    strong {
        color: #f72585;
        font-weight: 700;
    }
</style>

<div class="tarjeta">
    <img class="foto" src="' . htmlspecialchars($personaje['foto']) . '" alt="Foto de ' . htmlspecialchars($personaje['nombre']) . '">
    <div class="titulo">' . htmlspecialchars($personaje['nombre']) . '</div>
    <div class="dato"><strong>Color Representativo:</strong> ' . htmlspecialchars($personaje['color']) . '</div>
    <div class="dato"><strong>Tipo:</strong> ' . htmlspecialchars($personaje['tipo']) . '</div>
    <div class="dato"><strong>Nivel:</strong> ' . htmlspecialchars($personaje['nivel']) . '</div>
</div>
';

$options = new Options();
$options->set('isRemoteEnabled', true); 
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("perfil_" . $personaje['nombre'] . ".pdf", ["Attachment" => true]);
exit();
