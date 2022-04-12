<?php 
session_start();
if (isset($_SESSION['user']))
{   
?>







<?php
if (isset($_POST['submit'])) {
  require "config.php";
  require "common.php";

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
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
      "mari_status" => $_POST['mari_status'],
      "occupation"  => $_POST['occupation'],
      "blood_type"     => $_POST['blood_type'],
      "weight"       => $_POST['weight'],
      "height"  => $_POST['height'],
      "pressure"  => $_POST['pressure'],
      "allergies"     => $_POST['allergies'],
      "current_med"       => $_POST['current_med'],
      "med_hist"  => $_POST['med_hist']
    );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)","patient", implode(", ", array_keys($new_user)),":" . implode(", :", array_keys($new_user)));

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
    
    
  } catch(PDOException $error) {
      echo '\n';
      echo '\n';
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php if (isset($_POST['submit']) && $statement) { ?> 
<?php } ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register New Patient</title>
    <link rel="stylesheet" href="styleregpat.css">
</head>
<body>
<!--------------------------barra de menu de opciones------------------------------>
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
<!--------------------------contenedor de registro------------------------------->
    <div class="container">
        <div class="title">New Patient</div>
        <form method="post">
            <div class="patient-details">
                <div class="input-box">
                    <span class="details">Patient ID</span>
                    <input type="number" name="id" id="id" placeholder="Enter your ID" required>
                </div>
                <div class="input-box">    
                    <span class="details">First Name</span>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lastname" id="lastname" placeholder="Enter your last name" required>
                </div>
                <div class="input-box">
                    <span class="details">Gender</span>
                    <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
                </div>
                <div class="input-box">
                    <span class="details">CURP</span>
                    <input type="text" name="curp" id="curp" placeholder="Enter your CURP" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phone" id="phone" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">SSN</span>
                    <input type="text" name="ssn" id="ssn" placeholder="Enter your number" required>
                </div>
                <div class="input-box">
                    <span class="details">Birth Date</span>
                    <input type="date" name="birth_date" id="birth_date" placeholder="Enter your birth date" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" name="address" id="address" placeholder="Enter your address" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Emergency Number</span>
                    <input type="text" name="sos_phone" id="sos_phone" placeholder="Enter your emergency number" required>
                </div>
                <div class="input-box">
                    <span class="details">Marital Status</span>
                    <input type="text" name="mari_status" id="mari_status" placeholder="Enter your status" required>
                </div>
                <div class="input-box">
                    <span class="details">Occupation</span>
                    <input type="text" name="occupation" id="occupation" placeholder="Enter your occupation" required>
                </div>
                <div class="input-box">
                    <span class="details">Blood Type</span>
                    <input type="text" name="blood_type" id="blood_type" placeholder="Enter your blood type" required>
                </div>
                <div class="input-box">
                    <span class="details">Weight</span>
                    <input type="number" name="weight" id="weight" placeholder="Enter your weight (kg)" required>
                </div>
                <div class="input-box">
                    <span class="details">Height</span>
                    <input type="number" name="height" id="height" placeholder="Enter your height (cm)" required>
                </div>
                <div class="input-box">
                    <span class="details">Allergies</span>
                    <input type="text" name="allergies" id="allergies" placeholder="Enter what allergies you have" required>
                </div>
                <div class="input-box">
                    <span class="details">Pressure</span>
                    <input type="text" name="pressure" id="pressure" placeholder="Enter high/low/regular" required>
                </div>
                <div class="input-box">
                    <span class="details">Current Medication</span>
                    <input type="text" name="current_med" id="current_med" placeholder="Enter medicines you are taking currently" required>
                </div>
                <div class="input-box">    
                    <span class="details">Medical Histoy</span>
                    <input type="text" name="med_hist" id="med_hist" placeholder="Enter any previous disease, illness or sickness" required>
                </div>
            </div>
            <div class="button">
                <input type="submit" name="submit" value="Register">
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