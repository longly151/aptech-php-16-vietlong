<?php
if($_POST['email'] == 'thudientu@gmail.com' && $_POST['password'] == '123') {
  echo "<p>Login successful</p>";
} else {
  echo "<p>Login fail</p>";
}