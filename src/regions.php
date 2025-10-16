<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marquek - Register Region</title>
    <link rel="icon" type="image/png" href="../src/icons/market_main.png" />
</head>
<body>
    <center><h1>Register - Regions</h1></center>

    <?php
        // Llamar la conexión a la base de datos
        require('../config/database.php');

        // Obtener los países registrados
        $query = "SELECT id, couname FROM countries ORDER BY couname ASC";
        $result = pg_query($conn_supa, $query);
    ?>

    <form name="register-region" action="regions1.php" method="post">
        <table border="15" align="center">
            <tr><td><label>Region Name:</label></td></tr>
            <tr><td><input type="text" name="reginame" placeholder="Enter region name" required></td></tr>

            <tr><td><label>Abbrev:</label></td></tr>
            <tr><td><input type="text" name="regiabbrev" placeholder="Enter region abbrev" required></td></tr>

            <tr><td><label>Code:</label></td></tr>
            <tr><td><input type="text" name="regicode" placeholder="Enter region code" required></td></tr>

            <!-- COMBO BOX DE PAÍSES -->
            <tr><td><label>Country:</label></td></tr>
            <tr>
                <td>
                    <select name="country_id" required>
                        <option value="">-- Select a country --</option>
                        <?php
                            if ($result && pg_num_rows($result) > 0) {
                                while ($row = pg_fetch_assoc($result)) {
                                    echo "<option value='{$row['id']}'>{$row['couname']}</option>";
                                }
                            } else {
                                echo "<option value=''>No countries found</option>";
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
