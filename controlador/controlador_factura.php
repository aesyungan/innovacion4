<?php
class controlador_factura extends connect {
   public function ListarFactura() {
        $consulta = "SELECT * FROM `Factura` ";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Correcto...";
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["factura"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["num_factura"] = $dato["num_factura"];
                $item["id_cliente"] = $dato["nombre"];
                $item["fecha"] = $dato["fecha"];
                $item["num_pago"] = $dato["num_pago"];
                
                array_push($res["factura"], $item);
            }
        } else {
            $res["success"] = 0;
            $res["messages"] = "Error no existe datos";
        }
        return json_encode($res);
    }

    //insertar

    public function InsertarFactura(modelo_factura $item) {
       

        $consulta = "INSERT INTO `Factura` (`num_factura`, `id_cliente`, `fecha`, `num_pago`) VALUES ('$item->num_factura', '$item->id_cliente', '$item->fecha', '$item->num_pago')";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
    public function ModificarFactura(modelo_factura $item) {
       

        $consulta = "UPDATE `Factura` SET`num_factura`='$item->num_factura',`id_cliente`='$item->id_cliente',`fecha`='$item->fecha',`num_pago`=$item->num_pago, WHERE num_factura=$item->num_factura";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
    public function EliminarFactura(modelo_factura $item) {
       

        $consulta = "DELETE FROM `Factura` WHERE num_factura=$item->num_factura";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
}

