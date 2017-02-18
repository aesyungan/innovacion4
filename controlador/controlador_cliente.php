<?php

require_once '../modelo/modelo_categoria.php';
require_once '../modelo/connect.php';

class controlador_cliente extends connect {

    //lsitar
    public function listar_cliente() {
        $consulta = "SELECT * FROM Cliente";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Correcto...";
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["clientes"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["id_cliente"] = $dato["id_cliente"];
                $item["nombre"] = $dato["nombre"];
                $item["apellido"] = $dato["apellido"];
                $item["direccion"] = $dato["direccion"];
                $item["fecha_nacimiento"] = $dato["fecha_nacimiento"];
                $item["telefono"] = $dato["telefono"];
                $item["email"] = $dato["email"];
                 $item["foto"] = $dato["foto"];
                array_push($res["clientes"], $item);
            }
        } else {
            $res["success"] = 0;
            $res["messages"] = "Error no existe datos";
        }
        return json_encode($res);
    }

    //insertar
       public function InsertarCliente(modelo_cliente $item) {
        $consulta = "INSERT INTO `Cliente`(`nombre`, `apellido`,`cedula`, `password`,`bono`,`direccion`, `fecha_nacimiento`,`telefono`, `email`,`foto`) VALUES ('$item->nombre','$item->apellido','$item->cedula','$item->password','$item->bono','$item->direccion','$item->fecha_nacimiento','$item->telefono','$item->email','$item->foto')";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }

    public function modificar_cliente(modelo_cliente $item) {


        $consulta = "UPDATE `Cliente` SET `nombre`='$item->nombre',`apellido`='$item->apellido',`direccion`='$item->direccion',`fecha_nacimiento`='$item->fecha_nacimiento',`foto`='$item->foto',`email`='$item->email',`nombre`='$item->nombre' WHERE `id_categoria`=$item->id_categoria";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }

    public function android_eliminar(modelo_categoria $item) {


        $consulta = "DELETE FROM `Cliente`  WHERE `id_cliente`=$item->id_cliente";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }

}

