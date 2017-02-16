<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controlador_usuario_dispositivo
 *
 * @author Aes
 */
require_once '../modelo/modelo_usuario_dispositivo.php';
require_once '../modelo/connect.php';
class controlador_usuario_dispositivo {
    private $dato;
    private $cnn;
            function __construct() {
        $this->dato= new modelo_usuario_dispositivo();
        $this->cnn= new connect();
    }

     public function android_listar() {
        
        
        $consulta = "SELECT * FROM usuario_dispositivo as ud inner JOIN usuario as u on u.id_usuario=ud.id_usuario inner join dispositivo as d on d.id_dispositivo=ud.id_dispositivo";
         $res_consulta=$this->cnn->conectar($consulta);
         $res = array();
         if (mysqli_num_rows($res_consulta)>0) {
              $res["success"] = 1; 
             $res["usuario_dispositivos"] = array();
             while ($dato= mysqli_fetch_array($res_consulta)){
                 $item= array();
               
                 $item["id_usuario_dispositivo"]=$dato["id_usuario_dispositivo"];
                 $item["id_usuario"]=$dato["id_usuario"];
                 $item["id_dispositivo"]=$dato["id_dispositivo"];
                 $item["longitud"]=$dato["longitud"];
                 $item["latitud"]=$dato["latitud"];
                 $item["altura"]=$dato["altura"];
                 $item["nick"]=$dato["nick"];
                 $item["password"]=$dato["password"];
                 $item["descripcion"]=$dato["descripcion"];
                 $item["propietario"]=$dato["propietario"];
                 $item["fecha_update"]=$dato["fecha_update"];
                 
          
                 array_push($res["usuario_dispositivos"], $item);
    
             }
             
         }else{
              $res["success"] = 0; 
         }
         return json_encode($res); 
    }
    
    //listar por usuario
    
     public function android_listar_by_user(modelo_usuario $item) {
        
        
        $consulta = "SELECT fn_user_foto(ud.id_dispositivo) as fotos,d.imei,ud.id_usuario_dispositivo,ud.id_usuario,ud.id_dispositivo,d.longitud,d.latitud,d.altura,u.nick,u.password,d.descripcion,d.imei,ud.propietario,d.fecha_update, fn_user_diss(d.id_dispositivo)as nombres FROM usuario_dispositivo as ud inner JOIN usuario as u on u.id_usuario=ud.id_usuario inner join dispositivo as d on d.id_dispositivo=ud.id_dispositivo where ud.id_usuario=$item->id_usuario";
         $res_consulta=$this->cnn->conectar($consulta);
         $res = array();
         if (mysqli_num_rows($res_consulta)>0) {
              $res["success"] = 1; 
             $res["usuario_dispositivos"] = array();
             while ($dato= mysqli_fetch_array($res_consulta)){
                 $item= array();
               
                 $item["id_usuario_dispositivo"]=$dato["id_usuario_dispositivo"];
                 $item["id_usuario"]=$dato["id_usuario"];
                 $item["id_dispositivo"]=$dato["id_dispositivo"];
                 $item["longitud"]=$dato["longitud"];
                 $item["latitud"]=$dato["latitud"];
                 $item["altura"]=$dato["altura"];
                 $item["nick"]=$dato["nick"];
                 $item["password"]=$dato["password"];
                 $item["descripcion"]=$dato["descripcion"];
                 $item["propietario"]=$dato["propietario"];
                 $item["fecha_update"]=$dato["fecha_update"];
                 $item["nombres"]=$dato["nombres"];
                 $item["fotos"]=$dato["fotos"];
                 $item["imei"]=$dato["imei"];
                 
                 
          
                 array_push($res["usuario_dispositivos"], $item);
    
             }
             
         }else{
              $res["success"] = 0; 
         }
         return json_encode($res); 
    }
 
 public function android_insertar(modelo_usuario_dispositivo $item){
     $consulta = "SELECT * FROM usuario_dispositivo where id_usuario=$item->id_usuario and id_dispositivo=$item->id_dispositivo";
     $res_consulta=$this->cnn->conectar($consulta);
     if(mysqli_num_rows($res_consulta)>0){
           $res["success"] = 0; 
         $res["message"] = "Usuario ya registrado";
     }else{
     $consulta = "INSERT INTO `usuario_dispositivo`(`id_usuario`, `id_dispositivo`,   `propietario`) VALUES ($item->id_usuario,$item->id_dispositivo,$item->propietario)";
         $res_consulta=$this->cnn->conectar($consulta);
         $res = array();
         $r="aa";
         $res["success"] = 1; 
         $res["message"] = "El usuario se ha agregado correctamente";
     }
         return json_encode($res);  
       
 }
 
  public function android_modificar(modelo_usuario_dispositivo $item){
     $consulta = "UPDATE `usuario_dispositivo` SET `id_usuario`=$item->id_usuario,`id_dispositivo`=$item->id_dispositivo,`propietario`=$item->propietario WHERE usuario_dispositivo.id_usuario_dispositivo=$item->id_usuario_dispositivo";
         $res_consulta=$this->cnn->conectar($consulta);
         $res = array();
         $r="aa";
         $res["success"] = 1; 
         $res["message"] = "El usuario_dispositivo se ha Modificado correctamente";
         return json_encode($res);  
 }
}
