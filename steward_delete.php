 <?php
    include("connect.php");
    include("supervisor_menu.php");
    
    if (isset($_POST["submit"])) {
        $StewardID = $_POST["StewardID"];
        
        $sql = "delete from steward where StewardID = '$StewardID'
";
        $result = mysqli_query($connect, $sql);
        if ($result == true) {
            $total = mysqli_affected_rows($connect);
            if ($total > 0) 
                echo "<script>alert('successfully deleted');
                window.location='steward_list.php'</script>";
            else
                echo "<script>alert('Unable to delete. No record was found');
                window.location='steward_list.php'</script>";
        }
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
    }
    
    
    if (isset($_GET['StewardID']))
        $StewardID = $_GET['StewardID'];
?>


<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">

<h3 class="long">DELETE STEWARD</h3>
<form class="long" action="steward_delete.php" method="post">
    <table>
        <tr>
           <td>StewardID</td>
           <td><input type="text" name="StewardID" value = "<?php echo $StewardID; ?>" ></td>
        </tr>
    </table>
    <button class="delete" type="submit" name="submit">Delete</button>
</form>