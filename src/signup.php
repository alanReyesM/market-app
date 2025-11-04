<?php
  //step1. get database Access(llamar el acceso) 

    require('../config/database.php');
  //step2. get form-data

    $f_name    = trim($_POST['fname']);
    $l_name    = trim($_POST['lname']);
    $m_number  = trim($_POST['mnumber']);
    $id_number = trim($_POST['idnumber']);
    $e_mail    = trim($_POST['email']);
    $p_wd      = trim($_POST['passwd']);        //contraseña

    $enc_pass = password_hash($p_wd, PASSWORD_DEFAULT);
    // /*jamas usar */$enc_pass = md5($p_wd);
    //validar si hay datos existentes 
    $check_email = "select u.email from users u where email = '$e_mail' or ide_number = '$id_number' limit 1 ";
   $res_check = pg_query($conn_local, $check_email);
   if(pg_num_rows($res_check) > 0){
       echo "<script>alert('user already exists')</script>";
       header('refresh:0;url=signup.html');
   }else{
     //step3. créate query to INSERT INTO
    $query = "INSERT INTO users (firstname,lastname,mobile_number,ide_number,email,password)
         values ('$f_name','$l_name','$m_number','$id_number','$e_mail','$enc_pass')";
          //step4. execute query ejecutar el query (f5)
          $res = pg_query($conn_local, $query);
          //step5. validate result
          if($res){
         //echo "User has been created successfully mor !!!";
          echo "<script>alert('success !! Go to login')</script>";
          header('refresh:0;url=signin.html');
            }else{
          echo "Sometime wrong!!";
          }
     }

?>  