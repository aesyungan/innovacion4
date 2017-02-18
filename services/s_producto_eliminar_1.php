<?php
require_once '../controlador/controlador_producto.php';
$item=new controlador_producto();

$modelo=new modelo_producto();
$modelo->id_producto=  isset($_GET['id_producto'])?$_GET['id_producto']:null;
echo $item->android_eliminar($modelo);

