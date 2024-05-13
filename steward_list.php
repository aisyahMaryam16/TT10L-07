<?php
    include ('sambungan.php');
    include("manager_menu.php");
    
?>


<link rel="stylesheet" href="list.css">

<table>
    <caption>JUDGE LIST</caption>
    <tr>
        <th>Judge ID</th>
        <th>Name</th>
        <th>Passcode</th>
        <th colspan="2">Remarks</th>
    </tr>
    
    
<?php
    $sql = "select * from judge";
    $result = mysqli_query($sambungan, $sql);
    while($judge = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$judge[JudgeID]</td>
            <td>$judge[JudgeName]</td>
            <td>$judge[Passcode]</td>
            <td><a href='judge_update.php?JudgeID=$judge[JudgeID]'>update</a></td>
            <td><a href='judge_delete.php?JudgeID=$judge[JudgeID]'>delete</a></td>
        </tr>";
    }
?>
</table>