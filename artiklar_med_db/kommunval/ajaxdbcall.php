<?php
	echo"<html>";
	echo"<head>";
	echo"<meta charset=\"utf-8\">";
	echo"</head>";
	echo"<body>";
	echo"<form name=\"myForm\" method=\"GET\">";
	echo"sök: <input type=\"text\" id=\"target\" name=\"username\" autocomplete=\"off\" /> <br/>";
	echo"sök: <input type=\"text\" id=\"targeter\" name=\"username\" autocomplete=\"off\" /> <br/>";
	echo"<input type=\"hidden\" name=\"time\" />  ";
	echo"</form>";
	echo"<div id =\"ajaxsvar\"></div> ";
	echo"<div id =\"ajaxsvarer\"></div> ";

	?>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
	$( "#target" ).keyup(function() {
		$.get( "dbsvar.php", {test: $( "#target" ).val() }, function( data ) {

			var size=data.length;
			var newtext="<h1>Kommuner:</h1>";
			console.log(size);
			for (i = 0; i < size; i++) {

				newtext=newtext+""+ data[i].name+ "<br>" ;
			}
			if(newtext=="<h1>Kommuner:</h1>"){
				newtext="";
			}
			$( "#ajaxsvar" ).html( newtext );



		}, "json" );

	});
	$( "#targeter" ).keyup(function() {
		$.get( "dbsvarer.php", {test: $( "#targeter" ).val() }, function( datar ) {

			var sizer=datar.length;
			var newtexter="<h1>Län:</h1>";
			console.log(sizer);
			for (k = 0; k < sizer; k++) {

				newtexter=newtexter+""+ datar[k].name+ "<br>" ;
			}
			if(newtexter=="<h1>Län:</h1>"){
				newtexter="";
			}
			$( "#ajaxsvarer" ).html( newtexter );



		}, "json" );

	});
	</script>

<?php
	echo"</body>";
	echo"</html>";
?>
