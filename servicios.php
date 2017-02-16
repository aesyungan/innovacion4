<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>Lista De Servicios format Json</title>
        <link rel="stylesheet" href="vista/css/servicios.css">
    </head>
    <body>
        <header>
            <h2>Lista De Servicios Web Format Json</h2>
        </header>
        <section>
            <?php

            function obtener_estructura_directorios($ruta) {
                // Se comprueba que realmente sea la ruta de un directorio
                if (is_dir($ruta)) {
                    // Abre un gestor de directorios para la ruta indicada
                    $gestor = opendir($ruta);
                    echo "<ul>";
                    // Recorre todos los elementos del directorio
                    while (($archivo = readdir($gestor)) !== false) {
                        $ruta_completa = $ruta . "/" . $archivo;
                        // Se muestran todos los archivos y carpetas excepto "." y ".."
                        if ($archivo != "." && $archivo != "..") {
                            // Si es un directorio se recorre recursivamente

                            if (is_dir($ruta_completa)) {
                                echo "<li>" . $archivo . "</li>";//cuando es carpeta
                                obtener_estructura_directorios($ruta_completa);
                            } else {
                                echo "<li><a target='_blank' href='" . $ruta . "/" . $archivo . "'>" . $archivo . "</a></li>";
                            }
                        }
                    }
                    // Cierra el gestor de directorios
                    closedir($gestor);
                    echo "</ul>";
                } else {
                    echo "No es una ruta de directorio valida<br/>";
                }
            }

            $ruta = "/services";
            $ruta_ini = ".";
            echo obtener_estructura_directorios($ruta_ini . $ruta);
            ?>
        </section>
        <footer>
            <div class='define'>
                <p>© 2017-2022 Yungan Alex. Todos los derechos reservados.  <i>ayungan.fis@unach.edu.ec</i></p>
            </div>
        </footer>
    </body>
</html>
