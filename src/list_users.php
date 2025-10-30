<?php
    require('../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Marketapp - List users</title>
    <style>
    .table tbody tr {
        background-color: #f9f9f9; 
    }
    .table tbody tr:hover {
        background-color: #e3e3e3; 
    }
   </style>
</head>
<body>
    <div class="container mt-3">
    <table border="1" align="center" class="table"> >
         <thead class="table-dark">
        <tr>
           <th>Fullname</th>
           <th>E-mail</th>
           <th>ide. number</th>
           <th>Phone number</th>
           <th>Status</th>
           <th>Options</th> 
        </tr> </thead >
        <tbody>
        <?php
            $sql_users="
            select 
             u.id as user_id,
            u.firstname  || ' ' || u.lastname as fullname,
            u.email,
            u.ide_number,
            u.mobile_number,
                case
                    when u.status = true then 'Active' else 'Inactive'
                end
            from 
                users as u
            ";   
            $result = pg_query($conn_local, $sql_users);
            if(!$result){
                die("error:". pg_last_error());
            }    
            while ($row=pg_fetch_assoc($result)){
             echo"
                <tr>
                    <td>".$row['fullname'] ."</td>
                    <td>".$row['email'] ."</td>
                    <td>".$row['ide_number'] ."</td>
                    <td>".$row['mobile_number'] ."</td>
                    <td>active</td>
                    <td>
                            <a href='#'>
                              <img src='icons/search.png' width='30'>
                            </a>
                            <a href='edit_user_form.php?userId=". $row['user_id']."'>
                                <img src='icons/update.png' width='30'>
                            </a>
                            <a href='delete_user.php?userId=". $row['user_id']."'>
                                <img src='icons/delete.png' width='30'>
                            </a>
                    </td> 
              </tr>";
            }
        ?>  
        </tbody> 
    </table>  
    </div>  
</body>
</html>