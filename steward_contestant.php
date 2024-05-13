<?php
    session_start();
    include('sambungan.php');
    include("judge_menu.php");
?>

<html>
<link rel="stylesheet" href="list.css">
<link rel="stylesheet" href="button.css">

<body>
<table>
<caption>LIST OF CONTESTANTS BY FOLLOWING JUDGE</caption>

<?php
    $name = $_SESSION["name"];
    $JudgeID = $_SESSION['UserID'];
    
    $header = " <tr><th>No</th>
                    <th>Name</th>";
                    
    $sql = "select * from criteria order by CriteriaID asc";
    
    $data = mysqli_query($sambungan, $sql);
    while ($criteria = mysqli_fetch_array($data)) {
        $header = $header."<th>".$criteria['CriteriaName']."</th>";
    }
    $header = $header."<th>Score</th></tr>";
    
    echo $header;
    $No = 1;
    $sql = "select * from result
    join contestant on result.IcNumber = contestant.IcNumber
    join criteria on result.CriteriaID = criteria.CriteriaID
    join judge on contestant.JudgeID = judge.JudgeID where judge.JudgeID = '$JudgeID'
    
    order by result.Score desc, criteria.CriteriaID asc
    ";
    $data = mysqli_query($sambungan, $sql);
    $a = 1;
    $No = 1;
    while ($result = mysqli_fetch_array($data)) {
        if ($a == 1)
            echo "<tr>
            <td>".$No."</td>
            <td>".$result['ContestantName']."</td>";
            
        if ($a < 4)
            echo "<td>".$result['ScoreObtained']."</td>";
            
        $a = $a + 1;
                if ($a == 4) {
            echo "<td>".$result['Score']."</td>
                    </tr>";
            $a = 1;
            $No = $No + 1;
        } 
    }  // tamat while
?>
</table>
</body>
</html>
        
        