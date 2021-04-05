<?php
namespace App;
class Propiedad extends ActiveRecord {
    protected static $tabla='propiedades';
    public static $columnasDB;

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? NULL;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';

    }
    public function validar(){
        if (!$this->titulo) {self::$errores[]='Debes Añadir un título';}
        if (!$this->precio) {self::$errores[]='Debes Añadir un precio';}
        if (strlen($this->descripcion)<50) {self::$errores[]='LA descripción debe tener mínimo 50 caracteres';}
        if (!$this->habitaciones) {self::$errores[]='El número de baños es obligatorio';}
        if (!$this->estacionamiento) {self::$errores[]='El número de estacionamientos es obligatorio';}
        if (!$this->vendedorId) {self::$errores[]='El número de habitaciones es obligatorio';}
        if (!$this->wc) {self::$errores[]='El vendedor es obligatorio';}
        if (!$this->imagen){self::$errores[]='La imágen de la propiedad es obligatoria';}
        return self::$errores;
    }
}