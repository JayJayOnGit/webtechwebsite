
const usernameRegex = new RegExp('^[A-Za-z ]+$');
const emailRegex = new RegExp('^\\w+[@]\\w+[.].+$');
const passwordRegex = new RegExp('^\\S*(?=\\S{8,})(?=\\S*[!@#$&*])(?=\\S*[a-z])(?=\\S*[A-Z])(?=\\S*[\\d])\\S*$');

$( document ).ready(function() {

    //$("#submit").prop('disabled',true);
    $("#send").on('click', function(event){
        event.preventDefault();
        let isSignup = $(this).hasClass("sign_up_send");

        let validated = true;
        let invalidMessage = "";

        if (isSignup && !usernameRegex.test($('#form-name').val())) {
            validated = false;
            invalidMessage = "username is invalid";
        }

        else if (!emailRegex.test($('#form-email').val())) {
            validated = false;
            invalidMessage = "email is invalid";
        }

        else if (isSignup && !passwordRegex.test($('#form-password').val())) {
            validated = false;
            invalidMessage = "password is too weak.";
        }

        else if (isSignup && $('#form-password').val() !== $('#form-password-confirm').val()) {
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
            updateSubmitMessage(r.responseText);
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
            updateSubmitMessage(r.responseText);
        }
    });
}

function updateSubmitMessage(msg) {
    $('#submit-message').html(msg);
}