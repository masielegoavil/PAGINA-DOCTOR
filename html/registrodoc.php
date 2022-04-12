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
      "phone"  => $_POST['phone'],
      "email"     => $_POST['email'],
      "specialty"       => $_POST['specialty'],
      "shift"  => $_POST['shift'],
      "salary"       => $_POST['salary'],
      "day_off"  => $_POST['day_off']
    );

    $sql = sprintf("INSERT INTO %s (%s) values (%s)","doctor", implode(", ", array_keys($new_user)),":" . implode(", :", array_keys($new_user)));

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
    <title>Register New Doctor</title>
    <link rel="stylesheet" href="styleregdoc.css">
</head>
<body>
    <nav class="navbar">
				<img class="logo" src="logo1.jpg">
				<ul>
					<li><a href="mainpage.php">Home</a></li>           
                    <li><a class= "active" href="#">Doctors<i class="fas fa-caret-down"></i></a>
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
        <div class="title">New Doctor</div>
        <form method="post">
            <div class="doctor-details">
                <div class="input-box">
                    <span class="details">Doctor ID</span>
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
                    <span class="details">Email</span>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="input-box">
                    <span class="details">Specialty</span>
                    <input type="text" name="specialty" id="specialty" placeholder="Enter your specialty" required>
                </div>
                <div class="input-box">
                    <span class="details">Shift</span>
                    <input type="number" name="shift" id="shift" placeholder="Enter your shift" required>
                </div>
                <div class="input-box">
                    <span class="details">Salary</span>
                    <input type="text" name="salary" id="salary" placeholder="Enter your salary amount" required>
                </div>
                <div class="input-box">
                    <span class="details">Day Off</span>
                    <input type="text" name="day_off" id="day_off" placeholder="Enter your day off" required>
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