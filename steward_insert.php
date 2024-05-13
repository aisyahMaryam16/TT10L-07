<?php
    include("sambungan.php");
    include("manager_menu.php");
    
    
    if (isset($_POST["submit"])) {
        $JudgeID = $_POST["JudgeID"];
        $JudgeName = $_POST["JudgeName"];
        $Passcode = $_POST["Passcode"];
        
        $sql = "insert into judge values('$JudgeID', '$JudgeName', '$Passcode')";
        
        $result = mysqli_query($sambungan, $sql);
        if ($result == true)
            echo "<script>alert('Successfully Added');
            window.location='judge_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>";
    }
?>

<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">


<h3 class="long">ADD JUDGE</h3>
<form class="long" action="judge_insert.php" method="post">
    <table>
        <tr>
            <td>Judge ID</td>
            <td><input type="text" name="JudgeID"></td>
        </tr>
        <tr>
            <td>Judge Name</td>
            <td><input type="text" name="JudgeName"></td>
        </tr>
        <tr>
            <td>Passcode</td>
            <td><input type="text" name="Passcode"></td>
        </tr>
    </table>
    <button class="add" type="submit" name="submit" >Add</button>
</form>
        