<?php 

$user = $_POST['user'];

$password = $_POST['password'];

$dus_usr = new mysqli("mysql-server","root","secret","login");


if (!$info->connect_errno){
   
}

else {
    echo "no se puedo conectar a la base de datos";
}

$res = $dus_usr->query("SELECT * FROM `info` WHERE `user`='$user' and `pas`= '$password'");

if ($res->num_rows==1){
    
    session_start();
    $_SESSION['user']=$user;
    $_SESSION['password']=$password;
    header("Location: mainpage.php");
}
else {
    echo "<br/> Verifica tu contraseña ";
}
    
?>
