<?php
// step 1. Conexión a la base de datos
require('../config/database.php');

// step 2. Obtener los datos del formulario
$citiname   = trim($_POST['citiname']);
$citiabbrev = trim($_POST['citiabbrev']);
$citicode   = trim($_POST['citicode']);
$region_id  = trim($_POST['region_id']); // viene del combo box

// step 3. Validar si la ciudad ya existe (por nombre o código)
$check_city = "
    SELECT c.citiname 
    FROM cities c 
    WHERE citiname = '$citiname' 
       OR citicode = '$citicode'
    LIMIT 1
";
$res_check = pg_query($conn_supa, $check_city);

if (pg_num_rows($res_check) > 0) {
    echo "<script>alert('City already exists')</script>";
    header('refresh:0;url=register-city.html');
    exit;
} else {
    // step 4. Crear la consulta INSERT
    $query = "
        INSERT INTO cities (citiname, citiabbrev, citicode, region_id)
        VALUES ('$citiname', '$citiabbrev', '$citicode', '$region_id')
    ";

    // step 5. Ejecutar la consulta
    $res = pg_query($conn_supa, $query);

    // step 6. Validar el resultado
    if ($res) {
        echo "<script>alert('City registered successfully!')</script>";
        header('refresh:0;url=cities-list.html');
    } else {
        echo "<script>alert('Something went wrong while saving the city.')</script>";
        header('refresh:0;url=register-city.html');
    }
}
?>
