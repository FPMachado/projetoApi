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

function assited(){
    Swal.fire({
        title: 'Atenção',
        text: 'Tem certeza que deseja marcar este filme como assitido?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim',
        cancelButtonText: "Não"
    }).then((result) => {
        if(result.isConfirmed){
            console.log(getDate());
            $("#assisted_in").val(getDate());
        }
    })
}

function getDate(){
    var data = new Date(),
        dia  = data.getDate(),
        mes  = data.getMonth() + 1,
        ano  = data.getFullYear();
    mes = ((mes <10) ? "0"+mes : '');
    return [ano, mes, dia].join('-');
}