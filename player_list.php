<?php 
    include('connect.php'); 
    include("supervisor_menu.php"); 
    ?> 
 
    <link rel="stylesheet" href="list.css"> 
 
    <table>  
    <tr> 
        <th>Ic Number</th> 
        <th>Name</th> 
        <th>Steward</th> 
        <th>Supervisor</th> 
        <th>Password</th> 
        <th colspan="2">Action</th> 
    </tr> 
     
    <?php 
        $sql = "select * from player"; 
        $result = mysqli_query($connect, $sql); 
        while($player = mysqli_fetch_array($result)) {
            $maskedPassword = str_repeat('*', strlen($player['password']));
         echo "<tr> <td>$player[IcNumber]</td> 
                <td class='name'>$player[player]</td> 
                <td>$player[StewardID]</td> 
                <td>$player[SupervisorID]</td> 
                <<td>{$maskedPassword}</td>
                <td><a href='player_update.php?IcNumber=$player[IcNumber]'class='btn edit'>update</a></td> 
                <td><a href='player_delete.php?IcNumber=$player[IcNumber]'class='btn btn-danger'>delete</a></td> 
            </tr>"; 
        } //tamat while 
    ?> 
</table>