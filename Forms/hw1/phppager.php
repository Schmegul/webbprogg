<body style="background-color: black; color:white;">
<?php
if(isset($_GET['animals'])){
  $animal=filter_input(INPUT_GET, 'animals', FILTER_SANITIZE_SPECIAL_CHARS);
  echo htmlspecialchars($animal,ENT_QUOTES);
}



$answer0= filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$answer1= filter_input(INPUT_GET, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$answer2= filter_input(INPUT_GET, 'confirmpassword', FILTER_SANITIZE_SPECIAL_CHARS);
$answer3= filter_input(INPUT_GET, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$answer4= filter_input(INPUT_GET, 'number', FILTER_SANITIZE_SPECIAL_CHARS);
$nation= filter_input(INPUT_GET, 'country', FILTER_SANITIZE_SPECIAL_CHARS);

if($answer1==$answer2){

for($i=0;$i<5;$i++){
echo ${'answer'.$i};
echo "<br />\n";
}
echo $nation.'land';
}
else{
  echo "passwords are not identical";
}






?>
  </body>
