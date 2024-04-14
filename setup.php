<?php
session_start();
include_once 'connect.php';

$collab = "CREATE TABLE projects (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL UNIQUE,
        description TEXT NOT NULL,
        version TEXT NOT NULL,
        imgref VARCHAR(255) NOT NULL
        )";

if (true === $mysqli->query($collab)) {
    echo "Table projects created successfully  |  ";
} else {
    echo "Error creating table: " . $mysqli->error . "  |  ";
}

$des = "CREATE TABLE designers (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        fristname VARCHAR(255) NOT NULL,
        surname VARCHAR(255) NOT NULL
        )";

if (true === $mysqli->query($des)) {
    echo "Table designers created successfully  |  ";
} else {
    echo "Error creating table: " . $mysqli->error . "  |  ";
}

$week = "CREATE TABLE weekly_insights (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        date DATE NOT NULL,
        description TEXT NOT NULL
        )";

if (true === $mysqli->query($week)) {
    echo "Table weekly_insights created successfully  |  ";
} else {
    echo "Error creating table: " . $mysqli->error . "  |  ";
}

$ver = "CREATE TABLE versions (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        data_name VARCHAR(255) NOT NULL UNIQUE,
        version TEXT NOT NULL
        )";

if (true === $mysqli->query($ver)) {
    echo "Table versions created successfully  |  ";
} else {
    echo "Error creating table: " . $mysqli->error . "  |  ";
}

$ver = "CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
        )";

if (true === $mysqli->query($ver)) {
    echo "Table users created successfully  |  ";
} else {
    echo "Error creating table: " . $mysqli->error . "  |  ";
}
?>
