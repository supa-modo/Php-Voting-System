<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidates</title>
    <style>
    body {
        background-color: lightgray;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .candidate-container img {
        background-color: #ccc;
        padding: 10px;
        border-radius: 50%;
        border: none;

        width: 145px;
        height: 145px;
        object-fit: cover;
        object-position: center;
        margin-bottom: 10px;
    }
</style>


</head>

<body>
    <?php
    //connect to the database
    include('connection.php');

    //fetch presidential candidates from the database
    $sql = "SELECT * FROM candidates1 WHERE position='president'";
    $result = $conn->query($sql);

    echo "<h1>All Candidates</h1>";
    echo "<br>";
    //display presidential candidates
    echo "<h1>Presidential Candidates</h1>";
    echo "<div style='display:flex; flex-wrap:wrap;'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='candidate-container' style='padding:10px;'>";
            echo "<img class='candidate-img' src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
            echo "<br>" . $row["name"] . "</div>";
        }
        
    }
    //add candidate button
    echo "<div style='padding:10px;'>";
    echo "<img src='images/plus.png' alt='Add Candidate' width='145' height='145' onclick='showForm()'>";
    echo "<br>Add Candidate</div></div>";

    //fetch vice presidential candidates from the database
    $sql = "SELECT * FROM candidates1 WHERE position='vice president'";
    $result = $conn->query($sql);

    //display vice presidential candidates
    echo "<h1>Vice Presidential Candidates</h1>";
    echo "<div style='display:flex; flex-wrap:wrap;'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='candidate-container' style='padding:10px;'>";
            echo "<img class='candidate-img' src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
            echo "<br>" . $row["name"] . "</div>";
        }
        
    }
    //add candidate button
    echo "<div style='padding:10px;'>";
    echo "<img src='images/plus.png' alt='Add Candidate' width='145' height='145' onclick='showForm()'>";
    echo "<br>Add Candidate</div></div>";

    //fetch secretary candidates from the database
    $sql = "SELECT * FROM candidates1 WHERE position='secretary'";
    $result = $conn->query($sql);

    //display secretary candidates
    echo "<h1>Secretarial Candidates</h1>";
    echo "<div style='display:flex; flex-wrap:wrap;'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='candidate-container' style='padding:10px;'>";
            echo "<img class='candidate-img' src='" . $row["image"] . "' alt='" . $row["name"] . "'>";
            echo "<br>" . $row["name"] . "</div>";
        }
        
    }
    //add candidate button
    echo "<div style='padding:10px;'>";
    echo "<img src='images/plus.png' alt='Add Candidate' width='145' height='145' onclick='showForm()'>";
    echo "<br>Add Candidate</div></div>";

    //HTML form for adding candidates
    echo "<div id='addCandidateForm' style='display:none;'>";
    echo "<h1>Add Candidate</h1>";
    echo "<form action='add_candidate.php' method='post' enctype='multipart/form-data'>";
    echo "<label for='name'>Name:</label>";
    echo "<input type='text' id='name' name='name' required>";
    echo "<br><br>";
    echo "<label for='position'>Position:</label>";
    echo "<select id='position' name='position' required>";
    echo "<option value='president'>President</option>";
    echo "<option value='vice president'>Vice President</option>";
    echo "<option value='secretary'>Secretary</option>";
    echo "</select>";
    echo "<br><br>";
    echo "<label for='image'>Image:</label>";
    echo "<input type='file' id='image' name='image' accept='image/*' required>";
    echo "<br><br>";
    echo "<input type='submit' value='Submit'>";

    echo "<input type='button' value='Cancel' onclick='hideForm()'>";
    echo "</form>";
    echo "</div>";

    ?>

    <script>
        //function to show the add candidate form
        function showForm() {
            document.getElementById('addCandidateForm').style.display = 'block';
        }
        //function to hide the add candidate form
        function hideForm() {
            document.getElementById('addCandidateForm').style.display = 'none';
        }
    </script>
</body>

</html>