<?php
require_once('./config.php');
require_once('./php/displayBook.php');

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
        <!-- <a href="add.php">Add New Item</a> -->
        <a href="#allBooks">All Products</a>
        <a href="#">Post a New Item</a>
        <a href="#">Cart</a>
        <a href="javascript:void(0);" class="icon" onclick="navMod()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <!-- nav end -->

    <!-- showcase section start -->
    <div class="showcase">
        <div class="logoDisplay">
            <h2>Welcome to</h2>
            <h1>Reo's Bookstore</h1>
            <img src="./images/book.svg" alt="logo">
        </div>
    </div>
    <!-- showcase section end -->

    <!-- search and sort start -->
        <form action="search.php" class="searchAndSort" method="post">
            <h1>Search Any Product by:
                <select>
                    <option>Title</option>
                    <option>Author</option>
                    <option>Genre</option>
                </select>
            </h1>
            <div class="searchSortField">
                <div class="searchField">
                    <input type="text" placeholder="Search..." name="searchBox">
                    <button type="submit" name="search">Search</button>
                    </div>
                </div>
                <button><a href="add.php" class="addButton">Post a New Item</a></button>
            </form>



    <!-- search and sort end -->

    <script src="./js/main.js"></script>
</body>

</html>