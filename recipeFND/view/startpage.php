<!--
Tre olika funktioner. De två första öppnar och stänger html-taggen samt innehåller generel
css. Header funktionen skriver ut sökrutan som används för att leta recept samt länken
som tar användaren till receptskaparen.
-->

<?php

class view_startpage{

  function __construct(){}
    public function top(){    // funktionen som öppnar html delen av sidan med en heredoc-tag

echo<<<HTMLÖPPNA

      <!DOCTYPE html>
      <html lang="en" dir="ltr">
      <head>
      <style>
      inputcontainer{
        position:absolute;
      }
      h1{
        border-bottom:3px solid black;
      }
      label{
        font-size:20px;
      }
      #beskrivning,#utförande,#ingridienser{
        font-size:20px;
        height:150px;
        width:600px;
      }
      </style>
      <meta charset="utf-8">
      <title>Receptväljare</title>
      </head>
      <body>

HTMLÖPPNA;
    }

    public function bottom(){ // funktionen som stänger html delen av sidan med en heredoc-tag

echo<<<HTMLSTÄNG

      </body>
      </html>

HTMLSTÄNG;
    }

    public function header(){

echo<<<HEADER

      <h1>Skapa eller sök redan existerande recept</h1>
      <a href="http://localhost/webbprogg/recipeFND/create">Skapa ett nytt recept</a><br>
      <form method="post" style="height:80px;width:500px;background-color:green;">
      <input type="text" id="searchbar" name="searchbar" autocomplete="off"><br>

      <div style="display:flex;flex-wrap:wrap;">
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="potatis" name="potatis" value="1"><label for="potatis"> Potatis</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="pasta" name="pasta" value="1"><label for="pasta"> Pasta</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="nötkött" name="nötkött" value="1"><label for="nötkött"> nötkött</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="fläsk" name="fläsk" value="1"><label for="fläsk"> Fläsk</label></div>
      <div class="inputcontainer" style="margin-left:8.48%;"><input type="checkbox" id="kyckling" name="kyckling" value="1"><label for="kyckling"> Kyckling</label></div>
      </div><div style="display:flex;flex-wrap:wrap;">
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="ris" name="ris" value="1"><label for="ris"> Ris</label></div>
      <div class="inputcontainer" style="margin-left:7.55%;"><input type="checkbox" id="bröd" name="bröd" value="1"><label for="bröd"> Bröd</label></div>
      <div class="inputcontainer" style="margin-left:2.4%;"><input type="checkbox" id="fisk" name="fisk" value="1"><label for="fisk"> Fisk</label></div>
      <div class="inputcontainer" style="margin-left:6.55%;"><input type="checkbox" id="halloumi" name="halloumi" value="1"><label for="halloumi"> Halloumi</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="vilt" name="vilt" value="1"><label for="vilt"> Vilt</label></div></div>

      <br><br></form>

      <div id="resultatprint"></div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script src="javascript/js.js"></script>

HEADER;
    }
  }
  ?>
