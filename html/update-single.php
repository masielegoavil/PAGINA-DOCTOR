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
      "phone"  => $_POST['phone'],
      "email"     => $_POST['email'],
      "specialty"       => $_POST['specialty'],
      "shift"  => $_POST['shift'],
      "salary"       => $_POST['salary'],
      "day_off"  => $_POST['day_off']
    ];

    $sql = "UPDATE doctor
            SET id = :id,
              name = :name,
              lastname = :lastname,
              gender = :gender,
              curp = :curp,
              phone = :phone,
              email = :email,
              specialty = :specialty,
              shift = :shift,
              salary = :salary,
              day_off = :day_off
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
    $sql = "SELECT * FROM doctor WHERE id = :id";
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

<h2>Editar un usuario</h2>

<form method="post">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
      <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
      <br><br>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>

