<?php
include("src/db/configdb.php");
$conne = mysqli_connect($serve, $user, $pass, $bd);
if (!$conne) {
    echo "Error en la conexión";
} else {
    echo "Conexión exitosa";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>taller digital</h1>
    <table>
        <tr>
            <th>id</th>
            <th>nombre</th>
        </tr>
        <?php



        ?>

</body>

</html>