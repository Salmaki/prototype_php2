<?php 
session_start();
if($_SESSION['auth']!== "true"){
    header("Location: login.php");
    exit(); 
}

$user_name = $_SESSION['user_name'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome,<?= $user_name ?></h1>
    <a href="logout.php">logout</a>
</body>
</html>