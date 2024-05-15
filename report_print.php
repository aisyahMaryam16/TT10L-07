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
                $sql = "select * from result join contestant on result.IcNumber = contestant.IcNumber 
                    join criteria on result.CriteriaID = criteria.CriteriaID 
                    join judge on contestant.JudgeID = judge.JudgeID $requirement 
                    order by result.Score desc, criteria.CriteriaID asc"; 
                     
                $data = mysqli_query($sambungan, $sql); 
                $a = 1; 
                $No = 1; 
                 
                while ($result = mysqli_fetch_array($data)) { 
                    if ($a == 1) 
                        echo "<tr> 
                            <td>".$No."</td> 
                            <td class='name'>".$result['ContestantName']."</td>"; 
                         
                    if ($a < 4) 
                        echo "<td>".$result['ScoreObtained']."</td>"; 
                         
                    $a = $a + 1; 
                    if ($a == 4) { 
                        echo "<td>".$result['Score']."</td>  </tr>"; 
                        $a = 1; 
                        $No = $No + 1; 
                    } //tamat if 
                } // tamat while 
            ?> 
        <caption><?php echo $title; ?> </caption> 
        </table> 
        <center><button class="print" onclick="window.print()">Print</button></center> 
    </body> 
    </html>