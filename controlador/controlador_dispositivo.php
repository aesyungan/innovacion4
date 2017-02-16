<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controlador_dispositivo
 *
 * @author Aes
 */
require_once '../modelo/modelo_dispositivo.php';

class controlador_dispositivo extends connect {

    private $dato;

    function __construct() {
        $this->dato = new modelo_dispositivo();
    }

    public function android_listar() {
        $consulta = "SELECT * FROM dispositivo";
        $res_consulta = $this->conectar($consulta);
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["dispositivos"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();

                $item["id_dispositivo"] = $dato["id_dispositivo"];
                $item["descripcion"] = $dato["descripcion"];
                $item["imei"] = $dato["imei"];
                $item["latitud"] = $dato["latitud"];
                $item["longitud"] = $dato["longitud"];
                $item["altura"] = $dato["altura"];
                $item["fecha_update"] = $dato["fecha_update"];
                array_push($res["dispositivos"], $item);
            }
        } else {
            $res["success"] = 0;
        }
        return json_encode($res);
    }

    //ingreso 

    public function android_ingreso(modelo_dispositivo $item) {

        $consulta = "INSERT INTO dispositivo( descripcion, imei,latitud,longitud,altura,fecha_update) VALUES ('$item->descripcion','$item->imei','$item->latitud','$item->longitud','$item->altura','$item->fecha_update')";
        $res_consulta = $this->conectar($consulta);
        $res = array();
        $res["success"] = 1;

        $res["message"] = "Ingreso Correcto";
        return json_encode($res);
    }

    public function android_actualizar_ubicacion(modelo_dispositivo $item) {

        $consulta = "update dispositivo set `latitud`='$item->latitud',`longitud`='$item->longitud',`altura`='$item->altura',fecha_update='$item->fecha_update' WHERE `id_dispositivo`=$item->id_dispositivo";
        $res_consulta = $this->conectar($consulta);
        $res = array();
        $res["success"] = 1;

        $res["message"] = "Actualizacion  Correcto de ubicacion";
        return json_encode($res);
    }

    public function android_actualizar_todo(modelo_dispositivo $item) {

        $consulta = "update dispositivo set `descripcion`='$item->descripcion',`imei`='$item->imei',`latitud`='$item->latitud',`longitud`='$item->longitud',`altura`='$item->altura' ,fecha_update='$item->fecha_update' WHERE `id_dispositivo`=$item->id_dispositivo";
        $res_consulta = $this->conectar($consulta);
        $res = array();
        $res["success"] = 1;

        $res["message"] = "Actualizacion  Correcto de ubicacion";
        return json_encode($res);
    }

}
