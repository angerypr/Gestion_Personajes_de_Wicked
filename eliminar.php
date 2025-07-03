<?php
require_once 'db_config_loader.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit();
}

$stmt = $conn->prepare("DELETE FROM personajes WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: index.php?mensaje=eliminado');
} else {
    header('Location: index.php?mensaje=error');
}

exit();
