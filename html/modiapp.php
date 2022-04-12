<?php 
session_start();
if (isset($_SESSION['user']))
{   
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify Appointment</title>
    <link rel="stylesheet" href="stylemodapp.css">
</head>
<body>
    <nav class="navbar">
				<img class="logo" src="logo1.jpg">
				<ul>
					<li><a href="mainpage.php">Home</a></li>
                    <li><a href="#">Doctors<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registrodoc.php">New</a></li>
                            <li><a href="modidoc.php">Modify</a></li>
                            <li><a href="searchdoc.php">Search</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Patients<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registropat.php">New</a></li>
                            <li><a href="modipat.php">Modify</a></li>
                            <li><a href="searchpat.php">Search</a></li>
                        </ul>
                    </li>
                    <li><a class= "active" href="#">Appointments<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registroapp.php">New</a></li>
                            <li><a href="modiapp.php">Modify</a></li>
                            <li><a href="searchapp.php">Search</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php">Log Out</a></li>
				</ul>
    </nav>

    
    
    <?php

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM appointment";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>


<table style="margin-top: 80px">
            <tr id="header">
                <th>ID</th>
                <th>Doctor ID</th>
                <th>Patient ID</th>
                <th>Date</th>
                <th>Office</th>
                <th>Symtoms</th>
                <th>Sickness</th>
                <th>Previous Medication</th>
                <th>Price</th>
                <th>Notes</th>
                <th>Status of Appointment</th>
                <th>Status of Payment</th>
                <th>Edit</th>
                <th>Delete</th>
    </tr>
  

  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
                
                <td><?php echo escape($row["doctorID"]); ?></td>
                <td><?php echo escape($row["patientID"]); ?></td>
                <td><?php echo escape($row["date"]); ?></td>
                <td><?php echo escape($row["office"]); ?></td>
                <td><?php echo escape($row["symtoms"]); ?> </td>
                <td><?php echo escape($row["sickness"]); ?></td>
                <td><?php echo escape($row["prev_med"]); ?></td>
                <td><?php echo escape($row["price"]); ?></td>
                <td><?php echo escape($row["notes"]); ?></td>
                <td><?php echo escape($row["stat_app"]); ?></td>
                <td><?php echo escape($row["stat_pay"]); ?></td>
      <td><a href="editapp.php?id=<?php echo escape($row["id"]); ?>">Edit</a>
     <td><a href="deleteapp.php?id=<?php echo escape($row["id"]); ?>">Delete</a>
  </tr>
  <?php endforeach; ?>

</table>


 <style type="text/css">
     
     
     *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'arial';
}

body{
    /*justify-content: center;*/
    /*align-items: center;*/
    padding: 100px 0px 20px;
    background-image: url("doctores1.jpg");
    background-size: cover;
    
}

.navbar{
	position: fixed;
	height: 80px;
	width: 100%;
	top: 0;
	left: 0;
	background: white;
    z-index: 1001;
    left:0;
    top:0;
    right:0;
}
.navbar .logo{
	width: 290px;
	height: auto;
	padding: 10px 40px;
}
.navbar ul{
	float: right;
	margin-right: 20px;
}
.navbar ul li{
	list-style: none;
	margin: 0 8px;
	display: inline-block;
	line-height: 80px;
}
.navbar ul li a{
	font-size: 20px;
	font-family: arial ;
	color: black;
	padding: 10px 25px;
	text-decoration: none;
	transition: 0s;
}
.navbar ul li a.active,
.navbar ul li a:hover{
	background: rgb(68, 114, 196);
	border-radius: 25px;
    color: #fff;
}

.navbar ul ul{
  position: absolute;
  top: 85px;
  border-top: 3px solid black;
  opacity: 0;
  visibility: hidden;
  background: white;

  
}
.navbar ul li:hover > ul{
  top: 75px;
  opacity: 1;
  visibility: visible;
  transition: .3s linear;
}
.navbar ul ul li{
  width: 120px;
  font-size: 15px;
  display: list-item;
  position: relative;
  border: none;
  height: 70px;
}

table {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border-collapse: collapse;
        width: 800px;
        height: 200px;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    
    
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        background-color: #fff;
    }
    
    #header {
        background-color: rgb(68, 114, 196);
        color: #fff;
    }
    

    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
    }
     
    </style>    
    
</body>    
</html>






<?php
}

else
{
    header("Location: loginbonito.php");
}


?>