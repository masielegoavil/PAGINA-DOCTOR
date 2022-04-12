<?php 


$dus_usr = new mysqli("mysql-server","root","secret","login");


if (!$dus_usr->connect_errno){
    echo "base de datos coenctada" ;
    
       
   
}

else {
    echo "no puede conectar";
}


    
?>
