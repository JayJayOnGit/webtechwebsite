
var usernameRegex = new RegExp('^[A-Za-z ]+$');
var emailRegex = new RegExp('^\\w+[@]\\w+[.].+$');

$( document ).ready(function() {

    //$("#submit").prop('disabled',true);
    $("#send").on('click', function(event){
        event.preventDefault();
        let isSignup = $(this).hasClass("sign_up_send");

        let validated = true;
        let invalidMessage = "";

        if (! usernameRegex.test($('#form-name').val())) {
            validated = false;
            invalidMessage = "username is invalid";
        }

        else if (! emailRegex.test($('#form-email').val())) {
            validated = false;
            invalidMessage = "email is invalid";
        }

        else if ($('#form-password').val() !== $('#form-password-confirm').val()) {
            validated = false;
            invalidMessage = "passwords do not match";
        }

        if(validated) {
            sendMessage(isSignup);
        }

        else {
            updateSubmitMessage(invalidMessage);
        }
    })
});

function sendMessage(isSignup) {
    if (isSignup) {
        registerUser()
    }
    else {
        confirmUser()
    }
}


function registerUser() {
    let username = $('#form-name').val();
    let email = $('#form-email').val();
    let password = $('#form-password').val();
    let args = {
        'uname': username,
        'email': email,
        'password': password,
        'action': 'register'
    };

    console.log (args);

    $result = $.ajax({
        type: "POST",
        url: "check-user.php",
        data: args,
        complete: function(r){
            alert(r.responseText);
        }
    });
}

function confirmUser() {
    let email = $('#form-email').val();
    let password = $('#form-password').val();
    let args = {
        'email': email,
        'password': password,
        'action': 'confirm'
    };

    console.log (args);

    $result = $.ajax({
        type: "POST",
        url: "check-user.php",
        data: args,
        complete: function(r){
            alert(r.responseText);
        }
    });
}

function updateSubmitMessage(msg) {
    $('#submit-message').html(msg);
}