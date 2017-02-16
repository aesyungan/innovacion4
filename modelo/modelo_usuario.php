<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelo_usuario
 *
 * @author Aes
 */
require_once 'connect.php';
class modelo_usuario {
    public $id_usuario;
    public $nombre;
    public $apellido;
    public $nick;
    public $password;
    public $foto;
    public  $cnn;
    function __construct() {
        $this->cnn= new connect();
        
    }
  

    
    
    
    
}
