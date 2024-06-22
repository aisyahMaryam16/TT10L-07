<html>
<head>
    <link rel="stylesheet" href="list.css">
    <link rel="stylesheet" href="button.css">
</head>
<body>
    <table>
        <?php
        include('connect.php');
        include("supervisor_menu.php");

        $choice = isset($_POST["choice"]) ? $_POST["choice"] : null;

        $header = "<tr>
                    <th>No</th>
                    <th>Name</th>";

        // Fetch aspects from database and construct header row
        $sql_aspect = "SELECT * FROM aspect ORDER BY AspectID ASC";
        $result_aspect = mysqli_query($connect, $sql_aspect);
        $aspect_ids = [];
        while ($aspect = mysqli_fetch_array($result_aspect)) {
            $header .= "<th>" . $aspect['aspect'] . "</th>";
            $aspect_ids[] = $aspect['AspectID']; // Store aspect IDs for later use
        }
        $header .= "<th>Total Score</th></tr>";

        // Output the header row
        echo $header;

        $requirement = "";
        if ($choice == 2) {
            $StewardID = isset($_POST["StewardID"]) ? $_POST["StewardID"] : null;
            $requirement = "WHERE steward.StewardID = '$StewardID'";
        }

        $No = 1;
        $sql_players = "SELECT DISTINCT player.player, player.IcNumber
                        FROM player
                        JOIN result ON player.IcNumber = result.IcNumber
                        JOIN steward ON player.StewardID = steward.StewardID
                        $requirement
                        ORDER BY player.player ASC";

        $result_players = mysqli_query($connect, $sql_players);

        while ($player = mysqli_fetch_array($result_players)) {
            $player_name = $player['player'];
            $player_ic = $player['IcNumber'];
            echo "<tr>
                    <td>" . $No . "</td>
                    <td class='name'>" . $player_name . "</td>";

            $total_score = 0;

            foreach ($aspect_ids as $aspect_id) {
                $sql_score = "SELECT ScoreObtained FROM result 
                              WHERE IcNumber = '$player_ic' AND AspectID = '$aspect_id'";
                $result_score = mysqli_query($connect, $sql_score);
                $score = mysqli_fetch_array($result_score);
                $score_value = isset($score['ScoreObtained']) ? $score['ScoreObtained'] : 0;
                echo "<td>" . $score_value . "</td>";
                $total_score += $score_value;
            }

            // Fetch the total score
            $sql_total = "SELECT Score FROM result
                          WHERE IcNumber = '$player_ic'
                          ORDER BY AspectID ASC
                          LIMIT 1"; // Assuming 'Score' column represents the total score
            $result_total = mysqli_query($connect, $sql_total);
            $total = mysqli_fetch_array($result_total);
            $total_value = isset($total['Score']) ? $total['Score'] : 0;

            echo "<td>" . $total_value . "</td></tr>";
            $No++;
        }
        ?>
    </table>
    <center><button class="print" onclick="window.print()">Print</button></center>
</body>

<html> 
    <link rel="stylesheet" href="list.css"> 
    <link rel="stylesheet" href="button.css"> 
    <body> 
        <table> 
            <?php 
                include('connect.php'); 
                include("supervisor_menu.php"); 
                 
                $choice = $_POST["choice"]; 
                $header = " <tr> 
                            <th>No</th> 
                            <th>Name</th>"; 
                             
                $sql = "select * from aspect order by AspectID asc"; 
                $data = mysqli_query($connect, $sql); 
                while ($aspect= mysqli_fetch_array($data)) { 
                    $header = $header."<th>".$aspect['AspectName']."</th>"; 
                } 
                $header = $header."<th>Score</th></tr>"; 
                 
                switch ($choice) { 
                    case 1 : $requirement = " "; 
                        $title = " <caption>FULL LIST OF MARKS</caption> "; 
                        break; 
                    case 2 : $StewardID = $_POST["StewardID"];
                        $requirement = "where steward.StewardID = '$StewardID' "; 
                        $title = " <caption>LIST OF PLAYERS BY FOLLOWING STEWARD</caption> "; 
                        break; 
                } 
                 
                echo $header; 
                $No = 1; 
                $sql = "select * from result join player on result.IcNumber = player.IcNumber 
                    join aspect on result.AspectID = aspect.AspectID 
                    join steward on player.StewardID = steward.StewardID $requirement 
                    order by result.Score desc, aspect.AspectID asc"; 
                     
                $data = mysqli_query($connect, $sql); 
                $a = 1; 
                $No = 1; 
                 
                while ($result = mysqli_fetch_array($data)) { 
                    if ($a == 1) 
                        echo "<tr> 
                            <td>".$No."</td> 
                            <td class='name'>".$result['PlayerName']."</td>"; 
                         
                    if ($a < 4) 
                        echo "<td>".$result['ScoreObtained']."</td>"; 
                         
                    $a = $a + 1; 
                    if ($a == 4) { 
                        echo "<td>".$result['Score']."</td>  </tr>"; 
                        $a = 1; 
                        $No = $No + 1; 
                    } 
                }  
            ?> 
        <caption><?php echo $title; ?> </caption> 
        </table> 
        <center><button class="print" onclick="window.print()">Print</button></center> 
    </body> 
    </html>

