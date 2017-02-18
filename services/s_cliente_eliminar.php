<?php

require_once '../controlador/controlador_cliente.php';
$item=new controlador_cliente();
$modelo=new modelo_cliente();
$modelo->id_cliente=  isset($_GET['id_cliente'])?$_GET['id_cliente']:null;
echo $item->elimianr_cliente($modelo);
