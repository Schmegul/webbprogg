<?php
echo"<html>";
echo"<head>";
echo"<meta charset=\"utf-8\">";
echo"</head>";
echo"<body>";

/*
Koden skapar en anslutning till databasen och hämtar all information från geo_counties. Från den
hämtade informationen så läggs länens namn och deras plats in i den första av tre selectboxar.
De andra två selectboxarna är tomma från början men fylls med information från geo_municipalities
och geo_städer beroende på vad som är valt i selectboxen innan dens egna.

Anropar en funktion i filen dbconnect som i ett PDO-objekt lagrar anslutningen till databasen.
Skapar därefter en sqlfråga som frågar om allting från filen geo_counties och lagrar frågan i $stmt.
$stmt körs sedan för att plocka ut information ur databasen. Svaret lagras i arrayen $counties.
En selectbox skapas och inuti loopar den ut ett antal <option>. Mängden options och innehållet beror
på information som den fick från $counties. Två andra tomma selectboxar skapas och dessa döljs med css.
Dessa fylls sedan med informationen namnet och "value" med hjälp av jquery och javascript i script-delen.
*/

require_once ('dbconnect.php');									// filen åt dbconnect.php
$db= anslutdb();																// funktionen i dbconnect lagras lokalt i $db
$stmt=$db->query('select * from geo_counties');	// frågan skapas och lagras i $stmt
$stmt -> execute();															// frågan sätts igång
$counties =$stmt->fetchAll();										// frågan används för att hämta information som sedan lagras i $counties

// alla län man kan välja
echo'<select id="lan_selector">';
foreach ($counties as $lannamn) {
	echo '<option value='.$lannamn['countyid_pk'].'>'.$lannamn['nameco'].'</option>';
}
echo'</select>';

// kommuner inom valda länet
echo'<br><select id="kommun_selector" style="display:none;">';
echo'</select>';

// orter inom vänersborgs kommun
echo'<br><select id="stad_selector" style="display:none;">';
echo'</select>';

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>

/*
Första funktionen upptäcker om län-selectboxen ändras och om detta är sant körs funktionen.
Den andra funktionen skickar information till getcountyid.php, specifikt variabeln "countyid"
som den får från län-selectboxens värde. Informationen behandlas i getcountyid och skickas
tillbaka som en json array lagrad i "data". Längden på arrayen sparas och kommun-selectboxen
blir synlig samt töms. En loop fyller på kommun-selectboxen med "value" och namnet på kommunerna
i ett vanligt <option>-format.

Första funktionen använder .on('change') för att upptäcka om län-selectboxen ändras, även om sidan inte
har laddats om och informationen inte är uppdaterad i DOM-trädet. En get-request hämtar sedan arrayen
countyid i json format och lagrar informationen i arrayen "data". Informationen som hämtas är
vilka kommuner som ska visas i selectboxen. Selectboxen för kommuner visas och rensas. Längden på arrayen
användes för att printa ut rätt mängd options; detta görs med en vanlig for-loop och "append" som sedan
skriver in <option> med tillhörande "value" och "text", vars information tas ur arrayen "data".
I slutet av get-request:en så berättar den även att json arrayen ska omformateras till javascript-format
så att javascriptet och jquery:n fungerar.
*/

$( "#lan_selector" ).on('change', function() {
	$.get( "getcountyid.php", {countyid: $( "#lan_selector" ).val() }, function( data ) {
		var size=data.length;
		$("#kommun_selector").show();					// selectboxen blir synlig
		$("#kommun_selector").empty();				// selectboxen töms så att den funkar flera gånger
		for (i = 0; i < size; i++) {
			$('#kommun_selector').append($('<option>', {
				value: data[i].municipalityid_pk,	// placeringen som kommunen får
				text: data[i].namemu							// namnet på kommunen
			}));
		}
	}, "json" );														// berättar att arrayen "data" är i json-format ->
});																				// och ändrar den tillbaka till javascript array

/*
Första funktionen upptäcker om kommun-selectboxen ändras och om detta är sant körs funktionen.
Den andra funktionen skickar information till getmunicipalitiesid.php, specifikt variabeln
"municipalityid" som den får från kommun-selectboxens värde. Informationen behandlas i
getmunicipalitiesid.php och skickas tillbaka som en json array lagrad i "data".
Längden på arrayen sparas och tätorter-selectboxen blir synlig samt töms. En loop fyller på
tätorter-selectboxen med "value" och namnet på orterna i ett vanligt <option>-format.

Första funktionen använder .on('change') för att upptäcka om kommun-selectboxen ändras, även om sidan
inte har laddats om och informationen inte är uppdaterad i DOM-trädet. En get-request hämtar sedan
arrayen municipalityid i json format och lagrar informationen i arrayen "data". Informationen som
hämtas är vilka orter som ska visas i selectboxen. Selectboxen för orter visas och rensas. Längden på
arrayen användes för att printa ut rätt mängd options; detta görs med en vanlig for-loop och "append"
som sedan skriver in <option> med tillhörande "value" och "text", vars information tas ur arrayen
"data". I slutet av get-request:en så berättar den även att json array:en ska omformateras till
javascript-format så att javascriptet och jquery:n fungerar.
*/

$( "#kommun_selector" ).on('change', function() {
	$.get( "getmunicipalitiesid.php", {municipalityid: $( "#kommun_selector" ).val() }, function( data ) {
		var size=data.length;
		$("#stad_selector").show();					// selectboxen blir synlig
		$("#stad_selector").empty();				// selectboxen töms så att den funkar flera gånger
		if(size>0){													// ser till att om en kommun inte har några orter ->
			for (i = 0; i < size; i++) {			// så får man inte valet att välja ort
				$('#stad_selector').append($('<option>', {
					value: data[i],								// placeringen som orten får (är tom)
					text: data[i].namest					// namnet som orten får
				}));
			}
		}else{
			$("#stad_selector").hide();
		}
	}, "json" );													// berättar att arrayen "data" är i json-format ->
});																			// och ändrar tillbaka den till javascript array

</script>

<?php
echo"</body>";
echo"</html>";
?>
