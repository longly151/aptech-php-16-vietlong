<?php
echo "<a href=\"./\">BACK</a>";
echo "<h1>1. Register</h1>";
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'connectDatabase.php';
    $conn = connectDatabase();
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $sql = "CREATE TABLE customers(
    //   id INT PRIMARY KEY AUTO_INCREMENT,
    //   username varchar(50),
    //   password varchar(50),
    //   roleId integer,
    //   foreign key(roleId) references roles(id)
    // )";
    
    // $sql = "INSERT INTO customers(username,password,roleId) VALUES ('$username','$password','2')";
    // $conn->query($sql);
    try {
      $data = array($username, $password, '2');
      $stmta = $conn->prepare("INSERT INTO customers (username, password, roleId) VALUES (?, ?, ?)");
      $stmta->execute($data);
  
      $conn = null;
      echo "Register successfully";
      }
    catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
  #gender {
    padding:5px;
  }
  </style>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
<div class="container">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
  <div class="form-group">
    <label style="color:green" for="exampleInputEmail1">Username</label>
    <input type="username" class="form-control" id="exampleInputusername1" aria-describedby="usernameHelp" name="username" placeholder="Enter username" required>
  </div>
  <div class="form-group">
    <label style="color:green" for="exampleInputName1">Password</label>
    <input type="password" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" name="password" placeholder="Enter password" >
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'connectDatabase.php';
    $conn = connectDatabase();

    // if ($result->num_rows > 0) {
    //     while ($row = $result->fetch_assoc()) {
    //         echo " UserID : " . $row["uId"] . " - Full Name : " . $row["uLastName"] . " " . $row["uFirstName"] . " - Email : " . $row["uEmail"] . "<br>";
    //     }
    // } else {
    //     echo "0 results";
    // }

    $sql = "SELECT * FROM customers";
    //left join roles using (id)
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
      echo
      "<table class=\"table text-center table-striped table-bordered\">
        <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
        </tr>
        </thead>
      <tbody>
        ";

      while($row = $result->fetch()){
        echo "<tr><td>".$row['id']."</td>".
        "<td>".$row['username']."</td></tr>";
      }
      echo
      "
      </tbody>
      </table>";
}
?>

</div>

</body>
</html>