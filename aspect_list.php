<?php 
    include('connect.php');
    include("supervisor_menu.php");
?>


<link rel="stylesheet" href="list.css">


<table>
    <caption>ASPECT LIST</caption>
    <tr>
        <th>ID</th>
        <th>Aspect</th>
        <th>Total Marks</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
        $sql = "select * from aspect";
        $result = mysqli_query($connect, $sql);
        while($value = mysqli_fetch_array($result)) {
            echo "<tr><td>$value[AspectID]</td>
                <td>$value[aspect]</td>
                <td>$value[TotalMarks]</td>
                <td><a href='aspect_update.php?AspectID=$value[AspectID]'>update</a></td>
                <td><a href='aspect_delete.php?AspectID=$value[AspectID]'>delete</a></td>
                </tr>";
        }
    ?>
</table>