<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of modelo_categoria
 *
 * @author XL
 */
class modelo_categoria {
    //put your code here
    private $id_categoria;
    private $nombre;
    private $descripcion;
    public function getId_categoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

  public  function getDescripcion() {
        return $this->descripcion;
    }

    public function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


  }
