<?php
require_once '../modelo/connect.php';
class controlador_producto extends connect {
    
   public function android_listar() {
        $consulta = "SELECT p.id_producto,p.nombre,p.precio,p.stock,p.format,p.content,c.id_categoria,c.nombre as categoria_nombre,c.descripcion FROM Producto as p INNER JOIN Categoria as c on c.id_categoria=p.id_categoria";
        $res_consulta = $this->conectar($consulta);
       
        $res = array();
        if (mysqli_num_rows($res_consulta) > 0) {
            $res["success"] = 1;
            $res["messages"] = "Correcto..";
            $res["productos"] = array();
            while ($dato = mysqli_fetch_array($res_consulta)) {
                $item = array();
                $item["id_producto"] = $dato["id_producto"];
                $item["nombre"] = $dato["nombre"];
                $item["precio"] = $dato["precio"];
                $item["stock"] = $dato["stock"];
                $item["format"] = $dato["format"];
                $item["content"] = $dato["content"];
                $item["id_categoria"] = $dato["id_categoria"];
                $item["categoria_nombre"] = $dato["categoria_nombre"];
                $item["descripcion "] = $dato["descripcion"];
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
    public function android_modificar(modelo_producto $item) {
       

        $consulta = "UPDATE `Producto` SET`nombre`='$item->nombre',`precio`='$item->precio',`stock`='$item->stock',`id_categoria`=$item->id_categoria,`format`='$item->format',`content`='$item->content' WHERE id_producto=$item->id_producto";
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
