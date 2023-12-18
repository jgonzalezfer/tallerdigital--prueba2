<?php
include("src/db/configdb.php");
$conne = mysqli_connect($serve, $user, $pass, $bd);

if (!$conne) {
    echo "Error en la conexión";
} else {
    echo "Conexión exitosa";
}

if (isset($_POST['export'])) {
    function exportToCSV($data) {
        $file = fopen('data.xml', 'w');
        foreach ($data as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }

    $exportData = array();
    for ($i = 1; $i <= 100; $i++) {
        $Query = "SELECT * FROM `tbl_comuna` WHERE id = ? AND (name LIKE 'M%' OR name LIKE '%M')";
        $stmt = mysqli_prepare($conne, $Query);
        mysqli_stmt_bind_param($stmt, "i", $i);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $exportData[] = $row;
            }
            mysqli_free_result($result);
        } else {
            echo "Error in query execution: " . mysqli_error($conne);
        }
    }

    exportToCSV($exportData);

    echo "dato. <a href='data.xml' download>Download CSV</a>";
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

    <form method="post">
        <button type="submit" name="export">Export Data</button>
    </form>

    <table>
        <tr>
            <th>id</th>
            <th>nombre</th>
        </tr>

        <?php
        for ($i = 1; $i <= 100; $i++) {
            $Query = "SELECT * FROM `tbl_comuna` WHERE id = $i AND name LIKE 'M%' or name Like'%M' ";
            $result = mysqli_query($conne, $Query);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "</tr>";
                }
                mysqli_free_result($result);
            } else {
                echo "Error in query execution: " . mysqli_error($conne);
            }
        }
        ?>
    </table>
</body>

</html>
