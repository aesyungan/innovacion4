<?php

require_once '../modelo/modelo_usuario.php';
class controlador_usuario extends connect {
   private  $dato;
   function __construct() {
       $this->dato= new modelo_usuario();
   }
   
   public function android_ingreso(modelo_usuario $item) {
       $consulta1="SELECT * FROM usuario as u WHERE u.nick='$item->nick'";
       $res_consulta1=$this->conectar($consulta1);
       $res= array();
        if( mysqli_num_rows($res_consulta1)>0){
            $res["success"] = 0; 
            $res["message"] = "Usuario Ya registrado"; 
       }else{
       $consulta="INSERT INTO usuario(nombre,apellido,nick,password,foto)VALUES('$item->nombre','$item->apellido','$item->nick','$item->password','$item->foto')";
       $res_consulta=$this->conectar($consulta);
       $res["success"] = 1; 
       $res["message"] = "Ingreso Correcto"; 
       }
   
       return json_encode($res);
       
       
   }
   
    public function android_listar() {
        
        $consulta = "SELECT * FROM usuario";
         $res_consulta=$this->conectar($consulta);
         $res = array();
        if( mysqli_num_rows($res_consulta)>0){
             $res["success"] = 1; 
             $res["usuarios"] = array();
             while ($dato= mysqli_fetch_array($res_consulta)){
                 $item= array();
               
                 $item["id_usuario"]=$dato["id_usuario"];
                   $item["nombre"]=$dato["nombre"];
                 $item["apellido"]=$dato["apellido"];
                 $item["password"]=$dato["password"];
                 $item["nick"]=$dato["nick"];
                 array_push($res["usuarios"], $item);
    
             }
             
         }else{
              $res["success"] = 0; 
         }
         return json_encode($res); 
        
        
    }

  
     
     
     
      public function android_VerificarLogueo(modelo_usuario $item) {
        
        // $consulta = "SELECT * FROM usuario where nick='$item->nick' and password='$item->password'";
         $consulta = "SELECT * FROM usuario as u inner join usuario_dispositivo as ud on ud.id_usuario=u.id_usuario inner join dispositivo d on d.id_dispositivo=ud.id_dispositivo where nick='$item->nick' and password='$item->password' and ud.propietario=1";
         $res_consulta=$this->conectar($consulta);
         $res = array();
         if (mysqli_num_rows($res_consulta)>0) {
              $res["success"] = 1; 
              $res["message"] = "Ingreso Correcto"; 
             $res["usuarios"] = array();
             while ($dato= mysqli_fetch_array($res_consulta)){
                 $item= array();
                 $item["id_usuario"]=$dato["id_usuario"];
                 $item["nombre"]=$dato["nombre"];
                 $item["apellido"]=$dato["apellido"];
                 $item["password"]=$dato["password"];
                 $item["nick"]=$dato["nick"];
                 $item["foto"]=$dato["foto"];
                 $item["id_dispositivo"]=$dato["id_dispositivo"];
                 $item["descripcion"]=$dato["descripcion"];
                 $item["imei"]=$dato["imei"];
                 $item["latitud"]=$dato["latitud"];
                 $item["longitud"]=$dato["longitud"];
                 $item["propietario"]=$dato["propietario"];
                 
                 array_push($res["usuarios"], $item);
    
             }
             
         }else{
              $res["success"] = 0;
              $res["message"] = "Error En el Logueo";
         }
         return json_encode($res); 
        
        
    }
    
    public function android_registro_todo(modelo_usuario $user ,  modelo_dispositivo $dispositivo, modelo_usuario_dispositivo $usuario_dispositivo) {
       $consulta1="SELECT * FROM usuario as u WHERE u.nick='$user->nick'";
       $res_consulta1=$this->conectar($consulta1);
       $res= array();
        if( mysqli_num_rows($res_consulta1)>0){
            $res["success"] = 0; 
            $res["message"] = "Usuario Ya registrado"; 
       }else{
       $consulta="INSERT INTO usuario(nombre,apellido,nick,password,foto)VALUES('$user->nombre','$user->apellido','$user->nick','$user->password','$user->foto')";
       $res_consulta=$this->conectar($consulta);
       $consulta = "INSERT INTO dispositivo( descripcion, imei,latitud,longitud,altura,fecha_update) VALUES ('$dispositivo->descripcion','$dispositivo->imei','$dispositivo->latitud','$dispositivo->longitud','$dispositivo->altura','$dispositivo->fecha_update')";
        $res_consulta=$this->conectar($consulta);
        //ingreso de usuario dispositivo
            //optner id de usuario ingresado
           $consulta = "SELECT * FROM usuario where nick='$user->nick'";
           $res_consulta=$this->conectar($consulta);
           if ($dato=mysqli_fetch_array($res_consulta)) {
               $usuario_dispositivo->id_usuario=$dato['id_usuario'];
           }
           
           //optner id de dispositivo
           $consulta = "SELECT * FROM dispositivo where imei='$dispositivo->imei'";
           $res_consulta=$this->conectar($consulta);
           if ($dato=mysqli_fetch_array($res_consulta)) {
               $usuario_dispositivo->id_dispositivo=$dato['id_dispositivo'];
           }
           //ingreso usuario dispositivo
        $consulta = "INSERT INTO `usuario_dispositivo`(`id_usuario`, `id_dispositivo`,   `propietario`) VALUES ($usuario_dispositivo->id_usuario,$usuario_dispositivo->id_dispositivo,$usuario_dispositivo->propietario)";
         $res_consulta=$this->conectar($consulta);
           
        
       $res["success"] = 1; 
       $res["message"] = "Ingreso Correcto"; 
       }
   
       return json_encode($res);
        
    }
    
    
}
