<?php

require_once '../controlador/controlador_factura.php';
$item=new controlador_factura();

$modelo=new modelo_factura();
$modelo->num_factura=  isset($_GET['num_factura'])?$_GET['num_factura']:null;
echo $item->EliminarFactura($modelo);

