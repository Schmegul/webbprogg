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
      label{
        font-size:20px;
      }
      </style>
      <meta charset="utf-8">
      <title>blogg</title>
      </head>
      <body>
      <h3>startpage toptext</h3><br>
      <form method="post" style="height:80px;width:500px;background-color:green;">
      <input type="text" id="searchbar" name="searchbar" autocomplete="off"><br>


      <div style="display:flex;flex-wrap:wrap;">
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="potatis" name="potatis" value="1"><label for="potatis"> Potatis</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="pasta" name="pasta" value="1"><label for="pasta"> Pasta</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="nötkött" name="nötkött" value="1"><label for="Nötkött"> nötkött</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="fläsk" name="fläsk" value="1"><label for="fläsk"> Fläsk</label></div>
      <div class="inputcontainer" style="margin-left:8.48%;"><input type="checkbox" id="kyckling" name="kyckling" value="1"><label for="kyckling"> Kyckling</label></div>
      </div><div style="display:flex;flex-wrap:wrap;">
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="ris" name="ris" value="1"><label for="ris"> Ris</label></div>
      <div class="inputcontainer" style="margin-left:7.55%;"><input type="checkbox" id="bröd" name="bröd" value="1"><label for="bröd"> Bröd</label></div>
      <div class="inputcontainer" style="margin-left:2.4%;"><input type="checkbox" id="fisk" name="fisk" value="1"><label for="fisk"> Fisk</label></div>
      <div class="inputcontainer" style="margin-left:6.55%;"><input type="checkbox" id="halloumi" name="halloumi" value="1"><label for="halloumi"> Halloumi</label></div>
      <div class="inputcontainer" style="margin-left:2%;"><input type="checkbox" id="vilt" name="vilt" value="1"><label for="vilt"> Vilt</label></div>
      </div><input type="submit" value="Submit">
      </form>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

      <div id="resultatprint">test</div>

HTMLÖPPNA;
    }

    public function bottom(){ // funktionen som stänger html delen av sidan med en heredoc-tag


echo '<script src="javascript/js.js"></script>';

echo<<<HTMLSTÄNG
      <h3>startpage bottomtext</h3>
      </body>
      </html>

HTMLSTÄNG;
    }
  }


  ?>
