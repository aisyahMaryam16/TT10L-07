<?php
    include("sambungan.php");
    include("manager_menu.php");
    
    if (isset($_POST["submit"])) {
        $managerID = $_POST["ManagerID"];
        $Passcode = $_POST["Passcode"];
        $ManagerName = $_POST["ManagerName"];
        
        $sql = "insert into manager values('$ManagerID', '$ManagerName', '$Passcode')";
        $result = mysqli_query($sambungan, $sql);
        if ($result == true)
            echo "<script>alert('successfully added');
        window.location='manager_list.php'</script>";
        else
            echo "Error; $sql<br>".mysqli_error($sambungan);
        }
?>
 
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">

<h3 class="long">ADD MANAGER</h3>
<form class="long" action="manager_insert.php" method="post">
    <table>
    
        <tr>
            <td>Manager ID</td>
            <td><input type="text" name="ManagerID" required ></td>
        </tr>
        
        <tr>
            <td>Manager Name</td>
            <td><input type="text" name="ManagerName" required ></td>
        </tr>
        
        <tr>
            <td>Passcode</td>
            <td><input type="text" name="Passcode" placeholder="max: 8 char" required ></td>
        </tr>
        
        </table>
        <button class="Add" type="submit" name="submit">Add</button>
        </form>