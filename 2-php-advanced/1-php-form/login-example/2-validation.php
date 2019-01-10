<?php
echo "<a href=\"./\">BACK</a>";
echo "<h1>1. FORM VALIDATION</h1>";
?>

<?php
$name=$email=$gender = "";
$errName=$errEmail=$errGender= "";

function checkName($name) {
  return (preg_match("/(^[a-zaáàảãạâấầẩẫậăắằẳẵặeéèẻẽẹêếềểễệiíìỉĩịoóòỏõọôốồổỗộơớờởỡợuúùủũụưứừửữựyýỳỷỹỵđ]+)( [a-zaáàảãạâấầẩẫậăắằẳẵặeéèẻẽẹêếềểễệiíìỉĩịoóòỏõọôốồổỗộơớờởỡợuúùủũụưứừửữựyýỳỷỹỵđ]+)+$/i", $name));
}
function checkEmail($email) {
  return (preg_match("/(^[a-z])([a-z0-9_]+)@([a-z]+)\.([a-z]{2,4})(\.[a-z]{2,4})?$/i", $email));
}
function checkGender($gender) {
  return ($gender == "male" || $gender == "female");
}
function validateInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = strtolower($data);
  return $data;
}
function validateForm($type, $data, &$errName, &$errEmail, &$errGender) {
  $data = validateInput($data);
  switch($type) {
    case "name":
      if(!checkName($data)) {
        $errName = "Invalid Name";
        return false;
      }
      return true;
      break;
    case "email":
      if(!checkEmail($data)) {
        $errEmail = "Invalid Email";
        return false;
      }
      return true;
      break;
    case "gender":
      if ($data == "other") {
        $errGender = "HiHi";
        return false;
      }
      if(!checkGender($data)) {
        $errGender = "Invalid Gender";
        return false;
      }
      return true;
      break;
  }
  return false;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $gender = $_POST["gender"];
  foreach($_POST as $key => $value) {
    validateForm($key, $value, $errName, $errEmail, $errGender);
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
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" name="name" placeholder="Enter name" 
    value="<?php if ($errName || $errEmail || $errGender) {
                echo $name;
          } ?>"required>
    <p style="color:red;"><?php echo $errName; ?></p>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email"
    value="<?php if ($errName || $errEmail || $errGender) {
                echo $email;
          } ?>" required>
    <p style="color:red;"><?php echo $errEmail; ?></p>
  </div>

  <label>Gender:</label>
  <div class="form-check form-check-inline">
    <label class="form-check-label" for="inlineRadio1" id="gender">Male</label>
    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" 
    <?php if ($errName || $errEmail || $errGender) {
      if($gender == "male") echo "checked";
    } else echo "checked" ?>>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label" for="inlineRadio2" id="gender">Female</label>
    <input class="form-check-input" type="radio"  name="gender" id="inlineRadio2" value="female"
    <?php if ($errName || $errEmail || $errGender) {
      if($gender == "female") echo "checked";
    }?>>
  </div>
  <div class="form-check form-check-inline">
    <label class="form-check-label" for="inlineRadio3" id="gender">Other</label>
    <input class="form-check-input" type="radio"  name="gender" id="inlineRadio3" value="other"
    <?php if ($errName || $errEmail || $errGender) {
      if($gender == "other") echo "checked";
    }?>>
  </div>
  <p style="color:red;"><?php echo $errGender; ?></p>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>