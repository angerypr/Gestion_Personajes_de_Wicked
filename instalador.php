<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servidor = $_POST['servidor'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $nombreBD = $_POST['nombre_bd'];

    $conn = new mysqli($servidor, $usuario, $contrasena);
    if ($conn->connect_error) {
        $error = "Conexión fallida: " . $conn->connect_error;
    } else {
        $conn->query("CREATE DATABASE IF NOT EXISTS $nombreBD");
        $conn->select_db($nombreBD);

        $conn->query("
            CREATE TABLE IF NOT EXISTS personajes (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nombre VARCHAR(100),
                color VARCHAR(50),
                tipo VARCHAR(50),
                nivel VARCHAR(50),
                foto VARCHAR(255)
            )
        ");

        $config = "<?php\n";
        $config .= "\$servername = '$servidor';\n";
        $config .= "\$username = '$usuario';\n";
        $config .= "\$password = '$contrasena';\n";
        $config .= "\$database = '$nombreBD';\n";
        $config .= "\$conn = new mysqli(\$servername, \$username, \$password, \$database);\n";
        $config .= "if (\$conn->connect_error) {\n";
        $config .= "    die('Conexión fallida: ' . \$conn->connect_error);\n";
        $config .= "}\n";

        file_put_contents('db_config.php', $config);
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Asistente de Configuración</title>
    <style>
        body {
            background: #222;
            color: white;
            font-family: sans-serif;
            text-align: center;
            padding: 50px;
        }
        input, button {
            padding: 10px;
            margin: 10px;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <h1>Asistente de Configuración de Base de Datos</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="servidor" placeholder="Servidor" value="localhost" required><br>
        <input type="text" name="usuario" placeholder="Usuario" required><br>
        <input type="password" name="contrasena" placeholder="Contraseña"><br>
        <input type="text" name="nombre_bd" placeholder="Nombre de la Base de Datos" required><br>
        <button type="submit">Configurar</button>
    </form>
</body>
</html>
