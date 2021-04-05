<?php
namespace App;
class Vendedor extends ActiveRecord {
    protected static $tabla='vendedores';
    public static $columnasDB;

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? NULL;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        if (!$this->nombre) {self::$errores[]='Debes Añadir un nombre';}
        if (!$this->apellido) {self::$errores[]='Debes Añadir un Apellido';}
        if (!$this->telefono){self::$errores[]='Debes Añadir un Telefono';}
        if (!preg_match('/[0-9]{10}/',$this->telefono)){self::$errores[]='Debes Añadir un número de Telefono de 10 dígitos';}

        return self::$errores;
    }
}