<?php
require_once '../controlador/controlador_factura.php';
$item=new controlador_factura();
$modelo=new modelo_factura();
$modelo->num_factura=isset($_GET['num_factura'])?$_GET['num_factura']:null;
$modelo->id_cliente=isset($_GET['id_cliente'])?$_GET['id_cliente']:null;
$modelo->fecha=isset($_GET['fecha'])?$_GET['fecha']:null;
$modelo->num_pago=isset($_GET['num_pago'])?$_GET['num_pago']:null;
echo $item->ModificarFactura($modelo);
