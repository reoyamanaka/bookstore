<?php
require_once('./php/fetchAll.php');
session_start();

$conn = new mysqli('localhost','your_username','your_password','bookStore') or die(mysqli_error($conn));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reo's Bookstore</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>


    <script src="./js/main.js"></script>
</body>
</html>