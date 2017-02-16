<?php
include_once '../controlador/controlador_usuario.php';
include_once '../modelo/modelo_usuario.php';

$controlador= new controlador_usuario();

$item =new modelo_usuario();
$item->nick=  isset($_GET['nick'])?$_GET['nick']:null;
$item->password=  isset($_GET['password'])?$_GET['password']:null;

//$item->nick="alex";
//$item->password="alex";
echo $controlador->android_VerificarLogueo($item);


