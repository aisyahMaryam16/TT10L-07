<?php
    include("connect.php");
    include("supervisor_menu.php");

    if (isset($_POST["submit"])){
        $SupervisorID = $_POST["SupervisorID"];
        $supervisor = $_POST["supervisor"];
        $password = $_POST["password"];
        
        $sql = "update supervisor set supervisor = '$supervisor', password='$password'
        wehere
            SupervisorID = '$SupervisorID'";
        $result = mysqli_query($connect, $sql)
        if ($result == true)
            echo "<script>alert('Successfully updated')
            window.location='supervisor_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>";
    }
    if (isset($_GET['SupervisorID']))
        $SupervisorID = $_GET['SupervisorID'];

    $sql = "select * from supervisor where SupervisorID = '$SupervisorID'";
    $result = mysqli_query($connect, $sql);
    while ($supervisor = mysqli_fetch_array($result)) {
        $password = $supervisor['password'];
        $supervisor = $supervisor['supervisor'];
    }
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="long">SUPERVISOR UPDATE</h3>


<form class="long" action="supervisor_update.php" method="post">
<table>
    <tr>
        <td>Supervisor ID</td>
        <td><input type="text" name="SupervisorID" value= "<?php echo $SupervisorID; ?>" ></td>
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