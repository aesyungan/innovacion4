<?php
class controlador_detalle extends connect {
    //lsitar
    public function android_listar() {
        $consulta = "SELECT * FROM `Detalle` ";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Error no existe datos";
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["detalles"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["num_detalle"] = $dato["id_categoria"];
                $item["num_factura"] = $dato["nombre"];
                $item["id_producto"] = $dato["descripcion"];
                $item["catidad"] = $dato["descripcion"];
                $item["precio"] = $dato["descripcion"];
                array_push($res["detalles"], $item);
            }
        }
        return json_encode($res);
    }
    //insertar
    public function android_insertar(modelo_detalle $item) {
        $consulta = "INSERT INTO `Detalle`(`num_factura`, `id_producto`, `catidad`, `precio`) VALUES ('$item->num_factura','$item->id_producto','$item->catidad',$item->precio)";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }

    public function android_modificar(modelo_detalle $item) {
        $consulta = "UPDATE `Detalle` SET `num_factura`='$item->num_factura',`id_producto`='$item->id_producto',`catidad`='$item->catidad',`precio`='$item->precio' WHERE num_detalle=$item->num_detalle";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }

    public function android_eliminar(modelo_detalle $item) {


        $consulta = "DELETE FROM `Detalle` WHERE num_detalle=$item->num_detalle";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }

}
