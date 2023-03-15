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
            text-align: center;
        }

        .candidate-container {
            padding: 10px;
        }

        .candidate-container img {
            background-color: #ccc;
            padding: 10px;
            border-radius: 50%;

            border: none;
            opacity: 0.6;
            
            width: 170px;
            height: 170px;
            object-fit: cover;
            object-position: center;
            margin-bottom: 10px;
        }

        .candidate-container img:hover {
            opacity: 1;
            cursor: pointer;
        }

        .candidate-container img.selected {
            opacity: 1;
            border: 3px solid green;
        }

        #addCandidateForm {
            display: none;
        }
        #castVoteButton{
            display: none;
            background-color: green;
            size: 100px;
            text-align: center;
            display: none;
            margin: auto;
            font-size: 24px;
            padding: 10px 20px;
        }
    </style>

</head>

<body>
    <?php
    //connect to the database
    include('connection.php');

    //declare arrays for presidential, vice presidential and secretarial candidates
    $presidentialCandidates = array();
    $vicePresidentialCandidates = array();
    $secretarialCandidates = array();

    //fetch presidential candidates from the database
    $sql = "SELECT * FROM candidates1 WHERE position='president'";
    $result = $conn->query($sql);

    echo "<h1>All Candidates</h1>";
    echo "<br>";
    //display presidential candidates
    echo "<h1>Presidential Candidates</h1>";
    echo "<form method='post' action='submit_vote.php'>";
    echo "<div style='display:flex; flex-wrap:wrap;'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //add presidential candidates to presidentialCandidates array
            array_push($presidentialCandidates, $row);
            echo "<div class='candidate-container'>";
            echo "<img name='presidentImage' src='" . $row["image"] . "' alt='" . $row["name"] . "' width='150' height='150'>";
            echo "<input type='checkbox' name='presidentCheckbox' value='" . $row["name"] . "'>";
            echo "<br>" . $row["name"] . "</div>";
        }
    }
    
    echo "<div class='candidate-container'>";
    echo "<br></div></div>";

    //fetch vice presidential candidates from the database
    $sql = "SELECT * FROM candidates1 WHERE position='vice president'";
    $result = $conn->query($sql);

    //display vice presidential candidates
    echo "<h1>Vice Presidential Candidates</h1>";
    echo "<div style='display:flex; flex-wrap:wrap;'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //add vice presidential candidates to vicePresidentialCandidates array
            array_push($vicePresidentialCandidates, $row);
            echo "<div class='candidate-container'>";
            echo "<img name='vicePresidentImage' src='" . $row["image"] . "' alt='" . $row["name"] . "' width='150' height='150'>";
            echo "<input type='checkbox' name='vicePresidentCheckbox' value='" . $row["name"] . "'>";
            echo "<br>" . $row["name"] . "</div>";
        }
    }
   
    echo "<div class='candidate-container'>";
    echo "<br></div></div>";

    //fetch secretary candidates from the database
    $sql = "SELECT * FROM candidates1 WHERE position='secretary'";
    $result = $conn->query($sql);

    //display secretary candidates
    echo "<h1>Secretarial Candidates</h1>";
    echo "<div style='display:flex; flex-wrap:wrap;'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //add secretarial candidates to secretarialCandidates array
            array_push($secretarialCandidates, $row);
            echo "<div class='candidate-container'>";
            echo "<img name='secretaryImage' src='" . $row["image"] . "' alt='" . $row["name"] . "' width='150' height='150'>";
            echo "<input type='checkbox' name='secretaryCheckbox' value='" . $row["name"] . "'>";
            echo "<br>" . $row["name"] . "</div>";
        }
    }
    echo "<div class='candidate-container'>";
    echo "<br></div></div>";
    echo "<br>";
    echo "<br>";
    echo "<input type='submit' id='castVoteButton' value='Cast Vote'>";
    echo "</form>";



    ?>

    <script>

        //select candidate image
        const presidentialImages = document.getElementsByName('presidentImage');
        const vicePresidentialImages = document.getElementsByName('vicePresidentImage');
        const secretarialImages = document.getElementsByName('secretaryImage');

        //checkbox for presidential candidates
        const presidentialCheckbox = document.getElementsByName('presidentCheckbox');
        //checkbox for vice presidential candidates
        const vicePresidentialCheckbox = document.getElementsByName('vicePresidentCheckbox');
        //checkbox for secretarial candidates
        const secretarialCheckbox = document.getElementsByName('secretaryCheckbox');

        //check if a candidate is selected from each position
        let presidentSelected = false;
        let vicePresidentSelected = false;
        let secretarySelected = false;

        for (let i = 0; i < presidentialImages.length; i++) {
            presidentialImages[i].addEventListener('click', () => {
                //deselect the previously selected image
                if (presidentSelected) {
                    presidentialImages[i - 1].classList.remove('selected');
                    presidentialCheckbox[i - 1].checked = false;
                }
                //select the current image
                presidentialImages[i].classList.add('selected');
                presidentialCheckbox[i].checked = true;
                presidentSelected = true;
                //show cast vote button if all positions have a candidate selected
                if (presidentSelected & vicePresidentSelected & secretarySelected) {
                    document.getElementById('castVoteButton').style.display = 'block';
                }
            });
        }

        for (let i = 0; i < vicePresidentialImages.length; i++) {
            vicePresidentialImages[i].addEventListener('click', () => {
                //deselect the previously selected image
                if (vicePresidentSelected) {
                    vicePresidentialImages[i - 1].classList.remove('selected');
                    vicePresidentialCheckbox[i - 1].checked = false;
                }
                //select the current image
                vicePresidentialImages[i].classList.add('selected');
                vicePresidentialCheckbox[i].checked = true;
                vicePresidentSelected = true;
                //show cast vote button if all positions have a candidate selected
                if (presidentSelected & vicePresidentSelected & secretarySelected) {
                    document.getElementById('castVoteButton').style.display = 'block';
                }
            });
        }

        for (let i = 0; i < secretarialImages.length; i++) {
            secretarialImages[i].addEventListener('click', () => {
                //deselect the previously selected image
                if (secretarySelected) {
                    secretarialImages[i - 1].classList.remove('selected');
                    secretarialCheckbox[i - 1].checked = false;
                }
                //select the current image
                secretarialImages[i].classList.add('selected');
                secretarialCheckbox[i].checked = true;
                secretarySelected = true;
                //show cast vote button if all positions have a candidate selected
                if (presidentSelected & vicePresidentSelected & secretarySelected) {
                    document.getElementById('castVoteButton').style.display = 'block';
                }
            });
        }
    </script>
</body>



</html>