<?php 

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController {

    public static function crear(Router $router) {
        $vendedor = new Vendedor;

        //Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        //Ejecutar el codigo despues de enviar el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar que no haya campos vacios
            $errores = $vendedor->validar();

            // No hay errores
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {
        $id = validarORedireccionar('/admin');

        // Obtener el arreglo del vendedor de la BD
        $vendedor = Vendedor::find($id);

        //Arreglo con mensajes de errores
        $errores = Vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $args = $_POST['vendedor'];
            // Sincronizar objeto en memoria con lo que el usuario escribio
            $vendedor->sincronizar($args);
        
            // Validacion
            $errores = $vendedor->validar();
        
            if(empty($errores)) {
                $vendedor->guardar();
            }
        
        }

        $router->render('vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);

    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id) {
    
                $tipo = $_POST['tipo'];
    
                if(validarTipoContenido($tipo)) {
                    // Compara lo que vamos a eliminar
    
                    if($tipo === 'vendedor') {
                        $vendedor = Vendedor::find($id);
                        $vendedor->eliminar();
    
                    }
                }
            }
        }
    }
}