<?php

define('TEMPLATES_URL',__DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT']. '/imagenes/');


function incluirTemplate( string $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estadoAutenticado() : bool {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
    }

    return false;
}

function debuguear($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "<pre/>";

    exit;
}

// Escapa / sanitizar el HTML

function s($html) : string {
    $s= htmlspecialchars($html);
    return $s;
}

// Validar tipo de contenido
function validarTipoContenido($tipo) {
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo) {
    $mensaje = '';

    switch($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;

        case 3:
            $mensaje = 'Eliminado correctamente';
            break;

        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

// Mostar la cantidad de caracteres deseados
function cortarTexto($texto, $limite) {
    if (strlen($texto) > $limite) {
        $texto = substr($texto, 0, $limite) . '...';
    }
    return $texto;
}

function validarORedireccionar(string $url) {

        // Validar id valido
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header("Location: ${url}");
        }

        return $id;
}