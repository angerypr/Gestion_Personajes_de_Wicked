<?php
if (!file_exists('db_config.php')) {
    header('Location: instalador.php');
    exit();
}

require_once 'db_config.php';

if ($conn->connect_error) {
    header('Location: instalador.php');
    exit();
}
