<?php

require_once '../controlador/controlador_factura.php';
$item=new controlador_factura();
echo $item->ListarFactura();


