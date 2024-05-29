<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/BienesRaices/build/css/app.css">
</head>
<body>
    
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/BienesRaices/index.php">
                    <img loading="lazy" src="/BienesRaices/build/img/logo.svg" alt="logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img loading="lazy" src="/BienesRaices/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/BienesRaices/build/img/dark-mode.svg" alt="icono dark-mode">

                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesion</a>
                        <?php elseif(!$auth): ?>
                            <a href="login.php">Iniciar Sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
                
            </div>

            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : ''; ?>

        </div>
    </header>