<?php
require_once '../controlador/controlador_dispositivo.php';
$item=new controlador_dispositivo();
$modelo=new modelo_dispositivo;
$modelo->id_dispositivo=  isset($_GET['id_dispositivo'])?$_GET['id_dispositivo']:null;

$modelo->latitud=isset($_GET['latitud'])?$_GET['latitud']:null;
$modelo->longitud=isset($_GET['longitud'])?$_GET['longitud']:null;
$modelo->altura=isset($_GET['altura'])?$_GET['altura']:null;
 $time = time();

$modelo->fecha_update= date("Y-m-d H:i:s", $time);

echo $item->android_actualizar_ubicacion($modelo);
