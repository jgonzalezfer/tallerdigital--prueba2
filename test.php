<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>hola</h1>
    <?php
    function open ($path) {
        $gestor = opendir($path);
        while (($archivo = readdir($gestor)) !== false) {
            if ($archivo != "." && $archivo != "..") {
                echo "$archivo\n";
            }
        }
        closedir($gestor);
    }
    open('.');
    ?>


</body>

</html>