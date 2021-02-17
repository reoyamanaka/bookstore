<?php

function getTotalCount(){
    $conn = new mysqli('localhost', 'your_username', 'your_password', 'bookstore') or die(mysqli_error($conn));
    $sql = "SELECT COUNT(*) AS total_count FROM inventory";
    $req = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($req);
    $sumCount = $data['total_count'];

    return $sumCount;
}



?>