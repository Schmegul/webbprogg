$("#searchbar").keyup(function(){
$.get("getr", {searchresultat: $("#searchbar").val() }, function(data){
    console.log(data);
    $( "#resultatprint" ).html( data[0].rubrik );

},"json");
});
