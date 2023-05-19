<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $email = $mysqli->real_escape_string($_POST["email"]);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($_POST["password"], $user["password_hash"])) {
            // Login successful
            session_start();
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["name"] = $user["name"];
            header("Location: user.php"); // Replace "welcome.php" with the appropriate destination after login
            exit;
        } else {
            // Invalid password
            die("Invalid email or password");
        }
    } else {
        // User not found
        die("Invalid email or password");
    }
}

?>

