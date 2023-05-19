<?php
$host = "localhost";
$dbname = "ohn_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host, // ! using named arguments reduces chances of position error, disregarding order of placement
                     database: $dbname, 
                     username: $username,
                     password: $password 

                    );

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>
