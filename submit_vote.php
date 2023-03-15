<?php
//connect to the database
include('connection.php');

//get the values of the checked checkboxes
$presidentChecked = $_POST['presidentCheckbox'];
$vicePresidentChecked = $_POST['vicePresidentCheckbox'];
$secretaryChecked = $_POST['secretaryCheckbox'];

//update the votes of the selected candidates
$sql = "UPDATE candidates1 SET votes=votes+1 WHERE name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $presidentChecked);
$stmt->execute();
$stmt->close();

$sql = "UPDATE candidates1 SET votes=votes+1 WHERE name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $vicePresidentChecked);
$stmt->execute();
$stmt->close();

$sql = "UPDATE candidates1 SET votes=votes+1 WHERE name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $secretaryChecked);
$stmt->execute();
$stmt->close();

//redirect to the voting page
header('Location:thankyou.php');
?>