<?php 
    include("sambungan.php"); 
    include("manager_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $IcNumber = $_POST["IcNumber"]; 
        $ContestantName = $_POST["ContestantName"]; 
        $Passcode = $_POST["Passcode"]; 
        $JudgeID = $_POST["JudgeID"]; 
        $ManagerID = $_POST["ManagerID"]; 
         
         $sql = "update contestant set Passcode = '$Passcode', ContestantName = '$ContestantName', 
                JudgeID = '$JudgeID', ManagerID = '$ManagerID' 
where IcNumber = '$IcNumber' "; 
                 
        $result = mysqli_query($sambungan, $sql); 
        if ($result == true) 
            echo "<script>alert('Berjaya kemaskini'); 
            window.location='contestant_list.php'</script>"; 
        else 
            echo "<br><center>Error : $sql<br>".mysqli_error($sambungan)."</center>"; 
        } if 
         
         
         (isset($_GET['IcNumber'])) 
            $IcNumber = $_GET['IcNumber']; 
             
        $sql = "select * from contestant where IcNumber = '$IcNumber' "; 
        $result = mysqli_query($sambungan, $sql); 
        while($contestant = mysqli_fetch_array($result)) { 
            $ContestantName = $contestant['ContestantName']; 
            $Passcode = $contestant['Passcode']; 
            $JudgeID = $contestant['JudgeID']; 
            $ManagerID = $contestant['ManagerID']; 
         } 
    ?> 
     
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
     
    <h3 class="long">CONTESTANT UPDATE</h3> 
    <form class="long" action="contestant_update.php" method="post"> 
        <table> 
            <tr> 
                <td>IcNumber</td> 
                <td><input type="text" name="IcNumber" value= "<?php echo $IcNumber; ?>" ></td> 
            </tr> 
            <tr> 
                <td>ContestantName</td> 
                <td><input type="text" name="ContestantName" value= "<?php echo $ContestantName; ?>" ></td> 
            </tr> 
            <tr> 
                <td>Passcode</td> 
                <td><input type="text" name="Passcode" value= "<?php echo $Passcode; ?>" ></td> 
            </tr> 
            <tr>  
                <td>JudgeID</td> 
                <td><input type="text" name="JudgeID" value= "<?php echo $JudgeID; ?>" ></td> 
            </tr> 
            <tr> 
                <td>ManagerID</td> 
            <td><input type="text" name="ManagerID" value= "<?php echo $ManagerID; ?>" ></td> 
        </tr> 
</table> 
<button class="update" type="submit" name="submit">Update</button> 
</form>