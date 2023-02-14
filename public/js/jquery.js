$(document).ready(function() {
    $("#dropDown").hide();
});

function userButton(){
    let div = $("#dropDown").is( ":visible" );
    if(div){
        $("#dropDown").hide();
    }else{
        $("#dropDown").show();
    }
}