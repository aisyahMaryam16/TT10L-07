<?php
    include("connect.php");
    include("supervisor_menu.php");
    
    if (isset($_POST["submit"])) {
        $IcNumber = $_POST["IcNumber"];
        
        $sql = "DELETE FROM player WHERE IcNumber = '$IcNumber'";
        $result = mysqli_query($connect, $sql);
        
        if ($result == true) {
            $No = mysqli_affected_rows($connect);
            if($No > 0)
                echo "<script>alert('Successfully deleted'); window.location='player_list.php'</script>";
            else
                echo "Unable to delete. No record was found.";
        }
        else
            echo "<br><center>Error : $sql<br>" . mysqli_error($connect) . "</center>";
        }
        
        if (isset($_GET['IcNumber']))
            $IcNumber = $_GET['IcNumber'];
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">

<h3 class="short">DELETE PLAYER</h3>
<form class="short" action="player_delete.php" method="post">
    <table>
        <tr>
            <td>IcNumber</td>
            <td><input type="text" name="IcNumber" value="<?php echo $IcNumber; ?>" required></td>
        </tr>
    </table>
    <button class="delete" type="submit" name="submit">Delete</button>
</form>