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
      "name"  => $_POST['name'],
      "lastname"     => $_POST['lastname'],
      "gender"       => $_POST['gender'],
      "curp"  => $_POST['curp'],
      "ssn"  => $_POST['ssn'],
      "birth_date"     => $_POST['birth_date'],
      "phone"       => $_POST['phone'],
      "address"  => $_POST['address'],
      "email"       => $_POST['email'],
      "sos_phone"  => $_POST['sos_phone'],
      "mari_status"     => $_POST['mari_status'],
      "occupation"       => $_POST['occupation'],
      "blood_type"  => $_POST['blood_type'],
      "weight"  => $_POST['weight'],
      "height"     => $_POST['height'],
      "pressure"       => $_POST['pressure'],
      "allergies"  => $_POST['allergies'],
      "current_med"       => $_POST['current_med'],
      "med_hist"  => $_POST['med_hist']
    ];

    $sql = "UPDATE patient
            SET id = :id,
              name = :name,
              lastname = :lastname,
              gender = :gender,
              curp = :curp,
              ssn = :ssn,
              birth_date = :birth_date,
              phone = :phone,
              address = :address,
              email = :email,
              sos_phone = :sos_phone,
              mari_status = :mari_status,
              occupation = :occupation,
              blood_type = :blood_type,
              weight = :weight,
              height = :height,
              pressure = :pressure,
              allergies = :allergies,
              current_med = :current_med,
              med_hist = :med_hist
              
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
    $sql = "SELECT * FROM patient WHERE id = :id";
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
    <title>Edit Patient</title>
    <link rel="stylesheet" href="styleeditpat.css">
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
                    <li><a class= "active" href="#">Patients<i class="fas fa-caret-down"></i></a>
                        <ul>
                            <li><a href="registropat.php">New</a></li>
                            <li><a href="modipat.php">Modify</a></li>
                            <li><a href="searchpat.php">Search</a></li>
                        </ul>
                    </li>
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

<div class="container">
        <div class="title" >Edit Patient</div>
<form method="post">     
    <?php foreach ($user as $key => $value) : ?>
    <div class="patient-details">  
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