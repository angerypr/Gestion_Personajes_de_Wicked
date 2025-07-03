<?php
require_once 'plantilla.php';
Plantilla::aplicar();
?>

<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

<style>
    body {
    background: url('https://cinescopia.com/wp-content/uploads/2024/11/Universal_HomeMainCarousel_1920x1025-5.jpg') no-repeat center center fixed;
    background-size: cover;
    background-attachment: fixed;
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

    .acerca-container {
        padding: 40px 20px;
        max-width: 900px;
        margin: auto;
        text-align: center;
    }

    .acerca-container h1 {
        font-size: 4rem;
        font-weight: 700;
        background: linear-gradient(90deg, #39ff14, #ff4ec9);
        font-family: 'Cinzel Decorative', cursive;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 3px 3px 8px rgba(0,0,0,0.7);
        margin-bottom: 40px;
    }

    .acerca-foto {
        width: 220px;
        height: 220px;
        border-radius: 50%;
        border: 4px solid rgb(155, 57, 103);
        object-fit: cover;
        margin-bottom: 30px;
    }

    .acerca-datos {
        font-size: 1.5rem;
        margin-bottom: 40px;
        color: #f72585;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-shadow: 1px 1px 2px #000;
    }

    .acerca-video {
        position: relative;
        width: 100%;
        max-width: 720px;
        margin: auto;
        box-shadow: 0 0 30px #720026;
        border-radius: 20px;
        overflow: hidden;
    }

    .acerca-video iframe,
    .acerca-video video {
        width: 100%;
        height: 405px;
        display: block;
    }
</style>

<div class="container p-4">
    <div class="acerca-container">
        <h1>Acerca de Mí</h1>

        <img src="img/mifoto.jpg" alt="Foto de Nombre Apellido" class="acerca-foto">

        <div class="acerca-datos">
            Nombre: <span>Angery Payamps</span><br>
            Matrícula: <span>2024-0215</span>
        </div>

        <div class="acerca-video">
            <video controls>
              <source src="../Tarea 2 - Gestor Multimedia - Made with Clipchamp.mp4" type="video/mp4">
            Tu navegador no soporta el video.
            </video>
        </div>
    </div>
</div>
