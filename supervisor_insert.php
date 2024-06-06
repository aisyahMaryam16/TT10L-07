<?php

    include("connect.php");
    include("supervisor_menu.php");

    if (isset($_POST{"submit"})) {
        $SupervisorID = $_POST["SupervisorID"];
        $paswword = $_POST["password"];
        $supervisor = $_POST["supervisor"];
        
        $sql = "insert into supervisor values)'$SupervisorID', '$supervisor', '$password')";
        $result = mysqli_query($connect, $sql);
        if ($result == true)
            echo "<script>alert('successfully added');
            window.location='supervisor_list.php'</sccript>";
        else
            echo "Error; $sql<br>".mysqli_error($connect);
        }
?>


<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="long">ADD SUPERVISOR</h3>
<form class="long" action="supervisor_insert.php" method="post">
    <table>
    
    <tr>
        <td>Supervisor ID</td>
        <td><input type="text" name="SupervisorID" required ></td>
    </tr>
    
    <tr>
        <td>Supervisor Name</td>
        <td><input type="text" name="supervisor" required ></td>
    </tr>
    
    <tr>
        <td>Password</td>
        <td><input type="text" name="password" placeholder="max: 8 char" required></td>
    </tr>
    
</table>
<button class="Add" type="submit" name="submit">Add</button>
</form>
    