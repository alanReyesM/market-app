<?php
require('../config/database.php');

$user_id = $_GET['userId'];

$sql_delete_user= "delete from users where id= $user_id";
$result = pg_query($conn_local, $sql_delete_user);
if(!$result){
    die("error; ". pg_last_error());
}else{
    echo"<script>alert('user has been deleted!')</script>";
header('refresh:0;url=list_users.php');
}


?>