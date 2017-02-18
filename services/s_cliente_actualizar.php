<?php
require_once '../controlador/controlador_cliente.php';
$item=new controlador_cliente();
$modelo=new modelo_cliente();
$modelo->id_cliente=  isset($_GET['id_cliente'])?$_GET['id_cliente']:null;
$modelo->nombre=  isset($_GET['nombre'])?$_GET['nombre']:null;
$modelo->apellido=isset($_GET['apellido'])?$_GET['apellido']:null;
$modelo->direccion=  isset($_GET['direccion'])?$_GET['direccion']:null;
$modelo->fecha_nacimiento=  isset($_GET['fecha_nacimiento'])?$_GET['fecha_nacimiento']:null;
$modelo->telefono=isset($_GET['telefono'])?$_GET['telefono']:null;
$modelo->email=  isset($_GET['email'])?$_GET['email']:null;
$modelo->foto=  isset($_GET['foto'])?$_GET['foto']:null;

echo $item->modificar_cliente($modelo);


