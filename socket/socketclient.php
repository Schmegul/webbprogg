<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div id="test">

    </div>


    <script type="text/javascript">
    var conn = new WebSocket('ws://localhost:8090');
conn.onopen = function(e) {
  console.log("Connection established!");
};

conn.onmessage = function(e) {

  document.getElementById("test").innerHTML+=e.data;
  console.log(e.data);
};
    </script>
  </body>
</html>
