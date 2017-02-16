

        <?php
        header('Access-Control-Allow-Origin: *');
        require_once '../controlador/controlador_usuario_dispositivo.php';
        require_once '../modelo/modelo_usuario.php';
        $dato= new controlador_usuario_dispositivo();
        $modelo= new modelo_usuario();
        $modelo->id_usuario=  isset($_GET['id_usuario'])?$_GET['id_usuario']:null;
        echo $dato->android_listar_by_user($modelo)
        ?>
