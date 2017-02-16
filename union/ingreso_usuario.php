<?php
require_once '../controlador/controlador_usuario.php';
$item=new controlador_usuario();
$modelo=new modelo_usuario();
$modelo->nombre=  isset($_GET['nombre'])?$_GET['nombre']:null;
$modelo->apellido=isset($_GET['apellido'])?$_GET['apellido']:null;
$modelo->nick=isset($_GET['nick'])?$_GET['nick']:null;
$modelo->password=isset($_GET['password'])?$_GET['password']:null;
$modelo->foto=isset($_GET['foto'])?$_GET['foto']:null;
echo $item->android_ingreso($modelo);


