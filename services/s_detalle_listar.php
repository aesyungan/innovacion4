<?php
require_once '../controlador/controlador_detalle.php';
$modelo= new controlador_detalle();
echo $modelo->android_listar();