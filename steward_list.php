<?php
    include ('connect.php');
    include("supervisor_menu.php");
    
?>


<link rel="stylesheet" href="list.css">

<table>
    <caption>STEWARD LIST</caption>
    <tr>
        <th>Steward ID</th>
        <th>Name</th>
        <th>Password</th>
        <th colspan="2">Remarks</th>
    </tr>
    
    
<?php
    $sql = "select * from steward";
    $result = mysqli_query($connect, $sql);
    while($steward = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>$steward[StewardID]</td>
            <td>$steward[StewardName]</td>
            <td>$steward[Password]</td>
            <td><a href='steward_update.php?StewardID=$steward[StewardID]'>update</a></td>
            <td><a href='steward_delete.php?StewardID=$steward[StewardID]'>delete</a></td>
        </tr>";
    }
?>
</table>