<?php

$servername = "localhost";
// REPLACE with your Database name
$dbname = "u7973178_airwatcher2";
// REPLACE with Database user
$username = "u7973178_airwatcher2";
// REPLACE with Database user password
$password = "airwatcher2";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. If you change this value, the ESP32 sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $value = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $mac = test_input($_POST["mac"]);
        $temp = test_input($_POST["temp"]);
        $humid = test_input($_POST["humid"]);
        $pres = test_input($_POST["pres"]);
        $alt = test_input($_POST["alt"]);
        $pm1_0 = test_input($_POST["pm1_0"]);
        $pm2_5 = test_input($_POST["pm2_5"]);
        $pm10_0 = test_input($_POST["pm10_0"]);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO data (mac, temp, humid, pres, alt, pm1_0, pm2_5, pm10_0)
        VALUES ('" . $mac . "', '" . $temp . "', '" . $humid . "', '" . $pres . "', '" . $alt . "', '" . $pm1_0 . "', '" . $pm2_5 . "', '" . $pm10_0 . "')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }

}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
