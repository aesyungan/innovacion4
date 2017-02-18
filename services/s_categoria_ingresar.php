<?php
require_once '../controlador/controlador_categoria.php';
$item=new controlador_categoria();
$modelo=new modelo_categoria();
$modelo->descripcion=  isset($_GET['descripcion'])?$_GET['descripcion']:null;
$modelo->nombre=isset($_GET['nombre'])?$_GET['nombre']:null;
echo $item->android_insertar($modelo);

