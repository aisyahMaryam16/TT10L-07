<?php 
    include('connect.php'); 
    include("supervisor_menu.php"); 
     
    $IcNumber = $_POST['IcNumber']; 
     
    $sql = "select * from player where IcNumber = '$IcNumber'"; 
    $result = mysqli_query($connect, $sql); 
    $player = mysqli_fetch_array($result); 
     
    $PlayerName = $player['PlayerName']; 
    $StewardID = $player['StewardID']; 
    $SupervisorID = $player['StewardID']; 
    $Password = $player['Password']; 
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
        <td class="result"><?php echo $PlayerName; ?></td> 
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
        <td class="result"><?php echo $Password; ?></td> 
    </tr> 
</table>