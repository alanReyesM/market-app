<?php
// step 1. Conexión a la base de datos
require('../config/database.php');

// step 2. Obtener los datos del formulario
$reginame   = trim($_POST['reginame']);
$regiabbrev = trim($_POST['regiabbrev']);
$regicode   = trim($_POST['regicode']);
$country_id = trim($_POST['country_id']); // viene del combo box

// step 3. Validar si la región ya existe (por nombre o código)
$check_region = "
    SELECT r.reginame 
    FROM regions r 
    WHERE reginame = '$reginame' 
       OR regicode = '$regicode'
    LIMIT 1
";
$res_check = pg_query($conn_supa, $check_region);

if (pg_num_rows($res_check) > 0) {
    echo "<script>alert('Region already exists')</script>";
    header('refresh:0;url=register-region.html');
    exit;
} else {
    // step 4. Crear la consulta INSERT
    $query = "
        INSERT INTO regions (reginame, regiabbrev, regicode, country_id)
        VALUES ('$reginame', '$regiabbrev', '$regicode', '$country_id')
    ";

    // step 5. Ejecutar la consulta
    $res = pg_query($conn_supa, $query);

    // step 6. Validar el resultado
    if ($res) {
        echo "<script>alert('Region registered successfully!')</script>";
        header('refresh:0;url=regions-list.html');
    } else {
        echo "<script>alert('Something went wrong while saving the region.')</script>";
        header('refresh:0;url=register-region.html');
    }
}
?>
