$(document).ready(function(){
    $("#dropDown").hide();
    changeTypeInputPassword()
});

function userButton(){
    $("#dropDown").toggle();
}

function changeTypeInputPassword() {
    $('#showPassword').on('click', function(){
        var passwordField = $('#password');
        var passwordFieldType = passwordField.attr('type');
        if(passwordFieldType == 'password'){
            passwordField.attr('type', 'text');
            $('#showPassword').removeClass("fal fa-eye-slash");
            $('#showPassword').addClass("fal fa-eye");
            $(this).val('Hide');
        } else {
            $('#showPassword').removeClass("fal fa-eye")
            $('#showPassword').addClass("fal fa-eye-slash")
            passwordField.attr('type', 'password');
            $(this).val('Show');
        }
    });
}