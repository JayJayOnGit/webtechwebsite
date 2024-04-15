<?php
session_start();
include_once 'connect.php';

function get_version($data_name) {
    global $mysqli;

    // SQL query to select the option from the database
    $version_query = 'SELECT * FROM `versions`
            WHERE 
            `data_name` =  "' . mysqli_real_escape_string($mysqli, $data_name) . '"               
            LIMIT 0, 1';

    // Execute the query
    $result = $mysqli->query($version_query);

//    echo  ['version'];

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $version = $result->fetch_all(MYSQLI_ASSOC);

        // Check if the options are returned as an array and are not empty
        if (is_array($version) && !empty($version)) {
            // Return the value of the option
            return $version[0]['version'];
        }
    }

    // Return false if the option does not exist or query failed
    return false;
}

function update_projects($table_data, $current_version) {
    global $mysqli;

    foreach ($table_data as $row)
    {
        $title = mysqli_real_escape_string($mysqli, $row['title']);
        $description = mysqli_real_escape_string($mysqli, $row['description']);
        $version = mysqli_real_escape_string($mysqli, $current_version);
        $imgref = mysqli_real_escape_string($mysqli, $row['imgref']);

        $insert_stmt = "INSERT INTO projects (title, description, version, imgref) 
                        VALUES ('$title', '$description', '$version', '$imgref')
                        ON DUPLICATE KEY UPDATE
                        title='$title', description='$description', version='$version', imgref='$imgref'
                        ";

        $result = $mysqli->query($insert_stmt);
    }
}

include_once 'data.php';

function check_version($name, $current_version) {
    global $mysqli;

    $old_version = get_version("$name");

    $escaped_name = mysqli_real_escape_string($mysqli, $name);
    $escaped_version = mysqli_real_escape_string($mysqli, $current_version);

    if (false === $old_version) {
        $add_version = "INSERT INTO versions (data_name, version)
                        VALUES ('$escaped_name', '$escaped_version')";

        if (true === $mysqli->query($add_version)) {
            echo "version " . $current_version . " added.";
        } else {
            echo "Error: " . $mysqli->error;
        }

        return true;
    }

    if (version_compare($current_version, $old_version, '>'))
    {
        $update_version = "UPDATE versions SET version='$escaped_version' WHERE data_name='$escaped_name'";

        if (true === $mysqli->query($update_version)) {
            echo "version " . $current_version . " updated.";
        } else {
            echo "Error: " . $mysqli->error;
        }
    }

    return true;
}

$new_projects = check_version("projects", $version);

if (true === $new_projects) {
    echo "updating projects";
    update_projects($projects_data, $version);
}

?>