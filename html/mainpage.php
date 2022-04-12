<?php 
session_start();
if (isset($_SESSION['user']))
{   
?>









<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Shepherd General Hospital</title>
	<link rel="stylesheet" href="stylemain.css">
</head>
<body>
	<div class="wrapper">
<!---------------------barra de menu/navegacion---------------------------->
			<nav class="navbar">
				<img class="logo" src="logo1.jpg">
				<ul>
					<li><a class="active" href="mainpage.php">Home</a></li>
<!-------------------------submenú doctors-------------------------------->
					<li><a href="#">Doctors<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registrodoc.php">New</a></li>
                            <li><a href="modidoc.php">Modify</a></li>
                            <li><a href="searchdoc.php">Search</a></li>
                        </ul>
                    </li>
<!-------------------------submenú pacientes-------------------------------->
                    <li><a href="#">Patients<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registropat.php">New</a></li>
                            <li><a href="modipat.php">Modify</a></li>
                            <li><a href="searchpat.php">Search</a></li>
                        </ul>
                    </li>
<!-------------------------submenú citas-------------------------------->
                    <li><a href="#">Appointments<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registroapp.php">New</a></li>
                            <li><a href="modiapp.php">Modify</a></li>
                            <li><a href="searchapp.php">Search</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php">Log Out</a></li>
				</ul>
			</nav>
			<div class="center">
                <h1>Welcome to My Shepherd General Hospital</h1>
			    
		    </div>
    </div>
</body>
</html>







<?php
}

else
{
    header("Location: loginbonito.php");
}


?>