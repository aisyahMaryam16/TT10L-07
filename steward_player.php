steward_player.php
<?php
    session_start();
    include('connect.php');
    include("steward_menu.php");
?>

<html>
<link rel="stylesheet" href="list.css">
<link rel="stylesheet" href="button.css">

<body>
<table>
<caption>LIST OF PLAYER BY STEWARD</caption>

<?php
    $name = $_SESSION["name"];
    $StewardID = $_SESSION['UserID'];
    
    $header = " <tr><th>No</th>
                    <th>name</th>";
                    
    $sql = "select * from aspect order by AspectID asc";
    
    $data = mysqli_query($connect, $sql);
    while ($aspect = mysqli_fetch_array($data)) {
        $header = $header."<th>".$aspect['aspect']."</th>";
    }
    $header = $header."<th>Score</th></tr>";
    
    echo $header;
    $No = 1;
    $sql = "select * from result
    join player on result.IcNumber = player.IcNumber
    join aspect on result.AspectID = aspect.AspectID
    join steward on player.StewardID = steward.StewardID where steward.StewardID = '$StewardID'
    
    order by result.Score desc, aspect.AspectID asc
    ";
    $data = mysqli_query($connect, $sql);
    $a = 1;
    $No = 1;
    while ($result = mysqli_fetch_array($data)) {
        if ($a == 1)
            echo "<tr>
            <td>".$No."</td>
            <td>".$result['player']."</td>";
            
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