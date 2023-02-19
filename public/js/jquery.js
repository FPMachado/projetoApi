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
        var passwordConfirmationField = $("#password_confirmation");
        var passwordFieldType = passwordField.attr('type');
        
        if(passwordFieldType == 'password'){
            passwordField.attr('type', 'text');
            if(passwordConfirmationField){
                passwordConfirmationField.attr('type', 'text');
            }
            $('#showPassword').removeClass("fal fa-eye");
            $('#showPassword').addClass("fal fa-eye-slash");
            $(this).val('Hide');
        } else {
            $('#showPassword').removeClass("fal fa-eye-slash")
            $('#showPassword').addClass("fal fa-eye")
            passwordField.attr('type', 'password');
            if(passwordConfirmationField){
                passwordConfirmationField.attr('type', 'password');
            }
            $(this).val('Show');
        }
    });
}