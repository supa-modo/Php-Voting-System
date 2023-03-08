<!DOCTYPE html>
<html>

<head>
    <title>Voters Table</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        th {
            font-weight: bold;
        }
        body{
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <h1>Voters Table</h1>
    <button onclick="document.getElementById('add-voter-form').style.display='block'">Add New Voter</button>
    <br><br>

    <div id="add-voter-form" style="display:none">
        <form action="add_voter.php" method="POST">
            <label for="voter-id">Voter ID:</label>
            <input type="number" name="voter_id" required><br><br>

            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <input type="submit" value="Add Voter">
            <button type="button" onclick="document.getElementById('add-voter-form').style.display='none'">Cancel</button><br><br>
        </form>
    </div>

    <?php
    include('connection.php');

    // Pagination variables
    $results_per_page = 15;
    $current_page = 1;
    if (isset($_GET['page'])) {
        $current_page = $_GET['page'];
    }
    $offset = ($current_page - 1) * $results_per_page;

    // Get total number of voters
    $sql = "SELECT COUNT(*) as count FROM voters";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $total_results = $row['count'];
    $total_pages = ceil($total_results / $results_per_page);

    // Get voters for current page
    $sql = "SELECT * FROM voters LIMIT $offset, $results_per_page";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "<table><tr><th>ID</th><th>Voter ID</th><th>Username</th><th>Password</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["voter_id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["password"] . "</td></tr>";
        }
        echo "</table>";

        // Pagination links
        echo "<br><br>";
        echo "<div>";
        if ($current_page > 1) {
            echo "<a href='?page=" . ($current_page - 1) . "'>Previous</a>";
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i'>$i</a> ";
        }
        if ($current_page < $total_pages) {
            echo "<a href='?page=" . ($current_page + 1) . "'>Next</a>";
        }
        echo "</div>";
    } else {
        echo "No voters found.";
    }
    $conn->close();
    ?>

</body>

</html>