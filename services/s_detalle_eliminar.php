<?php
require_once '../controlador/controlador_detalle.php.php';
$item=new controlador_detalle();
$modelo=new modelo_detalle();
$modelo->num_detalle=  isset($_GET['num_detalle'])?$_GET['num_detalle']:null;
echo $item->android_eliminar($modelo);

