<?php

namespace Model;

class Usuario extends Activerecord{

    //Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'telefono', 'admin', 'confirmado', 'token', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;
    public $password;

    public function __construct($args = []) {
        
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? '0';
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
        $this->password = $args['password'] ?? '';

    }

    //Mensajes de validación para la creación de una cuenta
    public function validarNuevaCuenta(){

        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }

        if(!$this->apellido){
            self::$alertas['error'][] = 'El apellido es obligatorio';
        }

        if(!$this->email){
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El password debe contener almenos 6 caracteres';
        }

        return self::$alertas;

    }

    public function validarLogin(){

        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'El password es Obligatorio';
        }

        return self::$alertas;

    }

    public function validarEmail(){

        if(!$this->email){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }

        return self::$alertas;

    }

    public function validarPassword(){

        if(!$this->password){
            self::$alertas['error'][] = 'El password es obligatorio';
        }

        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password dene tener al menos 6 caracteres';
        }

        return self::$alertas;

    }

    //Revisa si el usuario ya existe
    public function existeUsuario(){
        $query = "select * from " . self::$tabla . " where email = '" . $this->email . "' limit 1";
        
        $resultado = self::$db->query($query);
        
        if($resultado->num_rows){
            self::$alertas['error'][] = 'El usuario ya esta registrado';
        }

        return $resultado;

    }

    public function hashPassword(){

        $this->password = password_hash($this->password, PASSWORD_BCRYPT);

    }

    public function crearToken(){

        $this->token = uniqid();

    }

    public function comprobarPasswordAndVerificado($password){

        $resultado = password_verify($password, $this->password);

        if(!$resultado || !$this->confirmado){

            self::$alertas['error'][] = 'Passwrod Incorrecto o tu cuenta no ha sido confirmada';

        }else{

            return true;

        }

    }

}

?>