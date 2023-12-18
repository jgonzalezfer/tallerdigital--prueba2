<?php
function listarArchivosDirectorios($ruta = '/tallerdigital--prueba2') {
    if ($gestor = opendir($ruta)) {
        while (false !== ($archivo = readdir($gestor))) {
            if ($archivo != "." && $archivo != "..") {
                $rutaCompleta = $ruta . '/' . $archivo;

                echo $rutaCompleta . PHP_EOL;

                if (is_dir($rutaCompleta)) {
                    listarArchivosDirectorios($rutaCompleta);
                }
            }
        }
        closedir($gestor);
    }
}

listarArchivosDirectorios();
?>
