<?php
session_start();

if (empty($_POST["name"])) {
    die("Name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email required!");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords do not match!");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, course, password_hash)
        VALUES (?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
    $_POST["name"],
    $_POST["email"],
    $_POST["course"],
    $password_hash);

if ($stmt->execute()) {
    // Registration successful
    $name = $_POST["name"]; //! Set the $name variable with the user's name value
    session_start();
    $_SESSION["name"] = $name; //! Store the name in a session variable for later use

    $course = $_POST["course"];
    $courseUrl = "";

    if ($course === "Forex Course") {
        $courseUrl = "buyForexCourse.php";

    } elseif ($course === "General Online Mentorship") {
        $courseUrl = "buyOnlineMentorship.php";

    } elseif ($course === "One On One Sessions") {
        $courseUrl = "buyOneOnOne.php";
    }

    header("Location: " . $courseUrl); //! Redirect to the user page
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

?>
