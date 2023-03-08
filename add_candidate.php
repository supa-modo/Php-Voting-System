<?php
//connect to the database
include('connection.php');

//get form data
$name = $_POST["name"];
$position = $_POST["position"];
$image = $_FILES["image"]["name"];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

//upload image file
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //insert new candidate into database
    $sql = "INSERT INTO candidates1 (name, position, image) VALUES ('$name', '$position', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "New candidate added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

//close the database connection
$conn->close();
?>
