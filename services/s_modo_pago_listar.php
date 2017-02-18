<?php
require_once '../controlador/controlador_modo_pago.php';
$modelo= new controlador_modo_pago();
echo $modelo->ListarModoPago();

