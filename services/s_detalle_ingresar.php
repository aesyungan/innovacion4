<?php
require_once '../controlador/controlador_detalle.php.php';
$item=new controlador_detalle();
$modelo=new modelo_detalle();
//$modelo->num_detalle=isset($_GET['num_detalle'])?$_GET['num_detalle']:null;
$modelo->num_factura=isset($_GET['num_factura'])?$_GET['num_factura']:null;
$modelo->id_producto=isset($_GET['id_producto'])?$_GET['id_producto']:null;
$modelo->catidad=isset($_GET['catidad'])?$_GET['catidad']:null;
$modelo->precio=isset($_GET['precio'])?$_GET['precio']:null;
echo $item->android_insertar($modelo);

