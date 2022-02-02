<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style>
    #on{
      background-color: green;
    }
    #off{
      background-color: red;
    }
    .button{
      margin: 50px;
      height:100px;
      width:100px;
      border-radius: 20px;
    }
    h1{
      position: absolute;
    }
    #wrapper{
      top:50%;
      left:50%;
      position: absolute;
      display:flex;
      transform: translate(-50%, -50%);
      /* align-content: center; */
      text-align: center;
      /* justify-content: center; */
    }
    </style>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div id="wrapper">
      <h1>Start stop</h1>
    <div id="on" class="button">
      start
    </div>
    <div id="off" class="button">
      stop
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

    var conn = new WebSocket('ws://localhost:8090');
conn.onopen = function(e) {
  console.log("Connection established!");
};

conn.onmessage = function(e) {

  document.getElementById("test").innerHTML+=e.data;
  console.log(e.data);
};

$("#on").click(function(){
  conn.send("fram");
});
$("#off").click(function(){
  conn.send("bak");
});
    </script>
  </body>
</html>
