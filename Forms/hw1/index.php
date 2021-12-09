<?php

$val="klickar här";

echo "<h1>hej</h1>";

echo<<<FORM

<form action="phppager.php" method="get">

  <input type="text" name="name" value="username"><br><br>
  <input type="password" id="psw" name="password" value="password"><br><br>
  <input type="password" id="confirmpsw" name="confirmpassword" value="confirm password"><br><br>
  <input type="text" name="email" value="email"><br><br>
  <input type="text" name="number" value="phonenumber"><br><br>
  Nationality <select name="country">
  <option value="swe">swe</option>
  <option value="eng">eng</option>
  <option value="nor">nor</option>
  <option value="fin">fin</option></select> <br><br>
  read TOS <input type="checkbox" id="checker" name="tos" value="read tos" onclick="function1()"><br><br>

  <input type="submit" id="subber" disabled="disabled" name="submittothem" value="{$val}">


</form>

<script>
var psw1 = document.getElementById("psw");
var psw2 = document.getElementById("confirmpsw");
var checkBox = document.getElementById("checker");
function function1() {
  if (checkBox.checked == true && psw1.value == psw2.value ){
    document.getElementById("subber").disabled = false;
  } else {
    document.getElementById("subber").disabled = true;
  }
}
</script>

FORM;

?>
<!--
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>








  </body>
</html> -->
