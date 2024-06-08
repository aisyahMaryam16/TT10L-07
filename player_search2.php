<?php 
    include('connect.php'); 
    include("supervisor_menu.php"); 
     
    if(isset($_POST['IcNumber'])){ 
        $IcNumber = $_POST['IcNumber']; 
         
        $sql = "select * from player where IcNumber = '$IcNumber'"; 
        $result = mysqli_query($connect, $sql); 
         
        if(mysqli_num_rows($result) > 0){ 
            $player = mysqli_fetch_array($result); 
             
            $playerName = $player['player']; 
            $StewardID = $player['StewardID']; 
            $SupervisorID = $player['SupervisorID']; 
            $password = $player['password']; 
        } else { 
            echo "No player found with IC Number $IcNumber"; 
            exit; 
        } 
    } else { 
        echo "IC Number is required"; 
        exit; 
    } 
?> 
 
<link rel="stylesheet" href="list.css"> 
<table> 
    <caption >PLAYER INFORMATION</caption> 
    <tr> 
        <th>Information</th> 
        <th>Data</th> 
    </tr> 
    <tr> 
        <td class="result">Ic Number</td> 
        <td class="result"><?php echo $IcNumber; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Player Name</td> 
        <td class="result"><?php echo $playerName; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Steward ID</td> 
        <td class="result"><?php echo $StewardID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Supervisor ID</td> 
        <td class="result"><?php echo $SupervisorID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Password</td> 
        <td class="result"><?php echo $password; ?></td> 
    </tr> 
</table>