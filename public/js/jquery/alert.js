
setTimeout(function(){ 
    document.getElementById("hide").className = "display-none"; 
  }, 3000);

$(document).ready(function(){
    $("#hide").click(function(){
        $(".alert-mess").hide();
    });
});