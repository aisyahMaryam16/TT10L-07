<?php 
    include("connect.php"); 
    include("supervisor_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $IcNumber = $_POST["IcNumber"]; 
        $PlayerName = $_POST["PlayerName"]; 
        $password = $_POST["password"]; 
        $StewardID = $_POST["StewardID"]; 
        $SupervisorID = $_POST["SupervisorID"]; 
         
         $sql = "update player set password = '$password', PlayerName = '$PlayerName', 
                StewardID = '$StewardID', SupervisorID = '$SupervisorID' 
where IcNumber = '$IcNumber' "; 
                 
        $result = mysqli_query($connect, $sql); 
        if ($result == true) 
            echo "<script>alert('Berjaya kemaskini'); 
            window.location='player_list.php'</script>"; 
        else 
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>"; 
        } if 
         
         
         (isset($_GET['IcNumber'])) 
            $IcNumber = $_GET['IcNumber']; 
             
        $sql = "select * from player where IcNumber = '$IcNumber' "; 
        $result = mysqli_query($connect, $sql); 
        while($player = mysqli_fetch_array($result)) { 
            $PlayerName = $player['PlayerName']; 
            $password = $player['password']; 
            $StewardID = $player['StewardID']; 
            $SupervisorID = $player['SupervisorID']; 
         } 
    ?> 
     
    <link rel="stylesheet" href="form.css"> 
    <link rel="stylesheet" href="button.css"> 
     
    <h3 class="long">PLAYER UPDATE</h3> 
    <form class="long" action="player_update.php" method="post"> 
        <table> 
            <tr> 
                <td>IcNumber</td> 
                <td><input type="text" name="IcNumber" value= "<?php echo $IcNumber; ?>" ></td> 
            </tr> 
            <tr> 
                <td>PlayerName</td> 
                <td><input type="text" name="PlayerName" value= "<?php echo $PlayerName; ?>" ></td> 
            </tr> 
            <tr> 
                <td>Password</td> 
                <td><input type="text" name="password" value= "<?php echo $password; ?>" ></td> 
            </tr> 
            <tr>  
                <td>StewardID</td> 
                <td><input type="text" name="StewardID" value= "<?php echo $StewardID; ?>" ></td> 
            </tr> 
            <tr> 
                <td>SupervisorID</td> 
            <td><input type="text" name="SupervisorID" value= "<?php echo $SupervisorID; ?>" ></td> 
        </tr> 
</table> 
<button class="update" type="submit" name="submit">Update</button> 
</form>