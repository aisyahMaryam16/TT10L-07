<?php
    include("connect.php");
    include("supervisor_menu.php");

    if (isset($_POST["submit"])){
        $SupervisorID = $_POST["SupervisorID"];
        $supervisor = $_POST["supervisor"];
        $password = $_POST["password"];
        
        // escape the input to prevent SQL injection
        $SupervisorID = mysqli_real_escape_string($connect, $SupervisorID);
        $supervisor = mysqli_real_escape_string($connect, $supervisor);
        $password = mysqli_real_escape_string($connect, $password);
        
        $sql = "UPDATE supervisor SET supervisor = '$supervisor',password ='$password'
        WHERE SupervisorID = '$SupervisorID'";
    
        if (mysqli_query($connect, $sql)) {
            echo "<script>alert('successfully updated');
            window.location='supervisor_list.php'</script>";
        }  else {
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
    }
}
if (isset($_GET['SupervisorID']))
    $SupervisorID = $_GET['SupervisorID'];
} else {
    echo "<br><center>Error: SupervisorID not set </center>";
    exit();
}

$sql = "select * from supervisor where SupervisorID = '$SupervisorID'";
$result = mysqli_query($connect, $sql);
    
if )mysqli_num_rows($result) == 0) {
    echo "<br><center>Error: Supervisor not found</center>";
    exit();
}

$value = mysqli_fetch_array($result);
$supervisor = $supervisor['supervisor'];
$password = $supervisor['password'];
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="medium">SUPERVISOR UPDATE</h3>


<form class="medium" action="supervisor_update.php" method="post">
    <table>
     <tr>
        <td>Supervisor ID</td>
            <td><input type="text" name="SupervisorID" value="<?php echo $SupervisorID; ?>" readonly></td>
    </tr>
    <tr>
        <td>Supervisor Name</td>
        <td><input type="text" name="supervisor" value= "<?php echo $supervisor; ?>" ></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" name="password" value= "<?php echo $password; ?>" ></td>
    </tr>
</table>
<button class="update" type="submit" name="submit">Update</button>
</form>