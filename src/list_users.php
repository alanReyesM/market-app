<?php
//s
    require('../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketapp - List users</title>
</head>
<body>
    <table border="1" align="center">
        <tr> 
        </tr>
        <tr>
           <th>Fullname</th>
           <th>E-mail</th>
           <th>ide. number</th>
           <th>Phone number</th>
           <th>Status</th>
           <th>Options</th> 
        </tr>
        <?php

        ?> 
        <tr>
           <td>joe doe</td>
           <td>joe@gmail.com</td>
           <td>1221212</td>
           <td>78545485</td>
           <td>active</td>
           <td>
            <a href="#">
                <img src="icons/search.png" width="30">
            </a>
            <a href="#">
                <img src="icons/update.png" width="30">
            </a>
            <a href="#">
                <img src="icons/delete.png" width="30">
            </a>
           </td> 
        </tr>   
    </table>    
</body>
</html>