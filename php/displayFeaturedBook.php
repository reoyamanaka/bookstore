<?php 
function displayFeaturedBook($id){
    $con = new mysqli('localhost', 'your_username', 'your_password', 'bookstore') or die(mysqli_error($con));
    $stmt = $con->prepare("SELECT * FROM inventory WHERE id=?");
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
    <ul class='unorderedItemList'>
      <li>
        <h3>$title</h3>
      </li>
      <li>
        <img src='$image' /></li>
      <li>
        <span class='itemSubHeader'>By</span>: $author
      </li>
      <li>
        <span class='itemSubHeader'>Price</span>: $$price
      </li>
      <li>
        <span class='itemSubHeader'>Genre:</span>: $genre
      </li>
      <li>
        <span class='itemSubHeader'>Rating</span>: $rating / 5
      </li>
      <li>
        <button class='addToCartBtn' onclick='addToCart($id)'>Add to Cart</button>
      </li>
    </ul>
    ";
  }


?>
