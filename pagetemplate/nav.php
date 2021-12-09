<?php

function nav(){

echo <<<NAV

<header>
 <a href="start"> start</a>
 <a href="omoss"> om oss</a>
 <a href="support"> kontakta</a>
 <form action="inlogg.php" method="post">
 <input type="text"name="username">
 <input type="password" name="password">
 <input type="submit" name="knapp" value="send form">
 </form>

 <a href="logout.php">Logga ut<a>


</header>

NAV;
//echo $_SESSION["username"];
}
 ?>
