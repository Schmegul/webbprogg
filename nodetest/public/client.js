function test(data){


  document.body.innerHTML+=this.responseText+'<br>';
}

setInterval(function(){

  var r= new XMLHttpRequest();

  r.addEventListener("load",test);
  r.open("GET","/api");
  r.send();

},3000);
