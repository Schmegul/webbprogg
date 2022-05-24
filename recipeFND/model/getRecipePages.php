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
        $finnsdata=0;   // används för att avgöra om åtminstone en bock är ibockad

        $bockar=" AND (";

          $arrcond=array("pot","pas","nit","fla","kyc","ris","brod","fisk","hal","vilt");   // array innehållande conditions
          $arrdb=array("potatis","pasta","nötkött","fläsk","kyckling","ris","bröd","fisk","halloumi","vilt");   // array innehållande delar i db

          foreach ($ingridienser as $key=> $ingrediens) {   // loopar igenom alla platser i arrayen för bockarna

          if ($ingrediens==1){    // if-sats för om en ingrediens är ibockad (har värdet 1)
          $finnsdata=1;   // används senare för att ställa rätt sql-fråga
          $bockar= $bockar.":".$arrcond[$key]."=".$arrdb[$key];   // lägger till ett condition till sql-frågan nedan genom att ta namn ur båda arrayer ovan

          for ($i=$key+1; $i <sizeof($ingridienser) ; $i++) {   // hela loopen går igenom arrayen med ingredienser och ser efter hur många ingredienser som ibockade.
                                                                // Om den upptäcker att det finns en till ibockad ingrediens efter den som precis lagt till i $bockar
          if($ingridienser[$i]==1){                             // så lägger den till AND efteråt.
          $bockar=$bockar." AND ";
          $i=sizeof($ingridienser);   // stänger loopen för att det inte ska printas ut mer än ett AND
                }
              }
            }
          }
          $bockar=$bockar.")";


          if ($finnsdata==1){   // beroende på om någon bock är ibockad eller inte ställs olika sql-frågor

            $sql="SELECT * FROM individrecept WHERE rubrik LIKE :searchbar ".$bockar;
          }else{
            $sql="SELECT * FROM individrecept WHERE rubrik LIKE :searchbar";

          }
          $stmt=$db->pdo->prepare($sql);
          $stmt->bindParam(":searchbar",$testclean,PDO::PARAM_STR);


          foreach ($ingridienser as $key=> $ingrediens) {
            if ($ingrediens==1){

              $stmt->bindParam(":".$arrcond[$key] , $ingridienser[$key],PDO::PARAM_STR);

            }
          }





          $stmt->execute();

          $dbarray=$stmt->fetchAll(PDO::FETCH_ASSOC);
          $view_showSnippets->printsnippets($dbarray);    // skickar vidare arrayen till showSnippets.php
        }
      }
    }
    ?>
