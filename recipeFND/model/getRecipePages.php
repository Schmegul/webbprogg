<!--
Funktion som hämtar användarangivna datan från javascript-filen. Jämför datan med databasen
och har som syfte att ge användaren relevanta recept. Sökrutan fungerar men de logiska
operatorerna som ser över bockarna fungerar inte som de ska. Resultatet som filtreringen
ger lagras i en array som skickas till showSnippets.php.
-->

<?php

class model_getRecipePages{

  function __construct(){}

    public function searchbarfunction($view_startpage,$view_showSnippets){
      if($_REQUEST['searchresultat']!=""){
        $db=new dbcon();
        $testclean = filter_input(INPUT_GET, 'searchresultat', FILTER_SANITIZE_STRING);
        $ingridienser=json_decode($_REQUEST['arrj']);   // avkryptering av json array
        $testclean="%".$testclean."%";    // används för att hitta liknande texter

        $sql="SELECT * FROM individrecept WHERE rubrik LIKE :searchbar and (:pot=potatis OR :pas=pasta OR :nit=nötkött OR :fla=fläsk OR :kyc=kyckling OR :ris=ris OR :brod=bröd OR :fisk=fisk OR :hal=halloumi OR :vilt=vilt)";

        $stmt=$db->pdo->prepare($sql);
        $stmt->bindParam(":searchbar",$testclean,PDO::PARAM_STR);
        $stmt->bindParam(":pot",$ingridienser[0],PDO::PARAM_STR);
        $stmt->bindParam(":pas",$ingridienser[1],PDO::PARAM_STR);
        $stmt->bindParam(":nit",$ingridienser[2],PDO::PARAM_STR);
        $stmt->bindParam(":fla",$ingridienser[3],PDO::PARAM_STR);
        $stmt->bindParam(":kyc",$ingridienser[4],PDO::PARAM_STR);
        $stmt->bindParam(":ris",$ingridienser[5],PDO::PARAM_STR);
        $stmt->bindParam(":brod",$ingridienser[6],PDO::PARAM_STR);
        $stmt->bindParam(":fisk",$ingridienser[7],PDO::PARAM_STR);
        $stmt->bindParam(":hal",$ingridienser[8],PDO::PARAM_STR);
        $stmt->bindParam(":vilt",$ingridienser[9],PDO::PARAM_STR);

        $stmt->execute();

        $dbarray=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $view_showSnippets->printsnippets($dbarray);    // skickar vidare arrayen till showSnippets.php
      }
    }
  }
  ?>
