<?php
 require_once '../controlador/controlador_cliente.php';
  require_once '../modelo/modelo_cliente.php';
$item= new controlador_cliente();
$modelo=new modelo_cliente();
$modelo->cedula=  isset($_GET['cedula'])?$_GET['cedula']:null;
$modelo->password=isset($_GET['password'])?$_GET['password']:null;
//cachetes mandarina
//$modelo->cedula= "0603697891";
//$modelo->password="cuak";
echo $item->Logear($modelo);

