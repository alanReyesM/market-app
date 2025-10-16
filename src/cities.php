<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marquek - Register City</title>
    <link rel="icon" type="image/png" href="../src/icons/market_main.png" />
</head>
<body>
    <center><h1>Register - Cities</h1></center>

    <?php
        // Llamar la conexión a la base de datos
        require('../config/database.php');

        // Obtener las regiones registradas
        $query = "SELECT id, reginame FROM regions ORDER BY reginame ASC";
        $result = pg_query($conn_supa, $query);
    ?>

    <!-- Aquí cambiamos regions1.php -> cities1.php -->
    <form name="register-cities" action="cities1.php" method="post">
        <table border="15" align="center">
            <tr><td><label>City Name:</label></td></tr>
            <tr><td><input type="text" name="citiname" placeholder="Enter city name" required></td></tr>

            <tr><td><label>Abbrev:</label></td></tr>
            <tr><td><input type="text" name="citiabbrev" placeholder="Enter city abbrev" required></td></tr>

            <tr><td><label>Code:</label></td></tr>
            <tr><td><input type="text" name="citicode" placeholder="Enter city code" required></td></tr>

            <!-- COMBO BOX DE REGIONES -->
            <tr><td><label>Region:</label></td></tr>
            <tr>
                <td>
                    <select name="region_id" required>
                        <option value="">-- Select a region --</option>
                        <?php
                            if ($result && pg_num_rows($result) > 0) {
                                while ($row = pg_fetch_assoc($result)) {
                                    echo "<option value='{$row['id']}'>{$row['reginame']}</option>";
                                }
                            } else {
                                echo "<option value=''>No regions found</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr><td style="text-align: center;">
                <button style="background-color: rgb(214, 148, 148); color: rgb(0, 0, 0); 
                padding: 5px 10px; border: 1px solid rgb(46, 46, 46); cursor: pointer;">Register</button>
            </td></tr>
        </table>
    </form>
</body>
</html>
