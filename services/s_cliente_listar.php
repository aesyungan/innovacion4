<?php
require_once '../controlador/controlador_cliente.php';
$modelo= new controlador_cliente();
echo $modelo->listar_cliente();

