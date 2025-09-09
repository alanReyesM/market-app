<?php
  //step1. get database Access(llamar el acceso) 

    require('../config/database.php');
  //step2. get form-data

    $f_name    = $_POST['fname'];
    $l_name    = $_POST['lname'];
    $m_number  = $_POST['mnumber'];
    $id_number = $_POST['idnumber'];
    $e_mail    = $_POST['email'];
    $p_wd      = $_POST['passwd'];        //contraseña

  //step3. créate query to INSERT INTO
    $query = "INSERT INTO users (firstname,lastname,mobile_number,ide_number,email,password)
        values ('$f_name','$l_name','$m_number','$id_number','$e_mail','$p_wd')";

  //step4. execute query ejecutar el query (f5)
    $res = pg_query($conn, $query);
  
  //step5. validate result
    if($res){
        echo "User has been created successfully mor !!!";
    }else{
        echo "Sometime wrong!!";
    }

?>  