steward_player.php
<?php
    session_start();
    include('connect.php');
    include("steward_menu.php");
?>

<html>
<head>
<link rel="stylesheet" href="list.css">
<link rel="stylesheet" href="button.css">
</head>
<body>
<table class="styled-table">

  <?php
    // Check if $_SESSION["name"] and $_SESSION["UserID"] are set
    if (!isset($_SESSION["name"]) || !isset($_SESSION["UserID"])) {
        // Handle session variables not set, redirect or display an error message
        echo "<tr><td colspan='100'>Session variables not set</td></tr>";
        exit; // Exit to prevent further execution
    }

    $name = $_SESSION["name"];
    $StewardID = $_SESSION['UserID'];

    // Construct the header row dynamically
    $header = "<tr><th>No</th><th>Name</th>";
    $sql = "SELECT * FROM aspect ORDER BY AspectID ASC";
    $result = mysqli_query($connect, $sql);
    if (!$result) {
        // Handle query error
        echo "<tr><td colspan='100'>Error fetching aspects: " . mysqli_error($connect) . "</td></tr>";
    } else {
        while ($aspect = mysqli_fetch_array($result)) {
            $header .= "<th>" . htmlspecialchars($aspect['aspect']) . "</th>"; // Use htmlspecialchars to prevent XSS
        }
        $header .= "<th>Total Score</th></tr>";

        // Output the header row
        echo $header;

        // Fetch data for the table body
        $No = 1;
        $sql = "SELECT player.player, result.ScoreObtained 
                FROM result
                JOIN player ON result.IcNumber = player.IcNumber
                JOIN aspect ON result.AspectID = aspect.AspectID
                JOIN steward ON player.StewardID = steward.StewardID
                WHERE steward.StewardID = ?
                ORDER BY player.player ASC, aspect.AspectID ASC";

        // Prepare and bind parameters for the query
        $stmt = mysqli_prepare($connect, $sql);
        mysqli_stmt_bind_param($stmt, "s", $StewardID);
        mysqli_stmt_execute($stmt);
        $data = mysqli_stmt_get_result($stmt);

        if (!$data) {
            // Handle query error
            echo "<tr><td colspan='100'>Error fetching results: " . mysqli_error($connect) . "</td></tr>";
        } else {
            $player = "";
            $total_score = 0;

            // Check if there are any rows returned
            if (mysqli_num_rows($data) > 0) {
                while ($result = mysqli_fetch_array($data)) {
                    if ($result['player'] != $player) {
                        if ($player != "") {
                            echo "<td>" . $total_score . "</td></tr>";
                        }
                        echo "<tr><td>" . $No . "</td><td>" . htmlspecialchars($result['player']) . "</td>";
                        $player = $result['player'];
                        $total_score = 0;
                        $No++;
                    }
                    echo "<td>" . $result['ScoreObtained'] . "</td>";
                    $total_score += $result['ScoreObtained'];
                }
                // Display total score for the last player
                echo "<td>" . $total_score . "</td></tr>";
            } else {
                // If no rows returned, display a message
                echo "<tr><td colspan='100'>No data available</td></tr>";
            }
        }
    }
    ?>
</table>
</body>
</html>