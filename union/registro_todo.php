<?php
//ingreso usuario
require_once '../controlador/controlador_dispositivo.php';
require_once '../controlador/controlador_usuario.php';
require_once '../controlador/controlador_usuario_dispositivo.php';
$item=new controlador_usuario();
$modelo_usuario=new modelo_usuario();
$modelo_usuario->nombre=  isset($_GET['nombre'])?$_GET['nombre']:null;
$modelo_usuario->apellido=isset($_GET['apellido'])?$_GET['apellido']:null;
$modelo_usuario->nick=isset($_GET['nick'])?$_GET['nick']:null;
$modelo_usuario->password=isset($_GET['password'])?$_GET['password']:null;
$modelo_usuario->foto=isset($_GET['foto'])?$_GET['foto']:null;

//ingreso dispositivo
$modelo_dispositivo=new modelo_dispositivo;
$modelo_dispositivo->descripcion=  isset($_GET['descripcion'])?$_GET['descripcion']:null;
$modelo_dispositivo->imei=isset($_GET['imei'])?$_GET['imei']:null;
$modelo_dispositivo->latitud=isset($_GET['latitud'])?$_GET['latitud']:null;
$modelo_dispositivo->longitud=isset($_GET['longitud'])?$_GET['longitud']:null;
$modelo_dispositivo->altura=isset($_GET['altura'])?$_GET['altura']:null;
 $time = time();
$modelo_dispositivo->fecha_update= date("Y-m-d H:i:s", $time);
//ingreso usuario dispositivo
$modelo_usuario_dispositivo= new modelo_usuario_dispositivo();
//$modelo_usuario_dispositivo->id_usuario=  isset($_GET['id_usuario'])?$_GET['id_usuario']:null;
//$modelo_usuario_dispositivo->id_dispositivo=  isset($_GET['id_dispositivo'])?$_GET['id_dispositivo']:null;
$modelo_usuario_dispositivo->propietario=  isset($_GET['propietario'])?$_GET['propietario']:null;

echo $item->android_registro_todo($modelo_usuario, $modelo_dispositivo, $modelo_usuario_dispositivo);
