<?php
session_start();

if(!isset($_SESSION['user'])) {
    header('location: index.php');
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div style=" height: 100vh; width: 100vw; display: flex; justify-content: center; align-items: center; font-size: 60px; ">
        Welcome!<br><br><br><br>
        <button><a href="logout.php">log out</a></button>
    </div>

</body>
</html>