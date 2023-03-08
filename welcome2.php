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
            margin: 10px;
            cursor: pointer;
        }

        .candidate img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
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
    <h1>Presidential Candidates</h1>
    <div id="president">
        <?php
        // Array of president candidates
        $presidents = array(
            array("name" => "Candidate 1", "image" => "images/Samuel-L.-Jackson.jpg"),
            array("name" => "Candidate 2", "image" => "images/idris.webp"),
            array("name" => "Candidate 2", "image" => "images/Laurence_Fishburne-696x912.jpg"),
            array("name" => "Candidate 2", "image" => "images/Morgan-Freeman.jpg"),
            array("name" => "Candidate 3", "image" => "images/yetunde_1132x1224.jpg")
        );
        // Display president candidates
        foreach ($presidents as $candidate) {
            echo '<div class="candidate" onclick="handleClick.call(this)">';
            echo '<img src="' . $candidate["image"] . '">';
            echo '<p>' . $candidate["name"] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
    <h1>Vice Presidential Candidates</h1>
    <div id="vp">
        <?php
        // Array of vice president candidates
        $vps = array(
            array("name" => "Candidate 4", "image" => "images/shuri.jpg"),
            array("name" => "Candidate 5", "image" => "images/siddharth-gopalkrishnan_profile_1536x1152.webp"),
            array("name" => "Candidate 5", "image" => "images/portrait-young-african-american-business-woman-black-peop-people-51712509.jpg"),
            array("name" => "Candidate 5", "image" => "images/nomfanelo-magwentshu_profile_1536x1152.webp"),
            array("name" => "Candidate 6", "image" => "images/images.jpg")
        );
        // Display vice president candidates
        foreach ($vps as $candidate) {
            echo '<div class="candidate" onclick="handleClick.call(this)">';
            echo '<img src="' . $candidate["image"] . '">';
            echo '<p>' . $candidate["name"] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
    <h1>Secretarial Candidates</h1>
    <div id="secretary">
        <?php
        // Array of secretary candidates
        $secretaries = array(
            array("name" => "Candidate 7", "image" => "images/forest-whitaker.jpg"),
            array("name" => "Candidate 8", "image" => "images/Denzel-washington-1.jpg"),
            array("name" => "Candidate 8", "image" => "images/portrait-african-american-man_23-2149072179.avif"),
            array("name" => "Candidate 8", "image" => "images/1140-will-smith.web_.jpg"),
            array("name" => "Candidate 9", "image" => "images/515b37ba6bb3f71a3a000005.webp")
        );
        // Display secretary candidates
        foreach ($secretaries as $candidate) {
            echo '<div class="candidate" onclick="handleClick.call(this)">';
            echo '<img src="' . $candidate["image"] . '">';
            echo '<p>' . $candidate["name"] . '</p>';
            echo '</div>';
        }
        ?>
    </div>
    <!-- <button id="cast-vote" onclick="alert('Thanks for voting!')">Cast Vote</button> -->
<button id="cast-vote" onclick="location.href='adminScreen.php';">Cast Vote</button>


<script>
    // Enable cast vote button when all groups have at least one selection
    checkVoteValidity();
</script>
</body>

</html>