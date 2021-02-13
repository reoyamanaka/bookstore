<?php
// require_once('../config.php');
echo $config;
$conn = new mysqli("localhost", "your_username", "your_password", "bookstore") or die(mysqli_error($conn));

function displayBook($id){
    
    $conn = new mysqli("localhost", "your_username", "your_password", "bookstore") or die(mysqli_error($conn));
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE id=?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_object();
    $title = $value->title;
    $author = $value->author;
    $price = $value->price;
    $image = $value->image;
    $image = "./images/".$image;
    $rating=$value->rating;
    $genre=$value->genre;
    $quantity = $value->quantity;
    //print_r($value);
    echo "
    <tr>
      <td><img src='$image' /></td>
      <td>$title</td>
      <td>$author</td>
      <td>$$price</td>
      <td>$genre</td>
      <td>$rating / 5</td>

    </tr>
    ";
}


?>