<!--
Innehåller funktionerna top() och bottom() som kallas på i index.php för att öppna html koden
samt stänga den när bloggdelen är printad.

Innehåller även en förbindelse till index.js.
-->

<?php

class topbottom
{

  function __construct(){}

    public function top(){    // funktionen som öppnar html delen av sidan med en heredoc-tag

echo<<<HTMLÖPPNA

      <!DOCTYPE html>
      <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>

HTMLÖPPNA;
    }

    public function bottom(){ // funktionen som stänger html delen av sidan med en heredoc-tag

      require "js/index.js";

echo<<<HTMLSTÄNG

    </body>
    </html>

HTMLSTÄNG;
  }
}

?>
