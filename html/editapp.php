<?php 
session_start();
if (isset($_SESSION['user']))
{   
?>









<?php

require "config.php";
require "common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $user =[
      "id" => $_POST['id'],
      "doctorID"  => $_POST['doctorID'],
      "patientID"     => $_POST['patientID'],
      "date"       => $_POST['date'],
      "office"  => $_POST['office'],
      "symtoms"  => $_POST['symtoms'],
      "sickness"     => $_POST['sickness'],
      "prev_med"       => $_POST['prev_med'],
      "price"  => $_POST['price'],
      "notes"       => $_POST['notes'],
      "stat_app"  => $_POST['stat_app'],
      "stat_pay"  => $_POST['stat_pay']
    ];

    $sql = "UPDATE appointment
            SET id = :id,
              doctorID = :doctorID,
              patientID = :patientID,
              date = :date,
              office = :office,
              symtoms = :symtoms,
              sickness = :sickness,
              prev_med = :prev_med,
              price = :price,
              notes = :notes,
              stat_app = :stat_app,
              stat_pay = :stat_pay
            WHERE id = :id";

  $statement = $connection->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM appointment WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "¡Algo salio mal!";
    exit;
}
?>


<?php if (isset($_POST['submit']) && $statement) : ?>
  <?php echo escape($_POST['name']); ?> actualizado exitosamente.
<?php endif; ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="styleeditapp.css">
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
   <div class="container">
        <div class="title" >Edit Appointment</div>
<form method="post">     
    <?php foreach ($user as $key => $value) : ?>
    <div class="appointment-details">  
    <div class="input-box">
      <label class="details" for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
        </div>
    </div>
    <?php endforeach; ?>
    
            <div class="button">
                <input type="submit" name="submit" value="Update">
            </div>
    
        </form>
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