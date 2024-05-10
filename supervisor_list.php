<?php
    include ('sambungan.php');
    include("manager_menu.php");
    ?>
    
    <link rel="stylesheet" href="list.css">
    
    <table>
        <caption>LIST OF MANAGERS</caption>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Passcode</th>
            <th colspan="2">Action</th>
        </tr>
        
        <?php
            $sql = "select * from manager";
            $result = mysqli_query($sambungan, $sql);
            while($manager = mysqli_fetch_array($result)){
                echo"<tr> <td>$manager[ManagerID]</td>
                <td>$manager[ManagerName]</td>
                <td>$manager[Passcode]</td>
                <td><a href= 'manager_update.php?ManagerID=$manager[ManagerID]'>update</a></td>
                <td><a href= 'manager_delete.php?ManagerID=$manager[ManagerID]'>delete</a></td>
                </tr>";
             }
        ?>
    </table>