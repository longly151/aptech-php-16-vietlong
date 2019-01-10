<?php
echo "<a href=\"./\">BACK</a>";
echo "<h1>1. FORM HANDLING</h1>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    Name: <input type="text" name="name"> <br>
    Project: <input type="text" name="project"><br>
    <button type="submit">Submit</button>
  </form>
</body>
</html>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $project = $_POST["project"];
    echo "Your name is $name and name of your project is $project";
  }
?>