<?php
    include("connect.php");
    include("supervisor_menu.php");

    if (isset($_POST["submit"])) {
        $StewardID = $_POST["StewardID"];
        $steward = $_POST["steward"];
        $password = $_POST["password"];
        
                // Escape the input to prevent SQL injection
        $StewardID = mysqli_real_escape_string($connect, $StewardID);
        $steward = mysqli_real_escape_string($connect, $steward);
        $password = mysqli_real_escape_string($connect, $password);
        
        $sql = "update steward set password='$password', steward = 'steward'
                where StewardID = '$StewardID'
";
       $result = mysqli_query($connect, $sql);
        if ($result == true)
            echo "<script>alert('Successfully Update');
            window.location='steward_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
    }
    
    
    if (isset($_GET['StewardID']))
        $StewardID = $_GET['StewardID'];
        
    $sql = "select * FROM steward WHERE StewardID = '$StewardID'
";
    $result = mysqli_query($connect, $sql);
    while($steward = mysqli_fetch_array($result)) {
        $password = $steward['password'];
        $Steward_name = $steward['steward'];
    }
?>



<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
<h3 class="medium">UPDATE STEWARD</h3>
<form class="medium" action="steward_update.php" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="StewardID" value="<?php echo $StewardID; ?>" readonly></td>
        </tr>
        <tr>
             <td>Name</td>
             <td><input type="text" name="steward" value="<?php echo $steward_name; ?>"></td>
        </tr>
           <tr>
            <td>Password</td>
            <td><input type="password" name="password" value="<?php echo $password; ?>"></td>
        </tr>
</table>
 <button class="update" type="submit" name="submit">Update</button>
</form>