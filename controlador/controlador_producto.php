<?php

class controlador_producto extends connect {
   public function android_listar() {
        $consulta = "SELECT * FROM Producto";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Correcto...";
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["productos"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["id_categoria"] = $dato["id_categoria"];
                $item["nombre"] = $dato["nombre"];
                $item["descripcion"] = $dato["descripcion"];
                array_push($res["productos"], $item);
            }
        } else {
            $res["success"] = 0;
            $res["messages"] = "Error no existe datos";
        }
        return json_encode($res);
    }

    //insertar

    public function android_insertar(modelo_producto $item) {
       

        $consulta = "INSERT INTO `Producto` (`nombre`, `precio`, `stock`, `id_categoria`, `format`, `content`) VALUES ('$item->nombre', '$item->precio', '$item->stock', '$item->id_categoria','$item->format','$item->content')";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
    public function android_modificar(modelo_categoria $item) {
       

        $consulta = "UPDATE `Categoria` SET `nombre`='$item->nombre',`descripcion`='$item->descripcion' WHERE `id_categoria`=$item->id_categoria";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
    public function android_eliminar(modelo_producto $item) {
       

        $consulta = "DELETE FROM `Producto` WHERE id_producto=$item->id_producto";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
}
