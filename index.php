<?php
require_once('./php/displayBook.php');
require_once('./config.php');

$conn = new mysqli($config['DB_HOST'], $config["DB_USERNAME"], $config["DB_PASSWORD"], $config["DB_DATABASE"]) or die(mysqli_error($conn));


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reo's Bookstore</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- nav start -->
    <div class="topnav" id="myTopnav">
        <a href="index.php" class="active">Home</a>
        <a href="#featured">Featured</a>
        <a href="add.php">Add New Item</a>
        <a href="#allBooks">All Products</a>
        <a href="javascript:void(0);" class="icon" onclick="navMod()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- nav end -->

    <script src="./js/main.js"></script>
</body>

</html>