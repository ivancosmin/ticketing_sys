$(document).ready(function(){
    alert("!");
    $(document).on("change","#jud", function(e){
        alert("1");
        /* $.ajax({
             url: "ceva.php",
             succes: function(data){
                 alert(data);
             }
         })*/
    });
});



