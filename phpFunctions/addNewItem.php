<?php
  if (isset($_POST['uploadNew'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        if ($fileSize < 5000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = 'images/'.$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);

          $newTitle = $_POST['newTitle'];
          $newAuthor = $_POST['newAuthor'];
          $newPrice = $_POST['newPrice'];
          $newGenre = $_POST['newGenre'];
          $newRating = $_POST['newRating'];

          $conn = new mysqli("localhost", "your_username", "your_password", "bookstore") or die(mysqli_error($conn));


          $conn->query("ALTER TABLE inventory MODIFY id integer");
          $conn->query("ALTER TABLE inventory DROP PRIMARY KEY");
          $conn->query("UPDATE inventory SET id = 0");
          $conn->query("ALTER TABLE inventory MODIFY id int");
          $conn->query("ALTER TABLE inventory MODIFY COLUMN id int NOT NULL Primary Key auto_increment First");

          $stmt = $conn->prepare("INSERT INTO inventory (title, author, price, image, rating, genre) VALUES(?,?,?,?,?,?)");
          $stmt->bind_param('ssssss', $newTitle, $newAuthor, $newPrice, $fileNameNew, $newRating, $newGenre);
          $stmt->execute();

          $conn->query("ALTER TABLE inventory MODIFY id integer");
          $conn->query("ALTER TABLE inventory DROP PRIMARY KEY");
          $conn->query("UPDATE inventory SET id = 0");
          $conn->query("ALTER TABLE inventory MODIFY id int");
          $conn->query("ALTER TABLE inventory MODIFY COLUMN id int NOT NULL Primary Key auto_increment First");

          header("Location: ../index.php#new");
        } else {
          echo "Your file is too large.";
        }
      } else {
        echo "There was an error uploading your file.";
      }
    } else {
      echo "You cannot upload files of this type.";
    }

  }

 ?>
