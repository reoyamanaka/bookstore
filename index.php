<?php
require_once('./config.php');
require_once('./php/displayBook.php');
require_once('./php/displayFeaturedBook.php');
require_once('./php/getTotalCount.php');

$conn = new mysqli($config['DB_HOST'], $config["DB_USERNAME"], $config["DB_PASSWORD"], $config["DB_DATABASE"]) or die(mysqli_error($conn));

$sumCount = getTotalCount();

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
            <select style="
                    font-size: 1.5rem;
                    text-align: center;
                    width: 8rem;
                ">
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

    <!-- featured start -->
    <div class="featured" id="featured">
        <h2>Featured Books</h2>
        <div class="featuredItems">
            <?php displayFeaturedBook(2); ?>
            <?php displayFeaturedBook(6); ?>
        </div>
    </div>
    <!-- featured end -->


    <!-- all books start -->
    <div class="allBooks" id="allBooks">
        <h2>All Books</h2>
        <div class="allItems">
            <table>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Add to Cart</th>
                </tr>
                <?php

                for ($i = 1; $i < $sumCount + 1; $i++) {
                    displayBook($i);
                } ?>

            </table>
        </div>
    </div>
    <!-- all books end -->

    <div class="year" id="new">©<?php echo date("Y");?> Reo Yamanaka. All rights reserved.</div>  

    <script src="./js/main.js"></script>
</body>

</html>