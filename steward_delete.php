 <?php
    include("sambungan.php");
    include("manager_menu.php");
    
    if (isset($_POST["submit"])) {
        $JudgeID = $_POST["JudgeID"];
        
        $sql = "delete from judge where JudgeID = '$JudgeID'
";
        $result = mysqli_query($sambungan, $sql);
        if ($result == true) {
            $bilrekod = mysqli_affected_rows($sambungan);
            if ($bilrekod > 0) 
                echo "<script>alert('successfully deleted');
                window.location='judge_list.php'</script>";
            else
                echo "<script>alert('Unable to delete. No record was found');
                window.location='judge_list.php'</script>";
        }
        else
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>";
    }
    
    
    if (isset($_GET['JudgeID']))
        $JudgeID = $_GET['JudgeID'];
?>


<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="button.css">

<h3 class="long">DELETE JUDGE</h3>
<form class="long" action="judge_delete.php" method="post">
    <table>
        <tr>
           <td>JudgeID</td>
           <td><input type="text" name="JudgeID" value = "<?php echo $JudgeID; ?>" ></td>
        </tr>
    </table>
    <button class="delete" type="submit" name="submit">Delete</button>
</form>