<?php
    include("connect.php");
    include("supervisor_menu.php");
    if (isset($_POST["submit"])) {
        $StewardID = $_POST["StewardID"];
        $StewardName = $_POST["StewardName"];
        $Password = $_POST["Password"];
        
        $sql = "update steward set Password='$Password', StewardName = 'StewardName'
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
        
    $sql = "select * from steward where StewardID = '$StewardID'
";
    $result = mysqli_query($connect, $sql);
    while($steward = mysqli_fetch_array($result)) {
        $Password = $steward['Password'];
        $StewardName = $steward['StewardName'];
    }
?>



<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
<h3 class="long">UPDATE STEWARD</h3>
<form class="long" action="steward_update.php" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="StewardID" value= "<?php echo $StewardID; ?>" ></td>
        </tr>
        <tr>
             <td>Name</td>
             <td><input type="text" name="StewardName" value=
              "<?php echo $StewardName; ?>" ></td>
        </tr>
           <tr>
            <td>Password</td>
            <td><input type="text" name="Password" value= "<?php echo $Password; ?>" ></td>
        </tr>
</table>
 <button class="update" type="submit" name="submit">Update</button>
</form>