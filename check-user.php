<?php
include 'connect.php';

if ( ! empty( $_POST ) && ! empty( $_POST['action'] )  ) { //Check if form data has actually been posted
    if ( 'register' === $_POST['action'] ) {
        register_user($_POST);
    }

    if ( 'confirm' === $_POST['action'] ) {
        confirm_user($_POST);
    }
}

function register_user($user_data) {
    global $mysqli;

    $escaped_user = mysqli_real_escape_string($mysqli, $user_data['uname']);
    $escaped_email = mysqli_real_escape_string($mysqli, $user_data['email']);
    $hashed_password = password_hash( $user_data['password'], PASSWORD_BCRYPT );

    $user_exists = check_user($user_data);

    if (false === $user_exists) {
        $stmt = "INSERT INTO users (username, email, password) VALUES ('$escaped_user', '$escaped_email', '$hashed_password')";

        $result = $mysqli->query($stmt);

        echo "user added, message sent";
    }

    else {
        echo "email taken";
    }
}

function confirm_user($user_data) {
    $password = $user_data['password'];

    $user = check_user($user_data);

    if (false === $user) {
        echo "please create a user account";
    }

    else {
        if (!password_verify($password, $user['password']))
        {
            echo "password is incorrect";
            return;
        }

        echo "message has been sent";
    }
}

function check_user($user_data) {
    global $mysqli;

    $escaped_email = mysqli_real_escape_string($mysqli, $user_data['email']);

    $stmt = "SELECT * FROM users WHERE email='$escaped_email'";

    $result = $mysqli->query($stmt);

    $user = $result->fetch_all(MYSQLI_ASSOC)[0];

    if ("" != $user['username']) {
        return $user;
    }

    else {
        return false;
    }
}