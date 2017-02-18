<?php
require_once '../controlador/controlador_producto.php';
$item=new controlador_producto();
echo $item->android_listar();
