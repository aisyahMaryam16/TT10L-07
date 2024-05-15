<?php 
    include('connect.php'); 
    include("supervisor_menu.php"); 
    ?> 
 
    <link rel="stylesheet" href="list.css"> 
 
    <table> 
    <caption>Player Name List</caption> 
    <tr> 
        <th>Ic Number</th> 
        <th>Player Name</th> 
        <th>Steward ID</th> 
        <th>Supervisor ID</th> 
        <th>Password</th> 
        <th colspan="2">Action</th> 
    </tr> 
     
    <?php 
        $sql = "select * from player"; 
        $result = mysqli_query($connect, $sql); 
        while($connect = mysqli_fetch_array($result)) { 
         echo "<tr> <td>$player[IcNumber]</td> 
                <td class='name'>$player[PlayerName]</td> 
                <td>$player[StewardID]</td> 
                <td>$player[SupervisorID]</td> 
                <td>$player[Password]> 
                <td><a href='player_update.php?IcNumber=$player[IcNumber]'>update</a></td> 
                <td><a href='player_delete.php?IcNumber=$player[IcNumber]'>delete</a></td> 
            </tr>"; 
        } 
    ?> 
</table>