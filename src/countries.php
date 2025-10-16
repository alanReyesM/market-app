<?php
  // step 1. Importar conexión a base de datos
  require('../config/database.php');

  // step 2. Obtener los datos del formulario
  $country_name = trim($_POST['Couname']);
  $abbrev       = trim($_POST['abbrev']);
  $code         = trim($_POST['code']);

  // step 3. Validar si el país ya existe (por nombre, abreviatura o código)
  $check_country = "
      SELECT c.couname 
      FROM countries c 
      WHERE couname = '$country_name' 
         OR abbrev = '$abbrev' 
         OR code = '$code' 
      LIMIT 1
  ";

  $res_check = pg_query($conn_supa, $check_country);

  if (pg_num_rows($res_check) > 0) {
      echo "<script>alert('Country already exists')</script>";
      header('refresh:0;url=register-countries.html');
  } else {
      // step 4. Crear query de inserción
      $query = "
          INSERT INTO countries (couname, abbrev, code)
          VALUES ('$country_name', '$abbrev', '$code')
      ";

      // step 5. Ejecutar query
      $res = pg_query($conn_supa, $query);

      // step 6. Validar resultado
      if ($res) {
          echo "<script>alert('Country registered successfully!')</script>";
          header('refresh:0;url=countries-list.html');
      } else {
          echo "<script>alert('Something went wrong while saving the country.')</script>";
          header('refresh:0;url=register-countries.html');
      }
  }
?>

