<?php
    include("connect.php");
    include("supervisor_menu.php");
    
    
    if (isset($_POST["submit"])) {
        $StewardID = $_POST["StewardID"];
        $StewardName = $_POST["StewardName"];
        $password = $_POST["password"];
        
        $sql = "insert into steward values('$StewardID', '$StewardName', '$password')";
        
        $result = mysqli_query($connect, $sql);
        if ($result == true)
            echo "<script>alert('Successfully Added');
            window.location='steward_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
    }
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="long">ADD STEWARD</h3>
<form class="long" action="steward_insert.php" method="post">
    <table>
        <tr>
            <td>Steward ID</td>
            <td><input type="text" name="StewardID"></td>
        </tr>
        <tr>
            <td>Steward Name</td>
            <td><input type="text" name="StewardName"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td>
        </tr>
    </table>
    <button class="add" type="submit" name="submit" >Add</button>
</form>
        