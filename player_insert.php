<?php
    include("connect.php"); 
    include("supervisor_menu.php"); 
     
    if (isset($_POST["submit"])) { 
        $IcNumber = $_POST["IcNumber"]; 
        $password = $_POST["password"]; 
        $player = $_POST["player"]; 
        $StewardID = $_POST["StewardID"]; 
        $SupervisorID = $_POST["SupervisorID"]; 
        
                // Escape the input to prevent SQL injection
        $IcNumber = mysqli_real_escape_string($connect, $IcNumber);
        $password = mysqli_real_escape_string($connect, $password);
        $player = mysqli_real_escape_string($connect, $player);
        $StewardID = mysqli_real_escape_string($connect, $StewardID);
        $SupervisorID = mysqli_real_escape_string($connect, $SupervisorID);
        
        
        $sql = "insert into player values('$IcNumber', '$player', '$StewardID', '$SupervisorID',  
         '$password')"; 
        $result = mysqli_query($connect, $sql); 
        if ($result == true) 
            echo "<script>alert('Successfully added'); 
            window.location='player_list.php'</script>"; 
        else 
            echo "<br><center>Error : $sql<br>".mysqli_error($connect)."</center>"; 
    } 
?> 
 
<link rel="stylesheet" href="form.css"> 
<link rel="stylesheet" href="button.css"> 
<h3 class="long">ADD PLAYER</h3> 
<form class="long" action="player_insert.php" method="post"> 
    <table> 
        <tr> 
            <td class="colour">Ic Number</td> 
            <td><input required type = "text" name = "IcNumber" placeholder = "xxxxxxxxxxxx" pattern = "[0-9]{12}"  
            oninvalid = "this.setCustomValidity('Please insert 12 numbers')" oninput = "this.setCustomValidity('')"> 
            </td> 
        </tr> 
        <tr> 
            <td class="colour">Name</td> 
            <td><input type="text" name="player" required></td> 
        </tr> 
        <tr> 
            <td class="colour">Password</td> 
            <td><input type="text" name="password" required></td> 
        </tr> 
        <tr> 
            <td class="colour">Steward Name</td> 
            <td><select name="StewardID"> 
            <?php 
                $sql = "select * from steward"; 
                $data = mysqli_query($connect, $sql); 
                while ($steward = mysqli_fetch_array($data)) { 
                    echo "<option value='$steward[StewardID]'>$steward[StewardName]</option>"; 
                    } 
            ?> 
            </select> 
        </td> 
    </tr> 
    <tr> 
        <td class="colour">Supervisor Name</td> 
        <td> <select name="SupervisorID"> 
            <?php 
                $sql = "select * from supervisor"; 
                $data = mysqli_query($connect, $sql); 
                while ($supervisor = mysqli_fetch_array($data)) { 
                echo "<option value='$supervisor[SupervisorID]'>$supervisor[SupervisorName]</option>"; 
                } 
            ?> 
            </select> 
        </td> 
    </tr> 
</table> 
    <button class="add" type="submit" name="submit"> 
       
    </button> 
</form> 

                   