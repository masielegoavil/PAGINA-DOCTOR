<?php

try {
  require "config.php";
  require "common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM doctor";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();

} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>


<h2>Actualizar Doctores</h2>

<table>
  <thead>
    <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>CURP</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Specialty</th>
                <th>Shift</th>
                <th>Salary</th>
                <th>Day Off</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["name"]); ?></td>
                <td><?php echo escape($row["lastname"]); ?></td>
                <td><?php echo escape($row["gender"]); ?></td>
                <td><?php echo escape($row["curp"]); ?></td>
                <td><?php echo escape($row["phone"]); ?></td>
                <td><?php echo escape($row["email"]); ?> </td>
                <td><?php echo escape($row["specialty"]); ?></td>
                <td><?php echo escape($row["shift"]); ?></td>
                <td><?php echo escape($row["salary"]); ?></td>
                <td><?php echo escape($row["day_off"]); ?></td>
      <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Editar</a>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
