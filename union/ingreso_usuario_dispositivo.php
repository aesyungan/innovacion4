<?php

require_once '../controlador/controlador_usuario_dispositivo.php';
require_once '../modelo/modelo_usuario_dispositivo.php';
$acceso=new controlador_usuario_dispositivo();
$item= new modelo_usuario_dispositivo();
//$item->id_usuario=  isset($_GET['id_usuario_dispositivo'])?$_GET['id_usuario_dispositivo']:null;
$item->id_usuario=  isset($_GET['id_usuario'])?$_GET['id_usuario']:null;
$item->id_dispositivo=  isset($_GET['id_dispositivo'])?$_GET['id_dispositivo']:null;
$item->propietario=  isset($_GET['propietario'])?$_GET['propietario']:null;
  
echo $acceso->android_insertar($item);


