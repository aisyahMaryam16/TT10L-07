<?php
    include("sambungan.php");
    include("manager_menu.php");
    
    if (isset($_POST["submit"])){
        $ManagerID = $_POST["ManagerID"];
        $ManagerName = $_POST["ManagerName"];
        $Passcode = $_POST["Passcode"];
        
        $sql = "update manager set ManagerName = '$ManagerName', Passcode='$Passcode' where 
                ManagerID = '$ManagerID'";
        $result = mysqli_query($sambungan, $sql);
        if ($result == true)
            echo "<script>alert('Successfully Updated');
            window.location='manager_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>";
    }
    if (isset($_GET['ManagerID']))
        $ManagerID = $_GET['ManagerID'];
            
    $sql = "select * from manager where ManagerID = '$ManagerID'";
    $result = mysqli_query($sambungan, $sql);
    while ($manager = mysqli_fetch_array($result)) {
        $Passcode = $manager['Passcode'];
        $ManagerName = $manager['ManagerName'];
    }
?>
    
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
    
<h3 class="long">MANAGER UPDATE</h3>
    
<form class="long" action="manager_update.php" method="post">
<table>
    <tr>
        <td>Manager ID</td>
        <td><input type="text" name="ManagerID" value= "<?php echo $ManagerID; ?>" ></td>
    </tr>
    <tr>
        <td>Manager Name</td>
        <td><input type="text" name="ManagerName" value= "<?php echo $ManagerName; ?>" ></td>
    </tr>
    <tr>
        <td>Passcode</td>
        <td><input type="text" name="Passcode" value= "<?php echo $Passcode; ?>" ></td>
    </tr>
</table>
<button class="update" type="submit" name="submit">Update</button>
</form>