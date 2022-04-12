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
    );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)","appointment", implode(", ", array_keys($new_user)),":" . implode(", :", array_keys($new_user)));

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
    <title>Register New Appointment</title>
    <link rel="stylesheet" href="styleregapp.css">
</head>
<body>
<!-----------------------------barra menu opciones ----------------------->
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
<!--------------------------cuadro de formulario-------------------------->
    <div class="container">
        <div class="title">New Appointment</div>
            <form method="post">
            <div class="appointment-details">
                <div class="input-box">
                    <span class="details">Appointment ID</span>
                    <input type="number" name="id" id="id" placeholder="Enter appointment ID" required>
                </div>
                <div class="input-box">
                    <span class="details">Doctor ID</span>
                    <input type="number" name="doctorID" id="doctorID" placeholder="Enter doctor ID" required>
                </div>
                <div class="input-box">    
                    <span class="details">Patient ID</span>
                    <input type="number" name="patientID" id="patientID" placeholder="Enter patient ID" required>
                </div>
                <div class="input-box">    
                    <span class="details">Office</span>
                    <input type="number" name="office" id="office" placeholder="Enter the number" required>
                </div>
                <div class="input-box">
                    <span class="details">Date</span>
                    <input type="datetime-local" name="date" id="date" placeholder="Enter day and time" required>
                </div>
                <div class="input-box">    
                    <span class="details">Sickness</span>
                    <input type="text" name="sickness" id="sickness" placeholder="Enter if you have a sickness">
                </div>
                <div class="input-box">    
                    <span class="details">Symtoms</span>
                    <input type="text" name="symtoms" id="symtoms" placeholder="Enter any symtoms" >
                </div>
                <div class="input-box">    
                    <span class="details">Previous Medication</span>
                    <input type="text" name="prev_med" id="prev_med" placeholder="Enter any medication" >
                </div>
                <div class="input-box">    
                    <span class="details">Price</span>
                    <input type="number" name="price" id="price" placeholder="Enter the cost" required>
                </div>
                <div class="input-box">        
                    <span class="details">Additional Notes</span>
                    <input type="text" name="notes" id="notes" placeholder="Enter additional information" required>
                </div>
                <div class="input-box">    
                    <span class="details">Status of Payment</span>
                    <input type="text" name="stat_pay" id="stat_pay" placeholder="Enter status of payment" required>
                </div>
                <div class="input-box">    
                    <span class="details">Status of Appointment</span>
                    <input type="text" name="stat_app" id="stat_app" placeholder="Enter status of appointment" required>
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