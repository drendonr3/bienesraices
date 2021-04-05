<?php
namespace App;

class ActiveRecord {
    // Base de Datos
    protected static $db;
    public static $columnasDB=[];
    protected static $tabla='';
    //Errores
    protected static $errores=[];


    //definir conexion a la BD
    public static function setDB($database){
        self::$db=$database;
        
    }
    public static function setColumnas($columnas){
        static::$columnasDB=$columnas;
    }


    public function guardar(){
        if (!is_null($this->id)){
            // Actualizar
            $this->actualizar();
        } else {
            // Crear
            $this->crear();
        }
    }

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key =>$value){
            $valores[]="{$key}='{$value}'";
        }

        $query= "UPDATE ".  static::$tabla ." SET ";
        $query .= join(", ", $valores);
        $query .= " WHERE id='" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        if (empty($stmt->error_list)) {
            //Redireccionar al usuario
            header('location: /admin?resultado=2');
        }


    }

    public function crear(){
        //Sanitizar los datos
        
        $atributos = $this->sanitizarAtributos();
        // Insertar
        $query="INSERT INTO ".  static::$tabla ." ( ";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '",array_values($atributos));
        $query .= " ') ";
        
        $stmt = self::$db->prepare($query);
        //debuguear($stmt);
        $stmt->execute();
        if (empty($stmt->error_list)) {
            //Redireccionar al usuario
            header('location: /admin?resultado=1');
        }
    }

    //Eliminar un registro
    public function eliminar(){
        $query = "DELETE FROM ".  static::$tabla ." WHERE id = ". self::$db->escape_string($this->id) . " LIMIT 1";
        $stmt = self::$db->prepare($query);
        $stmt->execute();
        if (empty($stmt->error_list)) {
            $this->borrarImagen();
            //Redireccionar al usuario
            header('location: /admin?resultado=3');
        }

    }
    public function artributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if ($columna==='id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarAtributos(){
        $atributos = $this->artributos();
        $atributosSanitizados=[];
        foreach($atributos as $key=> $value){
            $atributosSanitizados[$key] = self::$db->escape_string($value);
        }
        return $atributosSanitizados;
    }

    //Subida de archivos

    public function setImagen($imagen){
        //Elimina la imagen previa
        if (!is_null($this->id)){
            $this->borrarImagen();
        }
        if ($imagen){
            $this->imagen = $imagen;
        }
    }

    // BOrrar imagen
    public function borrarImagen(){
        //Comprobar si esxiste el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES.$this->imagen);
        }
    }

    //Validacion

    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores=[];
        
        return static::$errores;

    }

    //Lista todos los registros
    public static function all(){
        //Escribir Query
        $query="SELECT * FROM " .  static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Lista determinado número de registros
        public static function get($cantidad){
        //Escribir Query
        $query="SELECT * FROM " .  static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Busca un registro por su id
    public static function find($id){
        //Escribir Query
        $query="SELECT * FROM ".  static::$tabla ." WHERE id=${id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // Consultar la base de Datos
        $resultado = self::$db->query($query);
        // Iterar los resultados
        $array=[];
        while ($registro=$resultado->fetch_assoc()){
            $array[]= static::crearObjeto($registro);
        }

        // Liberar memoria
        $resultado->free();
        //retornar los resultados
        return $array;
    }

    protected Static function crearObjeto($registro){
        $objeto = new static;

        foreach ($registro as $key=>$value){
            if (property_exists($objeto,$key)){
                $objeto-> $key = $value;
            }
        }
        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key =>$value){
            if(property_exists($this,$key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
    
}