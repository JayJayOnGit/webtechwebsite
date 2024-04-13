<?php
session_start();
include_once 'connect.php';

$collab = "CREATE TABLE collaorator_projects (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        date DATE NOT NULL,
        description TEXT NOT NULL,
        imgref VARCHAR(255) NOT NULL
        )";

if ($mysqli->query($collab) === TRUE) {
    echo "Table collaorator_projects created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$des = "CREATE TABLE designers (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fristname VARCHAR(255) NOT NULL,
        surname VARCHAR(255) NOT NULL
        )";

if ($mysqli->query($des) === TRUE) {
    echo "Table designers created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$princ = "CREATE TABLE principals (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fristname VARCHAR(255) NOT NULL,
        surname VARCHAR(255) NOT NULL,
        description TEXT NOT NULL
        )";

if ($mysqli->query($princ) === TRUE) {
    echo "Table principals created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$week = "CREATE TABLE weekly_insights (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        date DATE NOT NULL,
        description TEXT NOT NULL
        )";

if ($mysqli->query($week) === TRUE) {
    echo "Table weekly_insights created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}
?>
