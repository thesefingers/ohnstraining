<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="user.css">
    <title>User Dashboard</title>
</head>
<body>
<?php
session_start();
// Retrieve the user's name from the session

$name = isset($_SESSION["name"]) ? $_SESSION["name"] : "Guest";
$course = isset($_SESSION["course"]) ? $_SESSION["course"] : "No course";

?>
    <div class="sidebar">
        
            <a href="index.html">
                <img class="logo animate__animated animate__delay-2s animate__fadeIn" src="images/updatedgold1.png" alt="logo">
            </a>
        
        <div class="sidebar-header">
        <h3><?php echo isset($name) ? $name : "Guest"; ?></h3> <!-- Display the user's name or "Guest" if not available -->
            <p>Student</p>
        </div>
        <ul class="sidebar-menu">
          
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="settings.html">
                <i class="fas fa-cog animate__animated animate__slow animate__bounceInRight">
                    <span class="nav-item">Settings</span>
                </i>
            </a></li>
            <li><a href="index.html">
                <i class="fas fa-sign-out animate__animated animate__slow animate__fadeInDown">
                    <span class="nav-item">Logout</span>
                </i>
            </a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Welcome to your dashboard, <?php echo isset($name) ? $name : "Guest"; ?>!</h1>
        <p>Here, you can view your progress, enroll in new courses, and customize your settings.</p>
    
        <div class="course-container">
            <h2>My Courses</h2>
            <div class="course-card">
                <h3><?php echo $course; ?></h3>
                <p>Acquired</p>
            </div>
           
            <div class="course-card">
                <h3><?php echo $course; ?></h3>
                <p>Acquired</p>
            </div>
        </div>
    
        <div class="announcement-container">
            <h2>Announcements</h2>
            <div class="announcement">
                <h3>Blogs Coming Soon</h3>
                <p>We have an upcoming exam in Introduction to Biology on May 10th. Make sure you're prepared!</p>
            </div>
            <div class="announcement">
                <h3>New Course Available</h3>
                <p>We've just released a new course in Machine Learning. Check it out!</p>
            </div>
        </div>
    </div>
    
</body>
</html>

</body>
</html>