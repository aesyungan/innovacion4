<?php
require_once '../controlador/controlador_categoria.php';
$item=new controlador_categoria();
$modelo=new modelo_categoria();
$modelo->id_categoria=  isset($_GET['id_categoria'])?$_GET['id_categoria']:null;
echo $item->android_eliminar($modelo);

