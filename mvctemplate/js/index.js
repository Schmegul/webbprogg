<!-- Lyssnar efter om klienten klickar på en div med klassnamnet "knapp", visar då den divens barn
som innehåller två input-fält och submit-knapp.
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$(".knapp").click(function(){
  $(this).next().show();    // next är barnet av .knapp
});
</script>
