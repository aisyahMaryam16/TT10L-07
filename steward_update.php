<?php
    include("sambungan.php");
    include("manager_menu.php");
    if (isset($_POST["submit"])) {
        $JudgeID = $_POST["JudgeID"];
        $JudgeName = $_POST["JudgeName"];
        $Passcode = $_POST["Passcode"];
        
        $sql = "update judge set Passcode='$Passcode', JudgeName = 'JudgeName'
                where JudgeID = '$JudgeID'
";
       $result = mysqli_query($sambungan, $sql);
        if ($result == true)
            echo "<script>alert('Successfully Update');
            window.location='judge_list.php'</script>";
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>";
    }
    
    
    if (isset($_GET['JudgeID']))
        $JudgeID = $_GET['JudgeID'];
        
    $sql = "select * from judge where JudgeID = '$JudgeID'
";
    $result = mysqli_query($sambungan, $sql);
    while($judge = mysqli_fetch_array($result)) {
        $Passcode = $judge['Passcode'];
        $JudgeName = $judge['JudgeName'];
    }
?>



<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">
<h3 class="long">UPDATE JUDGE</h3>
<form class="long" action="judge_update.php" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="JudgeID" value= "<?php echo $JUdgeID; ?>" ></td>
        </tr>
        <tr>
             <td>Name</td>
             <td><input type="text" name="JudgeName" value=
              "<?php echo $JudgeName; ?>" ></td>
        </tr>
           <tr>
            <td>Passcode</td>
            <td><input type="text" name="Passcode" value= "<?php echo $Passcode; ?>" ></td>
        </tr>
</table>
 <button class="update" type="submit" name="submit">Update</button>
</form>