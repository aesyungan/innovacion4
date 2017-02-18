<?php
require_once '../controlador/controlador_modo_pago.php';
$item=new controlador_modo_pago;
$modelo=new modelo_modo_pago();
$modelo->num_pago=  isset($_GET['num_pago'])?$_GET['num_pago']:null;
$modelo->nombre=  isset($_GET['nombre'])?$_GET['nombre']:null;
$modelo->otros_detalles=isset($_GET['otros_detalles'])?$_GET['otros_detalles']:null;
echo $item->ActualizarModoPago($modelo);

