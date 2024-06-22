<?php
    include ('connect.php');
    include("supervisor_menu.php");
    
    ?>


    <link rel="stylesheet" href="list.css">

    <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Password</th>
        <th colspan="2">Action</th>
    </tr>
    
    
    <?php
        $sql = "select * from steward";
        $result = mysqli_query($connect, $sql);
        while($steward = mysqli_fetch_array($result)) {
            $maskedPassword = str_repeat('*', strlen($steward['password']));
            echo "<tr> <td>$steward[StewardID]</td>
            <td>$steward[steward]</td>
            <<td>{$maskedPassword}</td>
            <td><a href='steward_update.php?StewardID=$steward[StewardID]'class='btn edit'>update</a></td>
            <td><a href='steward_delete.php?StewardID=$steward[StewardID]'class='btn btn-danger'>delete</a></td>
        </tr>";
    }
?>
</table>