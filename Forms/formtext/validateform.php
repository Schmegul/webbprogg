<body style="background-color: black; color:white;">
<?php

if(isset($_GET['animals'])){
  $animal=filter_input(INPUT_GET, 'animals', FILTER_SANITIZE_SPECIAL_CHARS);
  echo htmlspecialchars($animal,ENT_QUOTES);
}


$username_dirty=$_GET['surname'];
$username_clean= filter_input(INPUT_GET, 'surname', FILTER_SANITIZE_SPECIAL_CHARS);


echo htmlspecialchars($username_dirty,ENT_QUOTES);

for($i=0;$i<10;$i++){
echo $username_clean;
}








?>
  </body>
