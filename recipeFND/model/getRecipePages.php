<?php

class model_getRecipePages{

  function __construct(){}

    public function searchbarfunction($view_startpage){
      if($_REQUEST['searchresultat']!=""){
        $db=new dbcon();
        $testclean = filter_input(INPUT_GET, 'searchresultat', FILTER_SANITIZE_STRING);

        $testclean="%".$testclean."%";

        $sql="SELECT rubrik,beskrivning FROM individrecept WHERE rubrik LIKE :searchbar";


        $stmt=$db->pdo->prepare($sql);
        $stmt->bindParam(":searchbar",$testclean,PDO::PARAM_STR);
        $stmt->execute();

        $dbarray=$stmt->fetchAll(PDO::FETCH_ASSOC);
        //$htmlanswer;
        foreach ($dbarray as $value) {
     	// code...


        //$htmlanswer+='<div class="ssf">'. $value["rubrik"].'</div>';
        }

        echo json_encode( $dbarray);


      }

      //echo "funkar.model_getRecipePages";
      //echo "<br>";
    }


  }
  ?>
