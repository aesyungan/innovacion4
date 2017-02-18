<?php

/**
 * Description of controlador_modo_pago
 *
 * @author Enrique
 */

require_once '../modelo/modelo_modo_pago.php';
require_once '../modelo/connect.php';

class controlador_modo_pago extends connect {
    //listar
    public function ListarModoPago() {
        $consulta = "SELECT * FROM Modo_Pago";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 0;
        $res["messages"] = "Correcto...";
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["modo_pago"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["num_pago"] = $dato["num_pago"];
                $item["nombre"] = $dato["nombre"];
                $item["otros_detalles"] = $dato["otros_detalles"];
                
                array_push($res["modo_pago"], $item);
            }
        } else {
            $res["success"] = 0;
            $res["messages"] = "Error no existe datos";
        }
        return json_encode($res);
    }
    //insertar

    public function InsertarModoPago(modelo_modo_pago $item) {
       

        $consulta = "INSERT INTO `Modo_Pago`(`nombre`, `otros_detalles`) VALUES ('$item->nombre','$item->otros_detalles')";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
    public function ActualizarModoPago(modelo_modo_pago $item) {
       

        $consulta = "UPDATE `Modo_Pago` SET `nombre`='$item->nombre',`otros_detalles`='$item->otros_detalles' WHERE `num_pago`=$item->num_pago";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
    }
    public function EliminarModoPago(modelo_modo_pago $item) {
       

        $consulta = "DELETE FROM `Modo_Pago`  WHERE `num_pago`=$item->num_pago";
        $res_consulta = $this->conectar($consulta);
        $res["success"] = 1;
        $res["messages"] = "Correcto..";
        return json_encode($res);
}


        }