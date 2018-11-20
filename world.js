$(document).ready(function(){
    $("#lookup").click(function(){
        if ($("#all").is(":checked")){
            $.ajax({
                type: "GET",
                url: "world.php",
                datatype: "html",
                data: {all: $("#all").val()},
                success: function(text){
                    $("#result").html(text);
                }
            });
        }else{
            $.ajax({
            type: "GET",
            url: "world.php",
            datatype: "html",
            data: {country: $("#country").val()},
            success: function(text){
                alert(text);
                $("#result").html(text);
            }
        });
        }