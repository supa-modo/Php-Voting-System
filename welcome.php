
<!DOCTYPE html>
<html>

<head>
    <title>Vote for Candidates</title>
    <style>
        body {
            text-align: center;
            background-color: lightgray;
        }
        /* Styling for candidate images and names */
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

        .candidate p {
            margin-top: 5px;
            font-size: 18px;
        }

        /* Styling for disabled candidate images */
        .candidate.disabled img {
            opacity: 0.5;
        }

        /* Styling for selected candidate */
        .candidate.selected img {
            border: 4px solid green;
        }

        /* Styling for cast vote button */
        #cast-vote {
            display: none;
            background-color: green;
            size: 100px;
            text-align: center;
            display: none;
            margin: auto;
            font-size: 24px;
            padding: 10px 20px;
        }

        #cast-vote.enabled {
            display: block;
        }
    </style>
    <script>
        // Disable other buttons when one is clicked
        function disableOtherButtons(button) {
            var siblings = button.parentNode.childNodes;
            for (var i = 0; i < siblings.length; i++) {
                if (siblings[i].nodeName == "DIV" && siblings[i] != button) {
                    siblings[i].classList.add("disabled");
                    siblings[i].removeEventListener("click", handleClick);
                }
            }
            checkVoteValidity();
        }

        // Enable cast vote button if all groups have at least one selection
        function checkVoteValidity() {
            var president = document.querySelector("#president .selected");
            var vp = document.querySelector("#vp .selected");
            var secretary = document.querySelector("#secretary .selected");
            if (president && vp && secretary) {
                document.querySelector("#cast-vote").classList.add("enabled");
            } else {
                document.querySelector("#cast-vote").classList.remove("enabled");
            }
        }

        // Handle candidate selection
        function handleClick() {
            var selected = this.classList.toggle("selected");
            if (selected) {
                disableOtherButtons(this);
            } else {
                this.classList.remove("disabled");
                checkVoteValidity();
            }
        }
    </script>
</head>

<body>
    <?php
    
include("connection.php");

    $presidents_sql = "SELECT * FROM candidates1 WHERE position='President'";
    $vps_sql = "SELECT * FROM candidates1 WHERE position='Vice President'";
    $secretaries_sql = "SELECT * FROM candidates1 WHERE position='Secretary'";

    $presidents_result = $conn->query($presidents_sql);
    $vps_result = $conn->query($vps_sql);
    $secretaries_result = $conn->query($secretaries_sql);
    ?>
    <h1>Presidential Candidates</h1>
    <div id="president">
        <?php
        // Display president candidates
        if ($presidents_result->num_rows > 0) {
            while ($row = $presidents_result->fetch_assoc()) {
                echo '<div class="candidate" onclick="handleClick.call(this)">';
                echo '<img src="' . $row["image"] . '">';
                echo '<p>' . $row["name"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No candidates found.";
        }
        ?>
    </div>
    <h1>Vice Presidential Candidates</h1>
    <div id="vp">
        <?php
        // Display vice president candidates
        if ($vps_result->num_rows > 0) {
            while ($row = $vps_result->fetch_assoc()) {
                echo '<div class="candidate" onclick="handleClick.call(this)">';
                echo '<img src="' . $row["image"] . '">';
                echo '<p>' . $row["name"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No candidates found.";
        }
        ?>
    </div>
    <h1>Secretarial Candidates</h1>
    <div id="secretary">
        <?php
        // Display secretary candidates
        if ($secretaries_result->num_rows > 0) {
            while ($row = $secretaries_result->fetch_assoc()) {
                echo '<div class="candidate" onclick="handleClick.call(this)">';
                echo '<img src="' . $row["image"] . '">';
                echo '<p>' . $row["name"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "No candidates found.";
        }
        ?>
    </div>
    <button id="cast-vote" onclick="location.href='adminScreen.php';" class="disabled">Cast Vote</button>
</body>

</html>