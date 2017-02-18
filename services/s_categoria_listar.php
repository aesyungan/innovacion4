<?php
require_once '../controlador/controlador_categoria.php';
$modelo= new controlador_categoria();
echo $modelo->android_listar();