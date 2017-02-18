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
}
