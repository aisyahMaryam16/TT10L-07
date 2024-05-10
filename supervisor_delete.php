<?php
    include( "sambungan.php" );
    include("manager_menu.php");
    
    if (isset($_POST["submit"])) {
    
        $ManagerID = $_POST["ManagerID"];
        $sql = "delete from manager where ManagerID = '$ManagerID'";
        $result = mysqli_query($sambungan, $sql);
        
        if ($result == true) {
            $bilrekod = mysqli_affected_rows($sambungan);
            if ($bilrekod > 0)
                  echo "<script>alert('successfully delete');
                  window.location='manager_list.php'</script>";
            else
                  echo "<script>alert('delete was unsuccessful. Record was not found');
                window.location='manager_list.php'</script>";
        }
    else
        echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>";
    }
    
    if (isset($_GET['ManagerID']))
        $ManagerID = $_GET['ManagerID'];
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">

<h3 class="long">DELETE MANAGER</h3>
<form class="long" action="manager_delete.php" method="post">

<table>
    <tr>
        <td>
            Manager ID</td>
            <td><input type="text" name="ManagerID" value = "<?php echo $ManagerID; ?>" ></td>
    </tr>
</table>

<button class="delete" type="submit" name="submit">Delete</button>
</form>