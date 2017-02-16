<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template; file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelo_usuario_dispositivo
 *
 * @author Aes
 */
require_once 'connect.php';
class modelo_usuario_dispositivo {
    public $id_usuario_dispositivo;
    public $id_usuario;
    public $id_dispositivo;
    public $propietario;

    
    public $cnn;
    function __construct() {
        $this->cnn= new connect();
        
    }
    
   
    
    
        
        
    

    
    
}
