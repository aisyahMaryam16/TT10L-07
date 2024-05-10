<?php 
    include('sambungan.php'); 
    include("manager_menu.php"); 
     
    $IcNumber = $_POST['IcNumber']; 
     
    $sql = "select * from contestant where IcNumber = '$IcNumber'"; 
    $result = mysqli_query($sambungan, $sql); 
    $contestant = mysqli_fetch_array($result); 
     
    $ContestantName = $contestant['ContestantName']; 
    $JudgeID = $contestant['JudgeID']; 
    $ManagerID = $contestant['ManagerID']; 
    $Passcode = $contestant['Passcode']; 
?> 
 
<link rel="stylesheet" href="list.css"> 
<table> 
    <caption >CONTESTANT INFORMATION</caption> 
    <tr> 
        <th>Information</th> 
        <th>Data</th> 
    </tr> 
    <tr> 
        <td class="result">Ic Number</td> 
        <td class="result"><?php echo $IcNumber; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Contestant Name</td> 
        <td class="result"><?php echo $ContestantName; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Judge ID</td> 
        <td class="result"><?php echo $JudgeID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Manager ID</td> 
        <td class="result"><?php echo $ManagerID; ?></td> 
    </tr> 
    <tr> 
        <td class="result">Passcode</td> 
        <td class="result"><?php echo $Passcode; ?></td> 
    </tr> 
</table>