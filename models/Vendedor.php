<?php

namespace Model;

class Vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono']; // Identificamos los datos

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar() {

        //Validaciones
        if(!$this->nombre) {
            self::$errores[] = "El nombre es obligatorio";
        }

        if(!$this->apellido) {
            self::$errores[] = "El apellido es obligatorio";
        }

        if(!$this->telefono) {
            self::$errores[] = "El telefono es obligatorio";
        }

        if(!preg_match("/[0-9]{10}/", $this->telefono) or strlen($this->telefono) > 10) {
            self::$errores[] = "Formato de teléfono no válido";
        }

        return self::$errores;
    }
}