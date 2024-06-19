<?php
    include( "connect.php" );
    include("supervisor_menu.php");

    if (isset($_POST["submit"])) {
        
        $SupervisorID = $_POST["SupervisorID"];
        $sql = "delete from supervisor where SupervisorID = '$SupervisorID'";
        $result = mysqli_query($connect, $sql);
        
        if ($result == true) {
            $NoRec = mysqli_affected_rows($connect);
            if ($NoRec > 0)
                echo "<script>alert('successfully deleted');
                window.location='supervisor_list.php'</script>";
            else
                echo "<script>alert('delete was unsuccessful. Record was not found');
                window.location='supervisor_list.php'</script>";
        }
    else 
        echo "<br><center>Error : $sql <br>".mysqli_error($connect)."</center>";
    }

    if (isset($_GET['SupervisorID']))
        $SupervisorID = $_GET['SupervisorID'];
?>


<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="short">DELETE SUPERVISOR</h3>
<form class="short" action="supervisor_delete.php" method="post">
    
<table>
    <tr>
        <td>
            Supervisor ID</td>
            <td><input type="text" name ="SupervisorID" value = "<?php echo
        $SupervisorID; ?>" ></td>
    </tr>
</table>

<button class="delete" type="submit" name="submit">Delete</button>
</form>