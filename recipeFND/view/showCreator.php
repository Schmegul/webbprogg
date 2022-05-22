<!--
Funktion som bygger upp receptskaparen. När all information är angiven skickas datan till
filen filterSendoff.php för att filtreras och puttas upp till databasen.
-->

<?php

class view_showCreator{

  function __construct(){}

    public function buildCreator(){

echo<<<CREATOR

      <a href="http://localhost/webbprogg/recipeFND/">Gå tillbaka</a>
      <form method="post" action="model/filterSendoff.php" style="width:500px;">

      <h3 style="border-bottom:3px solid black;">Rubrik</h3><textarea placeholder="Rubrik" id="rubrik" name="rubrik" style="font-size:20px;width:300px;"></textarea><br>
      <h3 style="border-bottom:3px solid black;">Beskrivning</h3><textarea placeholder="Beskrivning" id="beskrivning" name="beskrivning"></textarea><br>
      <h3 style="border-bottom:3px solid black;">Mängd Ingridienser</h3><textarea placeholder="Mängd Ingridienser" id="ingridienser" name="ingridienser"></textarea><br>
      <h3 style="border-bottom:3px solid black;">Utförande</h3><textarea placeholder="Utförande" id="utförande" name="utförande"></textarea><br>

      <h3>Bocka i vilka ingridienser receptet innehåller</h3>
      <div style="display:flex;flex-wrap:wrap;">
      <div class="inputcontainer" style="margin-left:2%;"><input type="hidden" name="potatis" value=0><input type="checkbox" id="potatis" name="potatis" value="1"><label for="potatis"> Potatis</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="hidden" name="pasta" value=0><input type="checkbox" id="pasta" name="pasta" value="1"><label for="pasta"> Pasta</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="hidden" name="nötkött" value=0><input type="checkbox" id="nötkött" name="nötkött" value="1"><label for="Nötkött"> nötkött</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="hidden" name="fläsk" value=0><input type="checkbox" id="fläsk" name="fläsk" value="1"><label for="fläsk"> Fläsk</label></div>
      <div class="inputcontainer" style="margin-left:8.48%;"><input type="hidden" name="kyckling" value=0><input type="checkbox" id="kyckling" name="kyckling" value="1"><label for="kyckling"> Kyckling</label></div>
      </div><div style="display:flex;flex-wrap:wrap;">
      <div class="inputcontainer" style="margin-left:2%;"><input type="hidden" name="ris" value=0><input type="checkbox" id="ris" name="ris" value="1"><label for="ris"> Ris</label></div>
      <div class="inputcontainer" style="margin-left:7.55%;"><input type="hidden" name="bröd" value=0><input type="checkbox" id="bröd" name="bröd" value="1"><label for="bröd"> Bröd</label></div>
      <div class="inputcontainer" style="margin-left:2.4%;"><input type="hidden" name="fisk" value=0><input type="checkbox" id="fisk" name="fisk" value="1"><label for="fisk"> Fisk</label></div>
      <div class="inputcontainer" style="margin-left:6.55%;"><input type="hidden" name="halloumi" value=0><input type="checkbox" id="halloumi" name="halloumi" value="1"><label for="halloumi"> Halloumi</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="hidden" name="vilt" value=0><input type="checkbox" id="vilt" name="vilt" value="1"><label for="vilt"> Vilt</label></div>
      </div><br><input type="submit" value="Submit">
      </form>

CREATOR;
    }
  }
  ?>
