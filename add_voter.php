<?php
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voter_id = $_POST['voter_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO voters (voter_id, username, password) VALUES ('$voter_id', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New voter added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
