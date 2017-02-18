<?php
require_once '../controlador/controlador_producto.php';
$item=new controlador_producto();
$modelo=new modelo_producto();
$modelo->id_producto=  isset($_GET['id_producto'])?$_GET['id_producto']:null;
$modelo->nombre=isset($_GET['nombre'])?$_GET['nombre']:null;
$modelo->precio=isset($_GET['precio'])?$_GET['precio']:null;
$modelo->stock=isset($_GET['stock'])?$_GET['stock']:null;
$modelo->id_categoria=isset($_GET['id_categoria'])?$_GET['id_categoria']:null;
$modelo->format=isset($_GET['format'])?$_GET['format']:null;
$modelo->content=isset($_GET['content'])?$_GET['content']:null;
echo $item->android_modificar($modelo);