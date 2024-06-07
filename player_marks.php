<?php 
    session_start(); 
    include ('connect.php'); 
    include("player_menu.php"); 
    $name = $_SESSION["name"]; 
    $IcNumber = $_SESSION["UserID"]; 
     
    $position = 0; 
    $sql = "select * from result 
        join player on result.IcNumber = player.IcNUmber 
        join aspect on result.AspectID = aspect.AspectID 
        join steward on player.StewardID = steward.StewardID 
        group by player.IcNumber order by result.Score desc"; 
         
    $data = mysqli_query($connect, $sql); 
    $bil = 0; 
    while ($result = mysqli_fetch_array($data)) { 
        $bil = $bil + 1; 
        if ($result['IcNumber'] == $IcNumber) 
            $position = $bil; 
             
    }// tamat while 
?> 
 
<link rel="stylesheet" href="list.css"> 
 
<table> 
    <caption>Player Name : <?php echo $name ?></caption> 
    <tr> 
        <th>Aspect Name</th> 
        <th>Total Marks</th> 
        <th>Score Obtained</th> 
    </tr> 
    <?php 
        $sql = "select * from result 
            join aspect on result.AspectID = aspect.AspectID 
            where IcNumber = '$IcNumber' "; 
        $data = mysqli_query($connect, $sql); 
        $total = mysqli_num_rows($data); 
        if ($total > 0)  
{ 
            while ($result = mysqli_fetch_array($data))  
{ 
                echo "<tr > 
                    <td>$result[AspectName]</td> 
                    <td>$result[TotalMarks]</td> 
                    <td>$result[ScoreObtained]</td> 
                    </tr>"; 
                $Score = $result['Score']; 
            } 
            echo "<tr class='Score'> <td ></td> 
                    <td class='Score'>Score</td> 
                    <td>$Score</td> 
                    </tr>"; 
            if ($kedudukan != 0) 
                echo "<tr class='Score'><td ></td> 
                    <td class='Score'>Place</td> 
                    <td>$place/$bil</td> 
                    </tr></table>"; 
        } // if 
        else { 
            echo "<tr ><td>marks</td><td>haven't</td><td>calculate</td> 
                    </tr></table>"; 
        } ?>