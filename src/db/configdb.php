<?php
$serve = "localhost";
$user = "root";
$pass = "";
$bd = "datostaller";

$conne = mysqli_connect($serve, $user, $pass, $bd);

if (!$conne) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

?>