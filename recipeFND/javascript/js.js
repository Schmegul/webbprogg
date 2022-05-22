// javascript-fil med ajax som möjliggör direkta svar från databasen utan att sidan
// behövs laddas om.

$("#searchbar").keyup(function(){   // funktion som lyssnar efter när användaren skriver i sökrutan

  var arrsend=[];
  var arr=["potatis","pasta","nötkött","fläsk","kyckling","ris","bröd","fisk","halloumi","vilt"];

  for (var i = 0; i < 10; i++) {    // loopen detekterar vilka bockar som är ibockade och ger dem då värdet 1 i deras plats i arrayen, annars 0

    if(document.getElementById(arr[i]).checked){

      arrsend.push(1);
    }else{

      arrsend.push(0);
    }
  }

  var jsonArrSend=JSON.stringify(arrsend);    // konverterar array:en arrsend till json

  $.get("getrecipes", {searchresultat: $("#searchbar").val(), arrj: jsonArrSend }, function(data){    // använder ajax för att skicka över datan användaren har angivit till getRecipePages.php

    $( "#resultatprint" ).html( data);

  });
});
