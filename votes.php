<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votes</title>

    <style>
        body {
            text-align: center;
            background-color: lightgray;
        }
    .candidate {
        display: inline-block;
        text-align: center;
        margin-right: 20px;
    }

    .candidate img {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        object-fit: cover;
        object-position: center;
        margin-bottom: 10px;
    }

    .candidate span {
        font-size: 16px;
        font-weight: bold;
        display: block;
    }

    .candidate p {
        font-size: 14px;
        margin: 0;
    }
</style>

</head>
<body>
<?php
// Replace the following with your own database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "database1";
$table = "candidates1";

// Create a PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Fetch the presidential candidates
$stmt = $pdo->prepare("SELECT * FROM $table WHERE position = 'president'");
$stmt->execute();
$candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the presidential candidates
echo "<h1>Presidential Candidates</h1>";
echo "<div>";
foreach ($candidates as $candidate) {
    echo "<div class='candidate'>";
    echo "<img src='{$candidate['image']}' alt='{$candidate['name']}'><br>";
    echo "<span>{$candidate['name']}</span>";
    echo "<p>Votes: {$candidate['votes']}</p>";
    echo "</div>";
}
echo "</div>";

// Fetch the vice presidential candidates
$stmt = $pdo->prepare("SELECT * FROM $table WHERE position = 'vice president'");
$stmt->execute();
$candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the vice presidential candidates
echo "<h1>Vice Presidential Candidates</h1>";
echo "<div>";
foreach ($candidates as $candidate) {
    echo "<div class='candidate'>";
    echo "<img src='{$candidate['image']}' alt='{$candidate['name']}'><br>";
    echo "<span>{$candidate['name']}</span>";
    echo "<p>Votes: {$candidate['votes']}</p>";
    echo "</div>";
}
echo "</div>";

// Fetch the secretarial candidates
$stmt = $pdo->prepare("SELECT * FROM $table WHERE position = 'secretary'");
$stmt->execute();
$candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the secretarial candidates
echo "<h1>Secretarial Candidates</h1>";
echo "<div>";
foreach ($candidates as $candidate) {
    echo "<div class='candidate'>";
    echo "<img src='{$candidate['image']}' alt='{$candidate['name']}'><br>";
    echo "<span>{$candidate['name']}</span>";
    echo "<p>Votes: {$candidate['votes']}</p>";
    echo "</div>";
}
echo "</div>";
?>
</body>
</html>
