<?php
echo "<a href=\"./\">BACK</a>";
echo "<h1>1. Login</h1>";
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

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM customers where username = '$username' AND password = '$password'";
    //left join roles using (id)
    $result = $conn->query($sql);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    if ($result->fetch()) {
      echo "Login successfully";
    } else {
      echo "Login fail";
    }
      // while($row = $result->fetch()){
      //   echo "<tr><td>".$row['id']."</td>".
      //   "<td>".$row['username']."</td></tr>";
      // }
      // echo
      // "
      // </tbody>
      // </table>";
}
?>

</div>

</body>
</html>