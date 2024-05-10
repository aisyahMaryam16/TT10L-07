<?php 
    session_start(); 
    include ('sambungan.php'); 
    include("contestant_menu.php"); 
    $name = $_SESSION["name"]; 
    $IcNumber = $_SESSION["UserID"]; 
     
    $position = 0; 
    $sql = "select * from result 
        join contestant on result.IcNumber = contestant.IcNUmber 
        join criteria on result.CriteriaID = criteria.CriteriaID 
        join judge on contestant.JudgeID = judge.JudgeID 
        group by contestant.IcNumber order by result.Score desc"; 
         
    $data = mysqli_query($sambungan, $sql); 
    $bil = 0; 
    while ($result = mysqli_fetch_array($data)) { 
        $bil = $bil + 1; 
        if ($result['IcNumber'] == $IcNumber) 
            $position = $bil; 
             
    }// tamat while 
?> 
 
<link rel="stylesheet" href="list.css"> 
 
<table> 
    <caption>Contestant Name : <?php echo $name ?></caption> 
    <tr> 
        <th>Criteria Name</th> 
        <th>Total Marks</th> 
        <th>Score Obtained</th> 
    </tr> 
    <?php 
        $sql = "select * from result 
            join criteria on result.CriteriaID = criteria.CriteriaID 
            where IcNumber = '$IcNumber' "; 
        $data = mysqli_query($sambungan, $sql); 
        $bilrekod = mysqli_num_rows($data); 
        if ($bilrekod > 0)  
{ 
            while ($result = mysqli_fetch_array($data))  
{ 
                echo "<tr > 
                    <td>$result[CriteriaName]</td> 
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