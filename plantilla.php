<?php
class Plantilla {
    public static $instancia = null;

    public static function aplicar(): Plantilla {
        if (self::$instancia == null) {
            self::$instancia = new Plantilla();
        }
        return self::$instancia;
    }

    public function __construct() {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Wicked World</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

            <style>
                body {
                    background: linear-gradient(to right, #0d1b0e, #3b1f3b);
                    color: #f8f9fa;
                    font-family: 'Segoe UI', sans-serif;
                    background-attachment: fixed;
                    margin: 0;
                    padding: 0;
                }

                .navbar-wicked {
                    background-color: rgba(0, 0, 0, 0.33);
                    backdrop-filter: blur(2px);
                }

                .navbar-wicked .navbar-brand,
                .navbar-wicked .nav-link {
                    color: #fff !important;
                    font-weight: 600;
                    letter-spacing: 0.5px;
                }

                footer {
                    background-color: rgba(0, 0, 0, 0.3);
                    backdrop-filter: blur(2px);
                    padding: 1rem;
                    color: #ccc;
                    font-size: 0.9rem;
                    border-top: 1px solid rgba(255, 255, 255, 0.1);
                }
            </style>
        </head>
        <body>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-wicked mb-4">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/index.php">Wicked World</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarWicked">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarWicked">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/Gestion_Personajes_de_Wicked/index.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Gestion_Personajes_de_Wicked/agregar.php">Agregar Personaje</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Gestion_Personajes_de_Wicked/index.php">Ver Personajes</a></li>
                        <li class="nav-item"><a class="nav-link" href="/Gestion_Personajes_de_Wicked/acerca_de.php">Acerca de</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
    }

    public function __destruct() {
        ?>
            <footer class="text-center mt-5">
                <hr>
                <p>&copy; <?= date('Y') ?> Wicked Web - Elphaba & Glinda</p>
            </footer>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>
        <?php
    }
}
?>
