<?php 
    include('sambungan.php'); 
    include("manager_menu.php"); 
    ?> 
 
    <link rel="stylesheet" href="list.css"> 
 
    <table> 
    <caption>Contestant Name List</caption> 
    <tr> 
        <th>Ic Number</th> 
        <th>Contestant Name</th> 
        <th>Judge ID</th> 
        <th>Manager ID</th> 
        <th>Passcode</th> 
        <th colspan="2">Action</th> 
    </tr> 
     
    <?php 
        $sql = "select * from contestant"; 
        $result = mysqli_query($sambungan, $sql); 
        while($contestant = mysqli_fetch_array($result)) { 
         echo "<tr> <td>$contestant[IcNumber]</td> 
                <td class='name'>$contestant[ContestantName]</td> 
                <td>$contestant[JudgeID]</td> 
                <td>$contestant[ManagerID]</td> 
                <td>$contestant[Passcode]> 
                <td><a href='contestant_update.php?IcNumber=$contestant[IcNumber]'>update</a></td> 
                <td><a href='contestant_delete.php?IcNumber=$contestant[IcNumber]'>delete</a></td> 
            </tr>"; 
        } //tamat while 
    ?> 
</table>