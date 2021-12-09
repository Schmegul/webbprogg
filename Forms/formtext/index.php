<?php

$val="klickar här";

echo "<h1>hej</h1>";

echo<<<FORM

<form action="validateform.php" method="get">

  <input type="text" name="surname" value="ange ditt efternamn">

  <input type="submit" name="submittothem" value="{$val}">
  <br><br>
  dog <input type="radio" name="animals" value="dog">
  cat <input type="radio" name="animals" value="cat">
</form>

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
