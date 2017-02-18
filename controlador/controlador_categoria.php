<?php

require_once '../modelo/modelo_categoria.php';
require_once '../modelo/connect.php';

class controlador_categoria extends connect {

    //lsitar
    public function android_listar() {
        $consulta = "SELECT * FROM Categoria";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Correcto...";
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["categorias"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["id_categoria"] = $dato["id_categoria"];
                $item["nombre"] = $dato["nombre"];
                $item["descripcion"] = $dato["descripcion"];
                array_push($res["categorias"], $item);
            }
        } else {
            $res["success"] = 0;
            $res["messages"] = "Error no existe datos";
        }
        return json_encode($res);
    }

    //insertar

    public function android_insertar(modelo_categoria $item) {
        $item = new modelo_categoria();

        $consulta = "INSERT INTO `Categoria`(`nombre`, `descripcion`) VALUES ($item->nombre,$item->descripcion)";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Error..";
        $res = array();
        if (mysql_affected_rows($res_consulta)>=0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
        }
        return json_encode($res);
    }

}
